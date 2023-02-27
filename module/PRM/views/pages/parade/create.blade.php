@extends('backend.layout.app')
@section('title', 'Biodata')
@section('content')
    <div class="main-content" xmlns="http://www.w3.org/1999/html">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Add New Parade</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Add New Parade</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('prm.parade.index') }}" class="">
                                                    <i class="fa fa-list"></i> Parade <span class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>

                                            <form action="{{ route('prm.profileExtraInformation') }}" method="get" enctype="multipart/form-data">
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="row">
                                                            <br>
                                                            <div class="col-sm-6">
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Person Name<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="personName" id="name" value="" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Present Location<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <textarea id="primaryAddress" class="col-xs-10 col-sm-10"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Date of Join<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="date" id="phoneOne" value="" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div align="right" class="col-sm-3">
                                                                        <br><h5><strong>Photo</strong></h5>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="col-sm-12">
                                                                            <div class="widget-body">
                                                                                <div class="widget-main">
                                                                                    <div class="form-group">
                                                                                        <div class="col-xs-12">
                                                                                            <label class="ace-file-input ace-file-multiple"><input multiple="" type="file" id="favicon"><span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Date of Enrolment <sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="text" id="phoneTwo" value="" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Date of Present Rk<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="text" id="hotLine" value="" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                            </div>

                                                            <div class="col-sm-6">
                                                                <!-- Paid leaveApplication -->
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Date of Retirement<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="date" id="secondaryEmail" value="" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Civ Edn<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="text" id="primaryEmail" value="" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Med Cat<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="text" id="secondaryEmail" value="" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5><strong>Qual/Unqual Rk<sup class="text-danger">*</sup></strong></h5>  </label>

                                                                            <div class="col-sm-9">
                                                                                <select class="col-xs-10 col-sm-10">
                                                                                    <option>-Select-</option>
                                                                                    <option>Major</option>
                                                                                    <option>Captain</option>
                                                                                    <option>Senior Officer</option>
                                                                                    <option>Officer</option>
                                                                                    <option>Junior Officer</option>
                                                                                    <option>Note</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Permanent Address <sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <textarea id="primaryAddress" class="col-xs-10 col-sm-10" rows="4" cols="50"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div align="right" class="col-xs-12">
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Merital Status<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <select class="col-xs-10 col-sm-10">
                                                                                    <option>Unmarried</option>
                                                                                    <option>Married</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>No of Children<sup class="text-danger">*</sup></strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="number" id="binNo" value="" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div align="right" class="row">
                                                            <div class="col-sm-12" style="padding-right: 100px;">
                                                                <button class="btn btn-primary" type="submit">
                                                                    <i class="ace-icon fa fa-arrow-right bigger-110"></i>
                                                                    Proceed to Next
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- main content end  --}}
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

@endsection
