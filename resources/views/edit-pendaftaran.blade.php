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
            <i class="fas fa-home" style="margin-left: -32px;"></i>
            <span class="nav-text">Beranda</span>
        </a>
    </li>
    <li><a href="/data-pendaftaran">
            <i class="fa fa-book" style="margin-left: 10px;"></i>
            <span class="nav-text">Data Pendaftar</span>
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
</ul>
@endsection


@section('content')


<div class="row">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
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
                                    <h5 class="font-size-16 mb-1">Ubah Data Pendaftaran</h5>
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
                                        <input type="number" class="form-control" id="personal-data-nisn" name="nokk" placeholder="Masukkan No Kartu Keluarga" value="{{$user->nokk}}">
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
                                        <label class="form-label" for="personal-data-name">Nama Perwakilan</label>
                                        <input type="text" class="form-control" id="personal-data-name" name="name" placeholder="Masukkan Nama Lengkap" value="{{$user->name}}">

                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-nik">No
                                            Hp/WhatsApp</label>
                                        <input type="number" class="form-control" value="{{$user->phone}}" id="basicpill" name="phone" placeholder="Masukkan nomor telepon">
                                        @error('phone')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-name">Nama Almarhum</label>
                                        <input type="text" class="form-control" value="{{$user->namemati}}" id="personal-data-name" name="namemati" placeholder="Masukkan Nama">

                                        @error('name')
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
                            <button type="submit" name="add" class="btn btn-primary">Ubah Pendaftaran</button>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end row -->
@endsection

@section('footer')
@endsection