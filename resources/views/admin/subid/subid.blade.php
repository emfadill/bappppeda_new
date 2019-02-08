@extends('layouts.admin')


@section('title','Sub Bidang')

@section('content') 

      <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sub Bidang</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Data Sub Bidang</h3>
                             <div class="pull-right">
                            <a href="{{route('admin.subid.add')}}" class="btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-plus-circle"></i>
                            </span>Tambah Sub Bidang</a>
                            </div>
                            <p class="text-muted m-b-30">Pengaturan sub bidang untuk user</p>
                           
                            <div class="table-responsive order-detail-content">
                                <table id="myTable2" class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Kepala Bidang</th>
                                        <th>Sub Bidang</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach ($data as $datas)
                                        <tr>

                                            <td>{{$i}}</td>
                                            <td>{{$datas->get_kabid->name}}</td>
                                            <td>{{$datas->name}}</td>
                                            <td>
                                                <center>
                                             <a class="btn btn-lg btn-info fa fa-pencil" href="{{ route('admin.subid.edit',$datas->id)}}" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Data"></a>
                                                   
                                                <a data-id="{{$datas->id}}"  href="javascript:;" class="btn btn-lg btn-danger fa fa-trash btn-del-cart" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data"></a>
                                            </center>
                                            </td>
                                        </tr>
                                        <?php $i++;
                                             ?>
                                       @endforeach
                                    </tbody>
                                </table>
                            
                        </div> 
                        </div>
                    </div>
                </div>
                <!-- /.row -->

<script src="{{asset('js/app.js')}}"></script>
<script src="js/sweetalert.min.js"></script>
@include('sweet::alert')
 <script>
$('.btn-del-cart').click(function(){
                var id = $(this).attr("data-id");
                var parent = $(this).parents("tr");
                swal({
                    title: "Apakah Anda Yakin?",
                    text: "Apakah Anda yakin akan menghapus data akun ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                      $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                        jQuery.ajax({
                            url: "/konfigurasi-subid/delete/"+ id,
                            method: 'delete',
                            type: 'GET', // For jQuery < 1.9
                            success: function(data){
                                parent.remove();
                                 swal("Berhasil Menghapus Data Akun", {
                                    icon: "success",
                                });
                                if($('tbody tr').length <= 0){
                                    $('.page-title').after('<div class="text-muted" style="text-align:center"><b>Daftar Akun Anda masih kosong.</b></div>');
                                    $('.order-detail-content').remove();
                                } 
                               
                            },
                            error: function (exception) {
                                console.log(exception);
                            }
                        });
                    }
                });
            })
  </script>



@endsection
