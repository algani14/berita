@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah siswa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('siswa.update' , $siswa->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class = "row">
                            <div class="col-md-4">
                                <label for="">Masukan Nama siswa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$siswa->nama}}" name="nama">
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-4">
                                <label for="">Masukan Kelas</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$siswa->kelas}}" name="kelas">
                            </div>
                        </div>
                        <button class="btn-dark" type="submit">Simpan</button>
                        <button class="btn-danger" type="reset">Reset</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
