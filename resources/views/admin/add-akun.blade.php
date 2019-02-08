@extends('layouts.admin')


@section('title','Tambah Akun')

@section('content') 

  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Tambah Data Akun</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>

                <div class="col-md-12">
                         <div class="white-box">
                            <h3 class="box-title m-b-0">Form Tambah Akun</h3>
                            <p class="text-muted m-b-30 font-13"> Isi data akun sesuai form yang tersedia. </p>
                             @if($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @foreach($errors->all() as $error)
                            {{$error}}<br>
                            @endforeach
                          </div>
                        @endif
                            <form class="form-horizontal" method="POST" action="{{route('admin.pengaturan.create')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Username*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputuname" placeholder="Masukkan Username" name="username" value="{{ old('username')}}" required>
                                            <div class="input-group-addon"><i class="ti-user"></i></div>

                                        </div>
                                        <span class="help-block error"> Username tidak boleh spasi.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputNama" placeholder="Masukkan Nama" name="name" value="{{ old('name')}}">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">NIK</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputNik" placeholder="Masukkan NIK" name="nik" value="{{ old('nik')}}">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Password*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="exampleInputpwd2" placeholder="Masukkan Password" name="password" required>
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                        </div>
                                        <span class="help-block error"> *Password tidak boleh spasi.</span>
                                        <span class="help-block error"> *Password Min 7 Karakter.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label">Re Password*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="exampleInputpwd2" placeholder="Masukkan Kembali Password" name="password_confirmation" required>
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="form-control selectpicker" data-style="form-control" name="jabatan" id="jabatan">
                                        <option value="">Pilih</option>
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
                                        <option value="" disable="true" selected="true">Pilih</option>
                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Sub Bidang</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="form-control form-control-lg "  data-style="form-control" name="subid" id="subid" disable="true">
                                        <option value="" disable="true" selected="true">Pilih</option>
                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-4 col-sm-8 text-right">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Tambah</button>
                                        <a href="{{route('admin.pengaturan-akun')}}" class="btn btn-info waves-effect waves-light">Kembali</a>
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
