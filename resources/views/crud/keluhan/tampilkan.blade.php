@extends('layouts.app')
@section('content')

<div class="panel panel-info">
    <div class="panel-heading">
        <center>
        <h1>
        DAFTAR KELUHAN
        </h1>
        </center>
    </div>
    <div class="panel-body">
        
        <table class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Jenis Keluhan</th>
                    <th>Isi Keluhan</th>
                    <th>Status Keluhan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php(
                    $no = 1
                    )

                @foreach($keluhans as $keluhan)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$keluhan->jenis_keluhan}}</td>
                        <td>{{$keluhan->isi_keluhan}}</td>
                        <td>{{$keluhan->status_keluhan}}</td>
                        <td>
                        <a href="{{ URL('keluhan/edit') }}/{{ $keluhan->id_keluhan }}" class="btn btn-sm btn-raised btn-info">Edit</a>
                        <!-- <a href="keluhan/destroy/{{$keluhan->id_keluhan}}" class="btn btn-sm btn-raised btn-danger">Hapus</a> -->
                        <form action="/keluhan/{{$keluhan->id_keluhan}}" method="post">
                        <input type="hidden" name="_method" value="delete"></input>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"></input>
                        <button type="submit" name="name" class="btn btn-sm btn-raised btn-danger">Delete</button>    
                        </form>
                        </td>
                    </tr>
    
                @endforeach

                
            </tbody>
        </table>
    </div>
</div>
@stop