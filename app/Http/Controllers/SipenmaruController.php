<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Sekolah;
use App\Models\Pendaftaran;
use App\Models\Pembayaran;
use App\Models\Pengumuman;
use App\Models\Timeline;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use File;
use Alert;
use App\Models\FormPendaftaran;

class SipenmaruController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }

    public function login()
    {
        return view('login');
    }

    public function proslogin(Request $a)
    {
        $message = [
            'email.required' => 'Email yang tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ];
        $cek = $a->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ], $message);

        if (Auth::attempt($cek)) {
            $a->session()->regenerate();


            return redirect()->intended('/index');
        }
        return back()->with('loginError', 'Maaf Username atau Password Salah');
    }

    public function logout(Request $a)
    {
        Auth::logout();

        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('/login');
    }

    public function register()
    {
        return view('register');
    }

    public function insertRegis(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255|unique:users',
            'email' => 'required', 'email', 'max:255', 'unique:users,email',
            'password' => 'required|min:6|max:255'
        ]);
        //dd('Regist Berhasil');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'member';
        $user->password = bcrypt($request->password);
        $user->save();

        //return request()->all();
        return redirect('/login')->with('success', 'Berhasil Register!');
    }

    public function beranda()
    {
        $user = User::find(Auth::user()->id);
        $pendaftar = FormPendaftaran::all();
        $jumlahpendaftar = $pendaftar->count();

        $jmluser = User::where('role', '=', 'member');
        $jumlahuser = $jmluser->count();
        $jumlahmati = $pendaftar->count();

        return view('beranda')->with('user', $user)->with('jumlahpendaftar', $jumlahpendaftar)->with('jumlahuser', $jumlahuser)->with('jumlahmati',$jumlahmati);
    }
    
    public function editlistpendaftaran(Request $request, $id)
    {
        $user = FormPendaftaran::find($id);
        
        return view('edit-pendaftaran')->with('user',$user);
    }
    public function deletelistpendaftaran(Request $request, $id)
    {
        $p = FormPendaftaran::find($id);
        $p->delete();   
        return redirect('/data-pendaftaran')->with('success', 'Berhasil Hapus Data!!');
    }
    public function updatelistpendaftaran(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'nokk' => ['required', 'min:6'],
            'phone' => ['required', 'numeric'],
            'namemati' => ['required'],
        ]);

        $daftar = FormPendaftaran::find($request->id);
        $daftar->name = $request->name;
        $daftar->nokk = $request->nokk;
        $daftar->phone = $request->phone;
        $daftar->namemati = $request->namemati;

        $daftar->save();

        return redirect('/data-pendaftaran');
    }

    public function action(Request $request)
    {
         if($request->ajax())
         {
            if($request->action == 'edit')
            {
                $data = array(
                    'name' => $request->name,
                    'namemati' => $request->namemati,
                    'nokk' => $request->nokk,
                    'phone' => $request->phone
                );
                DB::table('form_pendaftarans')
                    ->where('id', $request->id)
                    ->update($data);
            }
            if($request->action == 'delete')
            {
                DB::table('form_pendaftarans')
                    ->where('id', $request->id)
                    ->delete();
            }
            return request()->json($request);
         }
    }

    public function listpendaftaran()
    {
        $user = User::find(Auth::user()->id);
        $data = DB::table('form_pendaftarans')->get();
        return view('data-pendaftaran', compact('data'))->with('user',$user);
    }

    public function generatepdf()
    {
        $data = FormPendaftaran::all();
        $pdf = Pdf::loadView('invoice', ['data' => $data]);

        // return view('invoice', ['data' => $data]);
        return $pdf->download('datapendaftaran.pdf');
    }

    public function formdaftar()
    {
        $user = User::find(Auth::user()->id);

        return view('form-pendaftaran')->with('user', $user);
    }

    //profil
    public function dataprofil()
    {
        $user = User::find(Auth::user()->id);
        return view('profil')->with('user',$user);
    }

    public function ubahprofil(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:5'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        
        return view('profil')->with('user',$user)->with('success', 'Berhasil ubah profil!!');;
    }
    
    // public function editprofil(Request $a)
    // {
    //     $dataUser = Pengguna::all();
    //     $message = [
    //         'tempat.required' => 'Tempat lahir tidak boleh kosong',
    //         'tanggal.required' => 'Tanggal lahir tidak boleh kosong',
    //         'jk.required' => 'Jenis Kelamin harus dipilih',
    //         'hp.required' => 'Family card cannot be empty',
    //         'alamat.required' => 'School name must be filled',
    //         'ig.required' => 'Major must be filled',
    //     ];

    //     $cekValidasi = $a->validate([
    //         'tempat' => 'required',
    //         'tanggal' => 'required',
    //         'jk' => 'required',
    //         'hp' => 'required',
    //         'alamat' => 'required',
    //         'ig' => 'required'
    //     ], $message);

    //     $file = $a->file('foto');
    //     if (file_exists($file)) {
    //         $nama_file = time() . "-" . $file->getClientOriginalName();
    //         $namaFolder = 'foto profil';
    //         $file->move($namaFolder, $nama_file);
    //         $pathFoto = $namaFolder . "/" . $nama_file;
    //     } else {
    //         $pathFoto = $a->pathFoto;
    //     }

    //     Pengguna::where("Id_user", $a->id)->update([
    //         'Foto' => $pathFoto,
    //         'Tempat_lahir' => $a->tempat,
    //         'Tanggal_lahir' => $a->tanggal,
    //         'Gender' => $a->jk,
    //         'No_Hp' => $a->hp,
    //         'Alamat' => $a->alamat,
    //         'Instagram' => $a->ig
    //     ]);

    //     Timeline::create([
    //         'id_user' => $a->userid,
    //         'status' => "Mengedit profilnya"
    //     ]);
    //     return redirect('/profile')->with("toastr-success", 'data berhasil disimpan');
    // }

    //data user
    public function simpanpendaftaran(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'nokk' => ['required', 'min:6'],
            'nik' => ['required', 'min:5', 'numeric'],
            'jeniskelamin' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required', 'min:5'],
            'tempatlahir' => ['required'],
            'tanggallahir' => ['required'],
            'scanktp' => ['required|image'],
            'email' => ['required'],
            'phone' => ['required', 'numeric'],
            'namemati' => ['required'],
            'nik' => ['required', 'min:5', 'numeric'],
        ]);

        $daftar = new FormPendaftaran();
        $daftar->user_id = Auth::user()->id;
        $daftar->name = $request->name;
        $daftar->nokk = $request->nokk;
        $daftar->nik = $request->nik;
        $daftar->jeniskelamin = $request->jeniskelamin;
        $daftar->agama = $request->agama;
        $daftar->alamat = $request->alamat;
        $daftar->tempatlahir = $request->tempatlahir;
        $daftar->tanggallahir = $request->tanggallahir;
        if ($request->image) {
            $image = str_replace(' ', '', $request->name) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->storeAs(
                '\public\\',
                $image
            );
            $daftar->image = $image;
        } else {
            $daftar->image = '';
        }
        $daftar->email = $request->email;
        $daftar->phone = $request->phone;
        $daftar->namemati = $request->namemati;
        $daftar->nikmati = $request->nikmati;
        if ($request->imagemati) {
            $image = str_replace(' ', '', $request->name) . '.' . $request->file('imagemati')->getClientOriginalExtension();
            $request->imagemati->storeAs(
                '\public\\',
                $image
            );
            $daftar->imagemati = $image;
        } else {
            $daftar->imagemati = '';
        }
        $daftar->save();

        return redirect('/pendaftaran')->with('success', 'Data Tersimpan!!');
    }

}
