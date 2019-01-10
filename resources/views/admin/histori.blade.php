@extends('layouts.admin')


@section('title','Histori Surat')

@section('content') 

      <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Histori Surat</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>
                <!-- .row -->
                <div class="row">
                  <div class="col-md-12">
                        <div class="white-box">
                             <h3 class="box-title m-b-0">Surat Masuk</h3>
                            <p class="text-muted m-b-30">Histori surat masuk terbaru</p>
                            <div class="table-responsive">
                                <table id="myTable1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Indeks</th>
                                            <th>Dari</th>
                                            <th>Perihal</th>
                                            <th>Tgl / Nomor Surat</th>
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
                                            <td><a class="btn btn-block btn-primary fa fa-download" href="{{asset('storage/surat_masuk/'.$data->dokumen)}}"></a></td>
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
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                 <!-- .row -->
                <div class="row">
                  <div class="col-md-12">
                        <div class="white-box">
                             <h3 class="box-title m-b-0">Surat Keluar</h3>
                            <p class="text-muted m-b-30">Histori surat keluar terbaru</p>
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Index</th>
                                            <th>Dari</th>
                                            <th>Tujuan</th>
                                            <th>Perihal</th>
                                            <th>Tgl / Nomor Surat</th>
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
                                            <td><a class="btn btn-block btn-primary fa fa-download" href="{{asset('storage/surat_keluar/'.$data->dokumen)}}"></a></td>
                                            <td><a class="btn btn-block btn-primary fa fa-download" href="{{asset('storage/surat_keluar/disposisi/'.$data->disposisi)}}"></a></td>
                                            <td>{{$data->kepada}}</td>
                                            <td>{{$data->status}}</td>
                                            <form action="{{ route('admin.pengaturan.delete',$data->id) }}" id="delete" method="POST">  {{ csrf_field() }}
                                                {{method_field('delete')}}

                                                <td><a class="btn btn-block btn-info fa fa-pencil" href="{{ route('admin.edit-akun',$data->id)}}"></a>

                                                    <a data-id="{{$data->id}}"  href="javascript:;" class="btn btn-block btn-danger fa fa-trash btn-del-cart"></a>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

@endsection
