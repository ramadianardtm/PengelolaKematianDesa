@extends('master.master-layout')

@section('title')
Data Pendaftaran
@endsection

@section('header')
@endsection

@section('navbar')
@parent
@endsection


@section('menunya')
List Pendaftaran
@endsection

@section('menu')

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
</head>
<ul class="metismenu text-center" id="menu">
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
    <li><a href="/data-pendaftaran">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fa fa-book"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Data Pendaftar</span>
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
</ul>

@endsection

@section('content')

<!--Buat Admin-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-9">
                    <h4 class="card-title">Data Pendaftaran</h4>
                </div>
                <div class="col-sm-2">
                    <a href="/download" class="btn btn-primary" href="">Download PDF</a>
                </div>
            </div>
            <div class="card-body" id="cetak">
                <div class="table-responsive">
                    @csrf
                    <table id="example" class="display" style="min-width: 1200px;">
                        <thead style="font-size: 15px; height: 50px;">
                            <tr>
                                <th hidden>ID</th>
                                <th>No</th>
                                <th>Nama Perwakilan</th>
                                <th>Nama Almarhum</th>
                                <th>No KK</th>
                                <th>No Whatsapp</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach($data as $index => $pd)
                        <tbody style="font-size: 13px">
                            <tr>
                                <td class="id" hidden>{{$pd->id}}</td>
                                <td class="no">{{ $index +1 }}</td>
                                <td class="name">{{ $pd->name }}</td>
                                <td class="namemati">{{ $pd->namemati }}</td>
                                <td class="nokk">{{ $pd->nokk }}</td>
                                <td class="phone">{{ $pd->phone }}</td>
                                <td>{{ $pd->created_at }}</td>
                                <td>
                                    <a href="editpendaftaran/{{$pd->id}}" class="btn btn-primary">Edit</a>
                                    <a href="delete/{{$pd->id}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Delete</a>
                                </td>
                                <!-- <td style="padding: 13px;">
                                    <div class="d-flex">
                                        <a class="btn btn-light shadow btn-xs sharp me-1" title="Detail Registration" href=""><i class="fa fa-file-alt"></i></a>
                                        <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit" href=""><i class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash" data-bs-toggle="modal" data-bs-target=""></i></a>
                                        <div class="modal fade delete" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center"><i class="fa fa-trash"></i><br> Anda yakin ingin
                                                        menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tidak</button>
                                                        <a href="">
                                                            <button type="submit" class="btn btn-danger shadow">
                                                                Ya, Hapus Data!
                                                            </button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td> -->
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).on('click', '.edit', function() {
        var _this = $(this).parents('tr');
        $('#id').val(_this.find('.id').text());
        $('#name').val(_this.find('.name').text());
        $('#namemati').val(_this.find('.namemati').text());
        $('#nokk').val(_this.find('.nokk').text());
        $('#phone').val(_this.find('.phone').text());
    });
</script>

@endsection

@section('footer')
@endsection