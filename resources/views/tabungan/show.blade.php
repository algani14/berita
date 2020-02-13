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


                        <div class = "row">
                            <div class="col-md-4">
                                <label for="">pilih nama siswa</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="siswa_id" readonly class="form-control">

                                    <option value="{{$data->id}}"
                                       readonly >{{$data->siswa->nama}} -
                                        {{$data->siswa->kelas}}</option>

                                    </select>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-4">
                                <label for="">Masukan Uang</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" readonly type="number" name="jumlah_uang"
                                value="{{$data->jumlah_uang}}">
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
