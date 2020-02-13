@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tabungan Siswa
                    <a href="{{route('tabungan.create')}}" class="float-right" class="btn btn-dark">
                        Tambah
                    </a>
                    </div>
                    <div class="card-body">
                          @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Siswa</th>
                                        <th>Nama Kelas</th>
                                        <th>Jumlah Uang Tabungan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($tabungan as $data)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$data->siswa->nama}}</td>
                                            <td>{{$data->siswa->kelas}}</td>
                                            <td>{{$data->jumlah_uang}}</td>
                                            <td>
                                                <form action="{{route('tabungan.destroy' , $data->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td><a class="btn btn-info" href=" {{route('tabungan.show' , $data->id) }} ">lihat</a></td>
                                                <td><a class=" btn btn-warning" href=" {{route('tabungan.edit' , $data->id) }}">edit</a></td>
                                                <td><button type="submit" class="btn btn-danger">Delete</button></td>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
