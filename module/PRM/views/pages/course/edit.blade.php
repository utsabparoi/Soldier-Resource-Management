@extends('backend.layout.app')
@section('title', 'All Courses')
@section('css')

@endsection
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Edit Course</li>
                </ul>
                <!-- /.breadcrumb -->
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Edit Course</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('prm.course.index') }}" class="">
                                                    <i class="fa fa-list"></i> Course <span class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">

                                                    <form action="{{ route('prm.course.update',$course->id) }}" id="Form" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">

                                                            <!-- Left side -->

                                                            <div class="col-md-10 col-md-offset-1">

                                                                <!-- Name -->
                                                                <div class="form-group">
                                                                    <div class="input-group width-100 mb-1">
                                                                    <span class="input-group-addon width-30" style="text-align: left">
                                                                        Name <sup class="text-danger">*</sup><span class="label-required"></span>
                                                                    </span>
                                                                        <input type="text" class="form-control @error('name') has-error @enderror"
                                                                               name="name" id="name" value="{{ old('name', $course->name) }}">

                                                                    </div>
                                                                </div>

                                                                {{-- Status --}}
                                                                <div class="form-group">
                                                                    <div class="input-group width-100">
                                                                    <span class="input-group-addon width-30" style="text-align: left">
                                                                        Status
                                                                    </span>
                                                                        <label style="margin: 5px 0 0 8px">
                                                                            <input name="status" class="ace ace-switch ace-switch-6" type="checkbox" {{ $course->status == 1 ? 'checked' : '' }}>
                                                                            <span class="lbl"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="form-group">
                                                                <!-- Add Page -->
                                                                <h5 class="widget-title">
                                                                    <div class="row" style="margin-top: 10px;padding:5px">
                                                                        <div class="col-md-12 text-center pr-2">
                                                                            <button type="submit" class="btn btn-primary btn-sm btn-block"
                                                                                    style="max-width: 150px">
                                                                                <i class="fa fa-save"></i> Update
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="space-10"></div>
                                                                </h5>
                                                            </div>

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
