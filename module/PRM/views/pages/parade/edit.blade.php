@extends('backend.layout.app')
@section('title', 'Update Parade')
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
                    <li class="active">Update Parade</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Update Parade</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('prm.parade.index') }}" class="">
                                                    <i class="fa fa-list"></i> Parade <span class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>

                                            <form action="{{ route('prm.parade.update',$parade->id) }}" id="Form" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
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
                                                                                <input type="text" name="name" id="name" value="{{ $parade->name }}" class="col-xs-10 col-sm-10" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Present Location</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="text" value="{{ \Module\PRM\Models\Camp::where('id', $parade->present_location)->first()->name }}" class="col-xs-10 col-sm-10" readonly>
                                                                                <input type="text" name="presentLocation" id="presentLocation" value="{{ $parade->present_location }}" class="col-xs-10 col-sm-10" hidden>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Date of Join</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="date" name="dateOfJoin" id="dateOfJoin" value="{{ $parade->join_date_present_unit }}" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Photo</strong></h5> </label>

                                                                            <div class="col-sm-9" style="width: 415px !important;">
                                                                                <label class="ace-file-input ace-file-multiple"><input class="" type="file" name="image" id="image"><span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Preview Image</strong></h5> </label>

                                                                            <div class="col-sm-9" style="width: 315px !important; margin-left: -12px;">
                                                                                <img src="{{ asset($parade->image) }}" class="col-xs-8 col-sm-8">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Date of Enrolment</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="date" name="dateOfEnrolment" id="dateOfEnrolment" value="{{ $parade->enrolment_date }}" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Date of Present Rk</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="date" name="dateOfPresentRank" id="dateOfPresentRank" value="{{ $parade->present_rank_date }}" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <!-- Paid leaveApplication -->
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Date of Retirement</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="date" name="dateOfRetirement" id="dateOfRetirement" value="{{ $parade->retirement_date }}" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Civ Edn</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="cidEdn" id="cidEdn" value="{{ $parade->civ_edn }}" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Med Cat</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="medCat" id="medCat" value="{{ $parade->med_cat }}" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div class="col-xs-12">
                                                                        <div align="right" class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5><strong>Qual/Unqual Rk</strong></h5>  </label>

                                                                            <div class="col-sm-9">
                                                                                <select class="col-xs-10 col-sm-10" name="qualUnqualRank" id="qualUnqualRank">
                                                                                    <option value="{{ $parade->next_rank }}">{{ $parade->next_rank }}</option>
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
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Permanent Address</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <textarea name="permanentAddress" id="permanentAddress" class="col-xs-10 col-sm-10" rows="7" cols="50">{{ $parade->permanent_address }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align="center" class="row">
                                                                    <div align="right" class="col-xs-12">
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>Merital Status</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <select class="col-xs-10 col-sm-10" name="meritalStatus" id="meritalStatus">
                                                                                    <option value="{{ $parade->marital_status }}">{{ $parade->marital_status }}</option>
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
                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <h5><strong>No of Children</strong></h5> </label>

                                                                            <div class="col-sm-9">
                                                                                <input type="number" name="noOfChildren" id="noOfChildren" value="{{ $parade->children_number }}" class="col-xs-10 col-sm-10">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div align="right" class="row">
                                                            <div class="col-sm-12" style="padding-right: 102px;">
                                                                <button class="btn" type="submit" name="submitButton" value="save" style="background-color: #431cff !important; border: none;">
                                                                    <i class="ace-icon fa fa-save bigger-110"></i>
                                                                    Update
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
            <link rel="stylesheet" href="{{ asset('backend/css/custom-style.css') }}" />
@endsection
