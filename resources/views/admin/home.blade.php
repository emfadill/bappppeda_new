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
                                            @if ($data->jenis_surat == 'Express')
                                                <td><h4><span class="label label-danger label-rouded">{{$data->jenis_surat}}</span></h4></td>
                                            @elseif ($data->jenis_surat == 'Standar')
                                                <td><h4><span class="label label-success label-rouded">{{$data->jenis_surat}}</span></h4></td>
                                            @endif
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModal{{$data->id}}">Tampil PDF</a>
                                                <a href="{{action('Admin\AdminController@printPDF')}}" class="btn btn-primary">Tampil PDF</a>
                                            </td>
                                            @if ($data->url_disposisi != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalmasukDisposisi{{$data->id}}">Disposisi</a></td>
                                            @else
                                            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalmasukDisposisi{{$data->id}}">Disposisi</a></td>
                                            @endif
                                            <td>{{$data->kepada}}</td>
                                            @if ($data->status == 'Terkirim')
                                            <td><h4><span class="label label-info label-rouded">{{$data->status}}</span></h4></td>
                                            <td></td>
                                            @elseif ($data->status == 'Sudah Disposisi')
                                            <td><h4><span class="label label-success label-rouded">{{$data->status}}</span></h4></td>
                                            <td><a href="{{route('admin.detaildm.kabid',$data->id)}}" class="btn btn-danger">Detail Disposisi</a></td>
                                            @endif

                                        </tr>
                                        <div class="modal fade" id="largeModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($data->url_dokumen)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($data->url_disposisi != null)
                                        <div class="modal fade" id="largeModalmasukDisposisi{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($data->url_disposisi)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
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
                                            <th>Dokumen Tanda Tangan</th>
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
                                            @if ($data->jenis_surat == 'Express')
                                                <td><h4><span class="label label-danger label-rouded">{{$data->jenis_surat}}</span></h4></td>
                                            @elseif ($data->jenis_surat == 'Standar')
                                                <td><h4><span class="label label-success label-rouded">{{$data->jenis_surat}}</span></h4></td>
                                            @endif
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModalkeluar{{$data->id}}">Tampil PDF</a>
                                                <a href="{{action('Admin\AdminController@printPDF')}}" class="btn btn-primary">Tampil PDF</a>
                                            @if ($data->url_dokumen_ttd != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalkeluarTTD{{$data->id}}">Tampil Surat</a></td>
                                            @else
                                                <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalkeluarTTD{{$data->id}}">Tampil Surat</a></td>
                                            @endif
                                                @if ($data->url_disposisi != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalkeluarDisposisi{{$data->id}}">Disposisi</a></td>
                                            @else
                                            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalkeluarDisposisi{{$data->id}}">Disposisi</a></td>
                                            @endif
                                            <td>{{$data->kepada}}</td>
                                            @if ($data->status == 'Terkirim')
                                                <td><h4><span class="label label-info label-rouded">{{$data->status}}</span></h4></td>
                                                <td></td>
                                            @elseif ($data->status == 'Sudah Disposisi')
                                                <td><h4><span class="label label-success label-rouded">{{$data->status}}</span></h4></td>
                                                <td><a href="{{route('admin.detaildk.kabid',$data->id)}}" class="btn btn-danger">Detail Disposisi</a></td>
                                            @elseif ($data->status == 'Disposisi ttd-Manual')
                                                <td><h4><span class="label label-success label-rouded">{{$data->status}}</span></h4></td>
                                                <td><a href="{{route('admin.detaildk.kabid',$data->id)}}" class="btn btn-danger">Detail Disposisi</a></td>
                                            @else
                                                <td><h4><span class="label label-warning label-rouded">{{$data->status}}</span></h4></td>
                                                <td></td>
                                            @endif
                                        </tr>
                                        <div class="modal fade" id="largeModalkeluar{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($data->url_dokumen)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($data->url_disposisi != null)
                                        <div class="modal fade" id="largeModalkeluarDisposisi{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($data->url_disposisi)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($data->url_dokumen_ttd != null)
                                            <div class="modal fade" id="largeModalkeluarTTD{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="{{url($data->url_dokumen_ttd)}}" height="600" width="850" frameborder="0"></iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            
                        </div> 
                        </div>
                    </div>
                </div>



                <!-- /.row -->
                <script src="{{asset('js/pdfobject.js')}}"></script>
@endsection
