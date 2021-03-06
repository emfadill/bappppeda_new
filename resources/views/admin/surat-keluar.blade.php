@extends('layouts.admin')


@section('title','Form Surat Keluar')

@section('content')
    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

    <style type="text/css">
        body{
            margin-top:40px;
        }

        .cursor-not-allow {
            cursor: not-allowed !important;
        }

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }
        .stepwizard-row:after {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #00AEEF;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
            background-color: #00AEEF;
        }
    </style>


      <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Form Data Surat Keluar</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Silahkan Isi Form Surat Keluar</h3>

                            @if($errors->count() > 0)
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    @foreach($errors->all() as $error)
                                        {{$error}}<br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" class="btn btn-primary btn-circle" style="color: #ffffff">1</a>
                                        <p>Scan atau Upload Surat Keluar</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" class="btn btn-default btn-circle cursor-not-allow" disabled style="color: #ffffff">2</a>
                                        <p>Masukkan Title dan Subject</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-3" class="btn btn-default btn-circle cursor-not-allow" disabled style="color: #ffffff">3</a>
                                        <p>Pilih Jenis Surat</p>
                                    </div>
                                </div>
                            </div>
                            <form role="form" action="{{route('admin.surat-keluar.upload')}}" enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <div class="row setup-content" id="step-1">
                                    <div class="col-xs-12">
                                        <div class="row">
                                        <div class="col-md-12">
                                            <h3> Step 1</h3>
                                            <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                                                <input type="file" id="input-file-now-custom-2" name="file" class="dropify" data-height="300" required="required" />
                                                <button href="#" class="btn btn-lg btn-info center-block" data-toggle="modal" data-target="#largeModal" value="Preview" onclick="PreviewImage();">Lihat Dokumen</button>


                                            </div>


                                            </div>
                                            <div class="row">
                                                <button class="btn btn-info nextBtn btn-lg pull-right cursor-not-allow" type="button" >Selanjutnya</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="myModalLabel"><span class="label label-info label-rouded">Lihat Dokumen</span></h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div style="clear:both">
                                                        <iframe id="viewer" frameborder="0" scrolling="no" width="850" height="600"></iframe>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row setup-content" id="step-2">
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <h3> Step 2</h3>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-xs-4 control-label text-right">Indeks</label>
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control" name="indeks" required /><br>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xs-4 control-label text-right">Dari</label>
                                                    <div class="col-xs-5">

                                                        <input type="text" class="form-control" name="dari" required/><br>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <label class="col-xs-4 control-label text-right">Tujuan</label>
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control" name="tujuan" required/><br>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xs-4 control-label text-right">Perihal</label>
                                                    <div class="col-xs-5">
                                                        <textarea class="form-control" rows="5" name="perihal" required></textarea><br>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xs-4 control-label text-right">Tgl / No Surat
                                                    </label>
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control" name="tgl_no_surat" required /><br>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xs-4 control-label text-right">Tgl Surat Keluar</label>
                                                    <div class="col-xs-5">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="datepicker-autoclosed" placeholder="mm/dd/yyyy" name="tgl_surat_keluar" required><span class="input-group-addon"><i class="icon-calender"></i></span>
                                                    </div>

                                                </div>

                                            </div>
                                            <button class="btn btn-info nextBtn btn-lg pull-right" type="button" >Selanjutnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row setup-content" id="step-3">
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <h3> Step 3</h3>
                                            <div class="form-group col-xs-4">
                                                <div class="radio radio-danger pull-right">
                                                    <input type="radio" name="jenis_surat" id="radio6" value="Express">
                                                    <label for="radio6"><h2><span class="btn btn-lg btn-danger btn-rounded waves-effect waves-light"><i class="fa fa-envelope-o"></i> Express</span></h2></label>
                                                    {{--<label for="radio6" class="btn btn-lg btn-danger btn-rounded waves-effect waves-light"><i class="fa fa-envelope-o"></i> Express </label>--}}
                                                </div>
                                            </div>
                                            <div class="form-group col-xs-5">
                                                <div class="radio radio-success pull-right">
                                                    <input type="radio" name="jenis_surat" id="radio7" value="Standar">
                                                    <label for="radio7"><h2><span class="btn btn-lg btn-success btn-rounded waves-effect waves-light"><i class="fa fa-envelope-o"></i> Standar</span></h2> </label>
                                                    {{--<label for="radio7" class="btn btn-lg btn-success btn-rounded waves-effect waves-light"><i class="fa fa-envelope-o"></i> Standar </label>--}}
                                                </div>
                                            </div>

                                            </div>
                                        <button class="btn btn-success btn-lg pull-right" type="submit">KIRIM</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
                <!-- /.row -->
                    <script src="{{asset('js/app.js')}}"></script>
                    @include('sweet::alert')

    <script type="text/javascript">
        function PreviewImage() {
            pdffile=document.getElementById("input-file-now-custom-2").files[0];
            pdffile_url=URL.createObjectURL(pdffile);
            $('#viewer').attr('src',pdffile_url);
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#input-file-now-custom-2').change(function () {
                if ($(this).val() === '' || $(this).val() === null) {
                    $('.nextBtn').addClass('cursor-not-allow');
                } else {
                    $('.nextBtn').removeClass('cursor-not-allow');
                }
            });
            $('.dropify-clear').click( function () {
                $('.nextBtn').addClass('cursor-not-allow');
            });

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url'],input[type='file'],input[type='date']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');

            $('#datepicker-autoclosed').datepicker({
                autoclose: true,
                todayHighlight: true,
                orientation: 'auto',
                format: 'yyyy/mm/dd'
            });
        });

    </script>
@endsection
