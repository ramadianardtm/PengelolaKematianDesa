@extends('master.master-layout')

@section('title')
Pendaftaran Sokulon
@endsection

@section('header')
@endsection

@section('navbar')
@parent
@endsection

@section('menunya')
Form Pendaftaran
@endsection

@section('menu')
<ul class="metismenu" id="menu">
    <li><a href="index">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fas fa-home"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Beranda</span>
                </div>
            </div>
        </a>
    </li>
    <li><a href="pendaftaran" aria-expanded="false">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fa fa-database"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Pendaftaran</span>
                </div>
            </div>
        </a>
    </li>
    <li><a href="profile" aria-expanded="false">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fa fa-user"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Profile</span>
                </div>
            </div>
        </a>
    </li>
    <!--<li><a href="#" aria-expanded="false">
                    <i class="fa fa-download"></i>
                    <span class="nav-text">Pusat Unduhan</span>
                </a>
            </li>-->
</ul>
@endsection


@section('content')
<form action="/save-registration" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <input type="hidden" name="userid" value="{{ auth()->user()->id_user}}">
        <div class="col-xl-12">
            <div class="custom-accordion">
                <div class="card">
                    <a href="#personal-data" class="text-dark" data-bs-toggle="collapse">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3"> <i class="uil uil-receipt text-primary h2"></i>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Data Pribadi</h5>
                                    <p class="text-muted text-truncate mb-0">No KK, NIK, Nama, Jenis Kelamin, Scan KTP, TTL, dsb</p>
                                </div>
                                <div class="flex-shrink-0"> <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
                            </div>
                        </div>
                    </a>
                    <div id="personal-data" class="collapse show">
                        <div class="p-5 border-top">
                            <div class="row">
                                <input type="hidden" name="id" value="{{$user->id}}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-nisn">No KK</label>
                                        <input type="number" class="form-control" id="personal-data-nisn" name="nokk" placeholder="Masukkan No Kartu Keluarga">
                                        @error('nokk')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-nik">NIK</label>
                                        <input type="number" class="form-control" id="personal-data-nik" name="nik" placeholder="Masukkan NIK">
                                        @error('nik')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-name">Nama Perwakilan</label>
                                        <input type="text" class="form-control" id="personal-data-name" name="name" placeholder="Masukkan Nama Lengkap">

                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-gender">Jenis
                                            Kelamin</label>
                                        <select class="form-control wide" name="jeniskelamin">
                                            <option disabled selected>Pilih
                                                Jenis Kelamin </option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>

                                        @error('jeniskelamin')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data">Agama</label>
                                        <select class="form-control wide" name="agama">
                                            <option disabled selected>Pilih agama
                                            </option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kong Hu Chu ">Kong Hu Chu</option>
                                            <option value="Lainnya">Etc</option>
                                        </select>
                                        @error('agama')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4 mb-lg-0">
                                        <label class="form-label">Tempat lahir</label>

                                        <input type="text" class="form-control" id="basicpill" name="tempatlahir" placeholder="Masukkan Tempat Lahir">
                                        @error('tempatlahir')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4 mb-lg-0">
                                        <label class="form-label" for="billing-city">Tanggal lahir</label>

                                        <input type="date" class="form-control" id="basicpill" name="tanggallahir" placeholder="Masukkan Tanggal Lahir">

                                        @error('tanggallahir')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <!--<input name="tanggallahir" class="datepicker-default form-control" id="datepicker" >-->
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-0">
                                        <label class="form-label" for="zip-code">Scan KTP</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Upload</span>
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="image">
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="billing-address">Alamat</label>


                                <input type="text" class="form-control" id="billing-address" name="alamat" placeholder="Masukkan alamat lengkap"></input>

                                <!-- <textarea class="form-control" id="billing-address" rows="3" name="alamat" placeholder="Masukkan alamat lengkap"></textarea> -->

                                @error('alamat')
                                <div class="alert alert-warning" role="alert">
                                    <strong>Peringatan!</strong>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-nisn">Email</label>
                                        <input type="email" class="form-control" id="personal-data-nisn" name="email" placeholder="Masukkan email" value="{{$user->email}}">
                                        @error('email')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-nik">No
                                            Hp/WhatsApp</label>
                                        <input type="number" class="form-control" id="basicpill" name="phone" placeholder="Masukkan nomor telepon">

                                        @error('phone')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="custom-accordion">
                <div class="card">
                    <a href="#personal-data" class="text-dark" data-bs-toggle="collapse">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3"> <i class="uil uil-receipt text-primary h2"></i>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Data Kematian</h5>
                                    <p class="text-muted text-truncate mb-0">Pengisian data berupa nama dsb.</p>
                                </div>
                                <div class="flex-shrink-0"> <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
                            </div>
                        </div>
                    </a>
                    <div id="personal-data" class="collapse show">
                        <div class="p-5 border-top">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-name">Nama</label>
                                        <input type="text" class="form-control" id="personal-data-name" name="namemati" placeholder="Masukkan Nama">

                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-nik">NIK</label>
                                        <input type="number" class="form-control" id="personal-data-nik" name="nikmati" placeholder="Masukkan NIK">
                                        @error('nik')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-0">
                                        <label class="form-label" for="zip-code">Scan KTP</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Upload</span>
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="imagemati">
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <div class="text-end mt-2 mt-sm-0">
                            <button type="submit" name="add" class="btn btn-primary">Buat Pendaftaran</button>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
            </div>


        </div>
    </div>
</form>
<!-- end row -->
@endsection

@section('footer')
@endsection