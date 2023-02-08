@extends('backend.layout.app')
@section('title', 'Biodata')
@section('css')

@endsection
@section('content')
    <div class="main-content" xmlns="http://www.w3.org/1999/html">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Search Employee</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                           autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
            {{-- main content start from here --}}
            <div class="page-content no-print">
                <div class="row">
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="page-content">
                                <div class="row p-20">
                                    <div class="col-12">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title">
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Search Employee</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('website.biodata.index') }}" class="">
                                                    <i class="fa fa-list"></i> Employee <span class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div align="center" class="row" style="margin-right: 15%; margin-left: 15%;" id="employeeSearchResult">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <br>

                                                        <div class="col-sm-12">
                                                            <div align="center" class="row" style="margin-right: 15%; margin-left: 15%;">
                                                                <!-- Company Name -->
                                                                <div class="col-sm-2">
                                                                    <div align="left" class="form-group">
                                                                        <label><h5><strong>ID</strong></h5></label>
                                                                        <div>
                                                                            <input type="number" name="personId" id="personId" value="" class="col-xs-10 col-sm-10">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Company Name -->
                                                                <div class="col-sm-8">
                                                                    <div align="left" class="form-group">
                                                                        <label><h5><strong>Person Name</strong></h5></label>
                                                                        <div>
                                                                            <input type="text" name="personId" id="personId" value="" class="col-xs-10 col-sm-10">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Company Name -->
                                                                <div class="col-sm-2">
                                                                    <div align="left" class="form-group">
                                                                        <label><h5><strong>  <sup class="text-danger"></sup> </strong></h5></label>
                                                                        <div>
                                                                            <button class="btn btn-primary" type="button" id="uploadPercent" style="margin-top: 17px;" onclick="employeeSearch()">
                                                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                                                Search
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- main content end  --}}
                </div>
            </div>
            <script>
                function employeeSearch() {
                    document.getElementById('employeeSearchResult').innerHTML = "<span style=\"color: limegreen;\">Search Result for 1 Employee</span><br><br>\n" +
                        "                                                                <span style=\"color: #1a1a1a; font-size: 18px;\">1. AKASH KUMAR BASAK</span>\n" +
                        "                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n" +
                        "                                                                <a href=\"{{ route('website.leaveApplication.create') }}\"> <button class=\"btn btn-primary\" type=\"submit\">\n" +
                        "                                                                    <i class=\"ace-icon fa fa-arrow-right bigger-110\"></i>\n" +
                        "                                                                    Proceed to Apply\n" +
                        "                                                                </button></a>";
                }
            </script>
@endsection
