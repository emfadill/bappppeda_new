<!DOCTYPE html>
<html>
<head>

    <!-- <script src="https://www.gstatic.com/firebasejs/5.8.1/firebase.js"></script> -->

    <script src="https://www.gstatic.com/firebasejs/5.5.2/firebase.js"></script>
    
    <script src="https://www.gstatic.com/firebasejs/5.5.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.2/firebase-messaging.js"></script>
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <!-- <script src="{{asset('firebase-messaging-sw.js')}}"></script> -->
    <script src="{{asset('main.js')}}"></script>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="emfadill">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/plugins/images/logo_bpd.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="{{asset('admin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Wizard CSS -->
    <link href="{{asset('admin/plugins/bower_components/jquery-wizard-master/css/wizard.css')}}" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="{{asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
    <!-- animation CSS -->
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('admin/css/colors/blue.css')}}" id="theme"  rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{asset('admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- page CSS -->
    <link href="{{asset('admin/plugins/bower_components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/plugins/bower_components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/bower_components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/bower_components/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />

    {{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="fix-sidebar fix-header">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <!-- Toggle icon for mobile view -->
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <!-- Logo -->
                <div class="top-left-part">
                    <a class="logo" href="{{ route('admin.home')}}">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b><img src="{{asset('admin/plugins/images/logo-bappppeda-kecil2.png')}}" alt="home" /></b>
                        <!-- Logo text image you can use text also -->
                        {{--<span class="hidden-xs"><img src="{{asset('admin/plugins/images/pixeladmin-text.png')}}" alt="home" /></span>--}}
                        <b>BAPPPPEDA</b>
                    </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left hidden-xs">


                </ul>
                <!-- This is the message dropdown -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">

                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" id="notif">
                            <i class="icon-envelope"></i>
                            {{--<div class="notify"><span class="heartbit"></span><span class="point"></span></div>--}}

                           <div id="notif_baru">
                               <script type="text/javascript">

                                   localStorage.setItem("NOTIF", 0);
                                   setInterval(function () {


                                   var notif_masuk = localStorage.getItem("NOTIF");
                                   if(notif_masuk == 1){
                                       var notif_a = "<div class='notify'><span class='heartbit'></span><span class='point'></span></div>";
                                       document.getElementById("notif_baru").innerHTML = notif_a;
                                       /*document.write(notif_a);*/

                                   } else {
                                       document.getElementById("notif_baru").innerHTML = "<div class='notify'><span class=''></span><span class=''></span></div>";
                                       // document.body.innerHTML = "coba";
                                   }

                                   },1000);
                               </script>
                           </div>

                            <div class="notify"><span class=""></span><span class=""></span></div>
                        </a>
                        <!-- .dropdown-messages -->
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title"><h4><span class="label label-info col-md-12 text-center">Surat Masuk / Keluar Terbaru</span></h4></div>
                            </li>
                            <li>
                                <div class="message-center">
                                    
                                    <a href="{{ route('admin.home')}}" onclick="clickMessages()" >
                                        
                                        <div id="messages">
                                            
                                        </div>
                                    </a>
                                    
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);" id="messages" onclick="clearMessages()"> <strong>Hapus Notifikasi</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- .Task dropdown -->

                    <!-- /.Task dropdown -->
                    <!-- .user dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{asset('admin/plugins/images/users/logo-bappppeda-user.png')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{Auth()->User()->name}}</b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"></i>Logout</a></li>
                                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </ul>
                        <!-- /.user dropdown-user -->
                    </li>
                    <!-- /.user dropdown -->
                    
                   
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- Search input-group this is only view in mobile -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                        </span>
                        </div>
                        <!-- / Search input-group this is only view in mobile-->
                    </li>
                    <!-- User profile-->
                    
                    <!-- User profile-->
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li><a href="{{ route('admin.home')}}" class="waves-effect"><i data-icon="Z" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Beranda</span></a> </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect"><i data-icon="'" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Surat<span class="fa arrow"></span></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('admin.surat-masuk')}}" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i>Surat Masuk</a></li>
                            <li><a href="{{route('admin.surat-keluar')}}"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i>Surat Keluar</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('admin.histori')}}" class="waves-effect"><i data-icon="f" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Histori Surat</span></a> 
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect"><i data-icon="'" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Akun<span class="fa arrow"></span></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('admin.pengaturan-akun')}}" class="waves-effect"><i data-icon="&#xe005;" class="linea-icon linea-basic fa-fw"></i>Pengaturan Akun</a></li>
                            <li><a href="{{route('admin.jabatan')}}"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i>Konfigurasi Jabatan</a></li>
                            <li><a href="{{route('admin.kabid')}}"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i>Konfigurasi Kepala Bidang</a></li>
                            <li><a href="{{route('admin.subid')}}"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i>Konfigurasi Sub Bidang</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-sidebar end -->

        @yield('content')


        </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; BAPPPPEDA </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    {{--<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>--}}
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>

<!--slimscroll JavaScript -->
<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('admin/js/waves.js')}}"></script>
 <!-- Form Wizard JavaScript -->
<script src="{{asset('admin/plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js')}}"></script>
<!-- FormValidation -->
<link rel="stylesheet" href="{{asset('admin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css')}}">
<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="{{asset('admin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js')}}"></script>
<script src="{{asset('admin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js')}}"></script>
<!-- Plugin JavaScript -->
    <script src="{{asset('admin/plugins/bower_components/moment/moment.js')}}"></script>
 <!-- Custom Theme JavaScript -->
<script src="{{asset('admin/js/custom.min.js')}}"></script>
<script src="{{asset('admin/js/jasny-bootstrap.js')}}"></script>
<script src="{{asset('admin/plugins/bower_components/switchery/dist/switchery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bower_components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/bower_components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('admin/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('admin/plugins/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
<!-- jQuery file upload -->
<script src="{{asset('admin/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Clock Plugin JavaScript -->
<script src="{{asset('admin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>

    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>


<script type="text/javascript">
    (function() {
        $('#exampleBasic').wizard({
            onFinish: function() {
                alert('finish');
            }
        });
        $('#exampleBasic2').wizard({
            onFinish: function() {
                alert('finish');
            }
        });
        $('#exampleValidator').wizard({
            onInit: function() {
                $('#validation').formValidation({
                    framework: 'bootstrap',
                    fields: {
                        file: {
                            validators: {
                                notEmpty: {
                                    message: 'Upload dokumen terlebih dahulu.'                                }
                            
                            }
                        },
                        indeks: {
                            validators: {
                                notEmpty: {
                                    message: 'Indeks tidak boleh kosong.'
                                },
                            }
                        },
                        tgl_selesai: {
                            validators: {
                                notEmpty: {
                                    message: 'Tanggal tidak boleh kosong.'
                                },
                            }
                        },
                        dari: {
                            validators: {
                                notEmpty: {
                                    message: 'Dari tidak boleh kosong.'
                                },
                            }
                        },
                        perihal: {
                            validators: {
                                notEmpty: {
                                    message: 'Perihal tidak boleh kosong.'
                                },
                            }
                        },
                        tgl_no_surat: {
                            validators: {
                                notEmpty: {
                                    message: 'No surat tidak boleh kosong.'
                                },
                            }
                        },
                        /*password: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                different: {
                                    field: 'username',
                                    message: 'The password cannot be the same as username'
                                }
                            }
                        }*/
                    }
                });
            },
            validator: function() {
                var fv = $('#validation').data('formValidation');
                var $this = $(this);
                // Validate the container
                fv.validateContainer($this);
                var isValidStep = fv.isValidContainer($this);
                if (isValidStep === false || isValidStep === null) {
                    return false;
                }
                return true;
            },
            onFinish: function() {
                $('#validation').submit();
                console.log(data);
                // alert('finish');
            }
        });
        $('#accordion').wizard({
            step: '[data-toggle="collapse"]',
            buttonsAppendTo: '.panel-collapse',
            templates: {
                buttons: function() {
                    var options = this.options;
                    return '<div class="panel-footer"><ul class="pager">' + '<li class="previous">' + '<a href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' + '</li>' + '<li class="next">' + '<a href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' + '<a href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' + '</li>' + '</ul></div>';
                }
            },
            onBeforeShow: function(step) {
                step.$pane.collapse('show');
            },
            onBeforeHide: function(step) {
                step.$pane.collapse('hide');
            },
            onFinish: function() {
                // alert('finish');
            }
        });
    })();
    </script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('admin/js/custom.min.js')}}"></script>
 <script src="{{asset('admin/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
<!--Style Switcher -->
<script src="{{asset('admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
 <script>
    $(document).ready(function() {
            $('#myTable1').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": true,
                        "targets": 2
                    }],
                    /*"order": [
                        [0, 'desc']
                    ],*/
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'desc') {
                        table.order([2, 'asc']).draw();
                    } else {
                        table.order([2, 'desc']).draw();
                    }
                });
            });
    });

    $(document).ready(function() {
     $('#myTable2').DataTable();
     $(document).ready(function() {
                var table = $('#example2').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2,
                    }],
                    /*"order": [
                        [2, 'desc']
                    ],*/
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });

                $('#example2 tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
              });
    });
    $(document).ready(function() {
        $('#myTable7').DataTable();
        $(document).ready(function() {
            var table = $('#example7').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                /*"order": [
                    [2, 'desc']
                ],*/
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example7 tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });

    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    
    </script>

  <script>
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    $('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
    </script>

</body>
</html>
