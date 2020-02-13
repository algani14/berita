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

                    <form action="{{route('tabungan.store')}}" method="post">
                        @csrf
                        <div class = "row">
                            <div class="col-md-4">
                                <label for="">Pilih Nama siswa</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="siswa_id" class="form-control">
                                     @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}-{{$item->kelas}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-4">
                                <label for="">Masukan Uang</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" type="number" name="jumlah_uang">
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
