@extends('layouts.admin')


@section('title','Edit Akun')

@section('content') 

  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Data Jabatan</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>

                <div class="col-md-12">
                         <div class="white-box">
                            <h3 class="box-title m-b-0">Form edit nama jabatan</h3>
                            <p class="text-muted m-b-30 font-13"> Isi form edit untuk mengubah nama jabatan </p>
                             @if($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @foreach($errors->all() as $error)
                            {{$error}}<br>
                            @endforeach
                          </div>
                        @endif
                            <form class="form-horizontal" method="POST" action="{{route('admin.jabatan.update',$data->id)}}">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Nama Jabatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputNama" placeholder="Masukkan Nama" name="name" value="{{$data->name}}">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-4 col-sm-8 text-right">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Perbarui</button>
                                        <a href="{{route('admin.jabatan')}}" class="btn btn-info waves-effect waves-light">Kembali</a>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
<script src="{{asset('js/app.js')}}"></script>
<script src="js/sweetalert.min.js"></script>
@include('sweet::alert')
@endsection