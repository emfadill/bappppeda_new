@extends('layouts.admin')


@section('title','Edit Akun')

@section('content') 

  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Data Akun</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>

                <div class="col-md-12">
                         <div class="white-box">
                            <h3 class="box-title m-b-0">Form with right icon</h3>
                            <p class="text-muted m-b-30 font-13"> Use Bootstrap's predefined grid classes for horizontal form </p>
                             @if($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @foreach($errors->all() as $error)
                            {{$error}}<br>
                            @endforeach
                          </div>
                        @endif
                            <form class="form-horizontal" method="POST" action="{{route('admin.pengaturan.update',$data->id)}}">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Username*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputuname" placeholder="Masukkan Username" name="username" value="{{$data->username}}">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputNama" placeholder="Masukkan Nama" name="name" value="{{$data->name}}">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">NIK</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputNik" placeholder="Masukkan NIK" name="nik" value="{{ $data->nik}}">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="form-control selectpicker" data-style="form-control" name="jabatan" id="jabatan">
                                        <option value="{{$data->get_jabatan->id}}">{{$data->get_jabatan->name}}</option>
                                        @foreach ($jabatan as $jbtn)
                                        <option value="{{$jbtn->id}}">{{$jbtn->name}}</option>
                                        @endforeach
                                    </select>
                                        </div>
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Kepala Bidang</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="form-control form-control-lg" data-style="form-control" name="kabid" id="kabid" disable="true" >
                                                @if ($data->kabid_id != null)
                                        <option value="{{$data->get_kabid->id}}" disable="true" selected="true">{{$data->get_kabid->name}}</option>
                                        @else
                                        <option value="" disable="true" selected="true">Pilih</option>
                                        @endif
                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Sub Bidang</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="form-control form-control-lg "  data-style="form-control" name="subid" id="subid" disable="true">
                                                @if ($data->subid_id != null)
                                        <option value="{{$data->get_subid->id}}" disable="true" selected="true">{{$data->get_subid->name}}</option>
                                        @else
                                        <option value="" disable="true" selected="true">Pilih</option>
                                        @endif
                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Password*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="exampleInputpwd2" placeholder="Masukkan Password" name="password">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label">Re Password*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="exampleInputpwd2" placeholder="Masukkan Kembali Password" name="password_confirmation">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                 
                              
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9 text-right">
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
<script src="{{asset('js/app.js')}}"></script>
<script src="js/sweetalert.min.js"></script>
  <script>
    $('#jabatan').on('change', function(e){
        console.log(e);
        var jabatan_id = e.target.value;
        $.get('/json-kabid?jabatan_id=' + jabatan_id,function(data) {
            $('#kabid').empty();
            $('#kabid').append('<option value="" disable="true" selected="true">Pilih</option>');

             $('#subid').empty();
            $('#subid').append('<option value="" disable="true" selected="true">Pilih</option>');

            $.each(data, function(index, distObj){
            console.log(data);
              $('#kabid').append('<option value="'+ distObj.id +'">'+ distObj.name +'</option>');
            })
          });
        });
    $('#kabid').on('change', function(e){
        console.log(e);
        var kabid_id = e.target.value;
        $.get('/json-subid?kabid_id=' + kabid_id,function(data) {
            $('#subid').empty();
            $('#subid').append('<option value="" disable="true" selected="true">Pilih</option>');

            $.each(data, function(index, distObj){
            console.log(data);
              $('#subid').append('<option value="'+ distObj.id +'">'+ distObj.name +'</option>');
            })
          });
        });

                    </script>
@include('sweet::alert')
@endsection