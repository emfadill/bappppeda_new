@extends('layouts.admin')

@section('title','Menu Utama')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Surat Masuk Terbaru</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                             <h3 class="box-title m-b-0">Data Surat Masuk</h3>
                            <p class="text-muted m-b-30">List surat masuk terbaru</p>
                            <div class="table-responsive">
                                <table id="myTable1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Indeks</th>
                                            <th>Dari</th>
                                            <th>Perihal</th>
                                            <th>Tgl/Nomor Surat Masuk</th>
                                            <th>Tgl Surat Masuk</th>
                                            <th>Tgl Penyelesaian</th>
                                            <th>Jenis Surat</th>
                                            <th>Dokumen</th>
                                            <th>Disposisi</th>
                                            <th>Diteruskan Kepada</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($suratmasuk as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->indeks}}</td>
                                            <td>{{$data->dari}}</td>
                                            <td>{{$data->perihal}}</td>
                                            <td>{{$data->tgl_no_suratmasuk}}</td>
                                            <td>{{$data->tgl_suratmasuk}}</td>
                                            <td>{{$data->tgl_penyelesaian}}</td>
                                            <td>{{$data->jenis_surat}}</td>
                                            <td><a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#largeModal">Tampil PDF</a>
                                                <a href="{{action('Admin\AdminController@printPDF')}}" class="btn btn-lg btn-primary">Tampil PDF</a>
                                            </td>
                                            <td><a class="btn btn-block btn-primary fa fa-download" href="{{asset('storage/surat_masuk/disposisi/'.$data->disposisi)}}"></a></td>
                                            <td>{{$data->kepada}}</td>
                                            <td>{{$data->status}}</td>
                                                <form action="{{ route('admin.pengaturan.delete',$data->id) }}" id="delete" method="POST">  {{ csrf_field() }}
                                            {{method_field('delete')}}

                                            <td><a class="btn btn-block btn-info fa fa-pencil" href="{{ route('admin.edit-akun',$data->id)}}"></a>

                                                <a data-id="{{$data->id}}"  href="javascript:;" class="btn btn-block btn-danger fa fa-trash btn-del-cart"></a>
                                            </td>
                                            </form>
                                        </tr>
                                        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($data->url_dokumen)}}" height="600" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Surat Keluar Terbaru</h4>
                    </div>
                    <!-- /.page title -->
                    

                </div>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Surat Keluar</h3>
                            <p class="text-muted m-b-30">List surat keluar terbaru</p>
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Index</th>
                                            <th>Dari</th>
                                            <th>Tujuan</th>
                                            <th>Perihal</th>
                                            <th>Tgl/Nomor Surat Keluar</th>
                                            <th>Tgl Surat Keluar</th>
                                            <th>Jenis Surat</th>
                                            <th>Dokumen</th>
                                            <th>Disposisi</th>
                                            <th>Diteruskan Kepada</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($suratkeluar as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->indeks}}</td>
                                            <td>{{$data->dari}}</td>
                                            <td>{{$data->tujuan}}</td>
                                            <td>{{$data->perihal}}</td>
                                            <td>{{$data->tgl_no_suratkeluar}}</td>
                                            <td>{{$data->tgl_suratkeluar}}</td>
                                            <td>{{$data->jenis_surat}}</td>
                                            <td><a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#largeModalkeluar">Tampil PDF</a></td>
                                            <td></td>
                                            <td>{{$data->kepada}}</td>
                                            <td>{{$data->status}}</td>
                                            <form action="{{ route('admin.pengaturan.delete',$data->id) }}" id="delete" method="POST">  {{ csrf_field() }}
                                                {{method_field('delete')}}

                                                <td><a class="btn btn-block btn-info fa fa-pencil" href="{{ route('admin.edit-akun',$data->id)}}"></a>

                                                    <a data-id="{{$data->id}}"  href="javascript:;" class="btn btn-block btn-danger fa fa-trash btn-del-cart"></a>
                                                </td>
                                            </form>
                                        </tr>
                                        <div class="modal fade" id="largeModalkeluar" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($data->url_dokumen)}}" height="600" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            
                        </div> 
                        </div>
                    </div>
                </div>



                <!-- /.row -->
                <!-- <script src="{{asset('js/pdfobject.js')}}"></script> -->
@endsection
