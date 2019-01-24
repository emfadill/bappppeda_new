@extends('layouts.admin')

@section('title','Detail Disposisi Masuk Kabid')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Surat Masuk</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                             <h3 class="box-title m-b-0">Surat Masuk</h3>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$suratmasuk->id}}</td>
                                            <td>{{$suratmasuk->indeks}}</td>
                                            <td>{{$suratmasuk->dari}}</td>
                                            <td>{{$suratmasuk->perihal}}</td>
                                            <td>{{$suratmasuk->tgl_no_suratmasuk}}</td>
                                            <td>{{$suratmasuk->tgl_suratmasuk}}</td>
                                            <td>{{$suratmasuk->tgl_penyelesaian}}</td>
                                            @if ($suratmasuk->jenis_surat == 'Express')
                                                <td><h4><span class="label label-danger label-rouded">{{$suratmasuk->jenis_surat}}</span></h4></td>
                                            @elseif ($suratmasuk->jenis_surat == 'Standar')
                                                <td><h4><span class="label label-success label-rouded">{{$suratmasuk->jenis_surat}}</span></h4></td>
                                            @endif
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModal{{$suratmasuk->id}}">Tampil PDF</a>
                                                <a href="{{action('Admin\AdminController@printPDF')}}" class="btn btn-primary">Tampil PDF</a>
                                            </td>
                                            @if ($suratmasuk->url_disposisi != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalmasukDisposisi{{$suratmasuk->id}}">Disposisi</a></td>
                                            @else
                                            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalmasukDisposisi{{$suratmasuk->id}}">Disposisi</a></td>
                                            @endif
                                            <td>{{$suratmasuk->kepada}}</td>
                                            @if ($suratmasuk->status == 'Terkirim')
                                            <td><h4><span class="label label-info label-rouded">{{$suratmasuk->status}}</span></h4></td>
                                            @elseif ($suratmasuk->status == 'Sudah Disposisi')
                                            <td><h4><span class="label label-success label-rouded">{{$suratmasuk->status}}</span></h4></td>
                                            @endif
                                        </tr>
                                        <div class="modal fade" id="largeModal{{$suratmasuk->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($suratmasuk->url_dokumen)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($suratmasuk->url_disposisi != null)
                                        <div class="modal fade" id="largeModalmasukDisposisi{{$suratmasuk->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($suratmasuk->url_disposisi)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Diteruskan Kekabid</h4>
                    </div>
                    <!-- /.page title -->
                    

                </div>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Surat Masuk Kabid</h3>
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-striped">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>Jabatan</th>
                                            <th>Instruksi</th>
                                            <th>Disposisi</th>
                                            <th>Diteruskan Kepada</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($DM as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            @if($data->get_user->get_jabatan == 'Sekretaris')
                                            <td>{{$data->get_user->get_jabatan->name}}</td>
                                            @else
                                            <td>{{$data->get_user->get_kabid->name}}</td>
                                            @endif
                                            <td>{{$data->instruksi}}</td>
                                                @if ($data->url_disposisi != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalmasukDisposisi{{$data->id}}">Disposisi</a></td>
                                            @else
                                            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalmasukDisposisi{{$data->id}}">Disposisi</a></td>
                                            @endif
                                            <td>{{$data->kepada}}</td>
                                            @if($data->kepada != null)
                                            <td><a href="{{route('admin.detaildm.subid',$data->id)}}" class="btn btn-danger">Detail Disposisi</a></td>
                                            @else
                                            <td></td>
                                            @endif
                                        </tr>
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



                <!-- /.row -->
                <script src="{{asset('js/pdfobject.js')}}"></script>
@endsection
