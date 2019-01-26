@extends('layouts.admin')

@section('title','Detail Disposisi Keluar Kabid')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Surat Keluar</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Surat Keluar</h3>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$suratkeluar->id}}</td>
                                            <td>{{$suratkeluar->indeks}}</td>
                                            <td>{{$suratkeluar->dari}}</td>
                                            <td>{{$suratkeluar->tujuan}}</td>
                                            <td>{{$suratkeluar->perihal}}</td>
                                            <td>{{$suratkeluar->tgl_no_suratkeluar}}</td>
                                            <td>{{$suratkeluar->tgl_suratkeluar}}</td>
                                            @if ($suratkeluar->jenis_surat == 'Express')
                                                <td><h4><span class="label label-danger label-rouded">{{$suratkeluar->jenis_surat}}</span></h4></td>
                                            @elseif ($suratkeluar->jenis_surat == 'Standar')
                                                <td><h4><span class="label label-success label-rouded">{{$suratkeluar->jenis_surat}}</span></h4></td>
                                            @endif
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModalkeluar{{$suratkeluar->id}}">Tampil PDF</a>
                                                <a href="{{action('Admin\AdminController@printPDF')}}" class="btn btn-primary">Tampil PDF</a>
                                            @if ($suratkeluar->url_dokumen_ttd != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalkeluarTTD{{$suratkeluar->id}}">Tampil PDF</a></td>
                                            @else
                                                <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalkeluarTTD{{$suratkeluar->id}}">Tampil PDF</a></td>
                                            @endif
                                                @if ($suratkeluar->url_disposisi != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalkeluarDisposisi{{$suratkeluar->id}}">Disposisi</a></td>
                                            @else
                                            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalkeluarDisposisi{{$suratkeluar->id}}">Disposisi</a></td>
                                            @endif
                                            <td>{{$suratkeluar->kepada}}</td>
                                            @if ($suratkeluar->status == 'Terkirim')
                                            <td><h4><span class="label label-info label-rouded">{{$suratkeluar->status}}</span></h4></td>
                                            @elseif ($suratkeluar->status == 'Sudah Disposisi')
                                            <td><h4><span class="label label-success label-rouded">{{$suratkeluar->status}}</span></h4></td>
                                            @endif
                                        </tr>
                                        <div class="modal fade" id="largeModalkeluar{{$suratkeluar->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($suratkeluar->url_dokumen)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($suratkeluar->url_disposisi != null)
                                        <div class="modal fade" id="largeModalkeluarDisposisi{{$suratkeluar->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($suratkeluar->url_disposisi)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($suratkeluar->url_dokumen_ttd != null)
                                            <div class="modal fade" id="largeModalkeluarTTD{{$suratkeluar->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="{{url($suratkeluar->url_dokumen_ttd)}}" height="600" width="850" frameborder="0"></iframe>
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
                            <h3 class="box-title m-b-0">Data Surat Keluar Kabid</h3>
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-striped">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>Jabatan</th>
                                            {{--<th>Instruksi</th>--}}
                                            <th>Disposisi</th>
                                            <th>Diteruskan Kepada</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$DK->id}}</td>
                                            @if($DK->get_user->get_jabatan == 'Sekretaris')
                                            <td>{{$DK->get_user->get_jabatan->name}}</td>
                                            @else
                                            <td>{{$DK->get_user->get_kabid->name}}</td>
                                            @endif
                                            {{--<td>{{$DK->instruksi}}</td>--}}
                                                @if ($DK->url_disposisi != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalkeluarDisposisi{{$DK->id}}">Disposisi</a></td>
                                            @else
                                            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalkeluarDisposisi{{$DK->id}}">Disposisi</a></td>
                                            @endif
                                            <td>{{$DK->kepada}}</td>
                                            @if($DK->kepada != null)
                                            <td><a href="{{route('admin.detaildk.subid',$DK->id)}}" class="btn btn-danger">Detail Disposisi</a></td>
                                            @else
                                            <td></td>
                                            @endif
                                        </tr>
                                        @if ($DK->url_disposisi != null)
                                        <div class="modal fade" id="largeModalkeluarDisposisi{{$DK->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{url($DK->url_disposisi)}}" height="600" width="850" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($DK->url_dokumen_ttd != null)
                                            <div class="modal fade" id="largeModalkeluarTTD{{$DK->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">PDF</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="{{url($DK->url_disposisi)}}" height="600" width="850" frameborder="0"></iframe>
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
                        <h4 class="page-title">Diteruskan KeSubid</h4>
                    </div>
                    <!-- /.page title -->
                    

                </div>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Surat Keluar Subid</h3>
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-striped">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>Jabatan</th>
                                            <th>Disposisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($DKS as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->get_user->get_subid->name}}</td>
                                                @if ($data->url_disposisi != null)
                                            <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModalkeluarDisposisi{{$data->id}}">Disposisi</a></td>
                                            @else
                                            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#largeModalkeluarDisposisi{{$data->id}}">Disposisi</a></td>
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
