@extends('backend.layout.app')
@section('title', 'Perfect Ten')
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
                    <li class="active">Leave Application</li>
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
                                                    <i class="fa fa-minus-circle"></i> <span class="hide-in-sm">Application
                                                        Form</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                    <!--------------- Slider List---------------->
                                                    <a href="{{ route('prm.leave-applications.index') }}" class="">
                                                        <i class="fa fa-list"></i> Application <span
                                                            class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <form action="{{ route('prm.leave-applications.store') }}" id="Form"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <!-- Soldier Name -->
                                                            <div class="col-sm-4">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Soldier<sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select name="parade_id"
                                                                            class="form-control multiselect">
                                                                            <option value="">-Select Soldier-</option>
                                                                            @if (isset($check_parade))
                                                                                <option value="{{ $check_parade->id }}" selected>{{ $check_parade->name }}</option>
                                                                            @else
                                                                                @foreach ($parades as $parade)
                                                                                    <option value="{{ $parade->id }}">{{ $parade->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Leave Type -->
                                                            <div class="col-sm-4">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Leave Type<sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select name="leave_category_id"
                                                                            class="form-control multiselect">
                                                                            <option value="">--Select a Leave Type--
                                                                            </option>
                                                                            @foreach ($leave_categories as $category)
                                                                                <option value="{{ $category->id }}">
                                                                                    {{ $category->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Leave Duration -->
                                                            <div class="col-sm-4">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Duration<sup class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="start_date"
                                                                            id="start_date" placeholder="&#x09;&#x09;From"
                                                                            class="form-control date-picker box-resize" >
                                                                        <span
                                                                            class="input-group-addon box-resize">&#x21C6;</span>
                                                                        <input type="text" name="end_date"
                                                                            id="end_date" placeholder="&#x09;&#x09;&#160;To" class="form-control date-picker box-resize">
                                                                    </div>
                                                                    @if ($errors->has('start_date','end_date'))
                                                                        <span class="text-danger">The start date must be earlier than the end one</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">

                                                            <!-- Company Name -->
                                                            <div class="col-sm-4">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Emergency Phone</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input type="text" name="emergency_contact"
                                                                            id="comanyName" value=""
                                                                            placeholder="Emergency Contact Number"
                                                                            class="form-control box-resize">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Attachment -->
                                                            <div class="col-sm-4">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Attachment <small class="text-danger">(Choose jpeg,jpg,pdf,doc,docx file. max-size:2MB)</small></strong></h5>
                                                                    </label>
                                                                    <div>
                                                                        <input type="file" name="attachment"
                                                                            id="comanyName" value=""
                                                                            class="form-control box-resize"
                                                                            id="formFileLg" style="padding:2px">
                                                                    </div>
                                                                    @if ($errors->has('attachment'))
                                                                        <span class="text-danger">{{ $errors->first('attachment') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            {{-- Status --}}
                                                            {{-- <div class="col-sm-4">
                                                                <div align="center" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Status</strong></h5>
                                                                    </label>
                                                                    <div>
                                                                        <input name="status"
                                                                            class="ace ace-switch ace-switch-6"
                                                                            type="checkbox" checked>
                                                                        <span class="lbl"></span>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <!-- Company Name -->
                                                            <div class="col-sm-12">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Reason</strong></h5>
                                                                    </label>
                                                                    <div>
                                                                        <textarea name="reason" id="comanyName" placeholder="Please write the reason for your leave-application"
                                                                            rows="5" class="col-xs-10 col-sm-12"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <!-- Add Page -->
                                                            <h5 class="widget-title">
                                                                <div class="row"
                                                                    style="margin-top: 10px;padding:5px">
                                                                    <div class="col-md-12 text-center pr-2">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm btn-block"
                                                                            style="max-width: 150px">
                                                                            <i class="fa fa-save"></i> Submit
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="space-10"></div>
                                                            </h5>
                                                        </div>

                                                    </form>
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
        </div>
    </div>
@endsection
