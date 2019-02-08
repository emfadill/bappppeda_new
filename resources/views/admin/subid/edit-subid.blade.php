@extends('layouts.admin')


@section('title','Edit Data Sub Bidang')

@section('content') 

  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Data Sub Bidang</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>

                <div class="col-md-12">
                         <div class="white-box">
                            <h3 class="box-title m-b-0">Form Sub Bidang</h3>
                            <p class="text-muted m-b-30 font-13"> Isi form edit untuk mengubah nama jabatan sub bidang. </p>
                             @if($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @foreach($errors->all() as $error)
                            {{$error}}<br>
                            @endforeach
                          </div>
                        @endif
                            <form class="form-horizontal" method="POST" action="{{route('admin.subid.update',$data->id)}}">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Kepala Bidang</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="selectpicker" data-style="form-control" name="kabid">
                                        <option value="{{$data->get_kabid->id}}">{{$data->get_kabid->name}}</option>
                                        @foreach ($kabid as $kabids)
                                        <option value="{{$kabids->id}}">{{$kabids->name}}</option>
                                        @endforeach
                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Nama Sub Bidang</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputNama" placeholder="Masukkan Nama" name="name" value="{{$data->name}}">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9 text-right">
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Perbarui</button>
                                        <a href="{{route('admin.subid')}}" class="btn btn-info waves-effect waves-light m-t-10">Kembali</a>
                                    </div>
                                </div>
                                  
                            </form>
                        </div>
                    </div>
<script src="{{asset('js/app.js')}}"></script>
<script src="js/sweetalert.min.js"></script>
@include('sweet::alert')
@endsection