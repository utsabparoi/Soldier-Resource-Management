@extends('backend.layout.app')
@section('title', 'Course')
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
                    <li class="active">Assing Course</li>
                </ul><!-- /.breadcrumb -->
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Assign Course</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                    <!--------------- Slider List---------------->
                                                    <a href="{{ route('prm.parade-courses.index') }}" class="">
                                                        <i class="fa fa-list"></i> Soldier Course <span class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">

                                                    <form action="{{ route('prm.parade-courses.store') }}" id="Form"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="row">

                                                            <!-- Soldier Name -->
                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Soldier<sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select align="center" name="parade_id"
                                                                            class="form-control multiselect" onchange="loadUnmatchedCourse(this)">
                                                                            <option value="">-Select a Soldier-</option>
                                                                            @foreach ($parades as $parade)
                                                                                <option value="{{ $parade->id }}">{{ $parade->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @include('pages.parade-course.add-multiple-course')
                                                        {{-- <div class="row">
                                                            <!-- Course -->
                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Course <sup
                                                                                    class="text-danger">*</sup><small class="text-success">(below course/'s not take yet)</small></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select name="course_id"
                                                                            class="form-control multiselect unmatched-course">
                                                                            <option value="">-First Select a Soldier-</option>
                                                                            @foreach ($courses as $course)
                                                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Duration <small class="red">(In month)</small></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control box-resize" type="text" name="duration">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Result</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control box-resize" type="text" name="result">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Remark</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control box-resize" type="text" name="remark">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <br> --}}

                                                        <div class="form-group">
                                                            <!-- Add Page -->
                                                            <h5 class="widget-title">
                                                                <div class="row"
                                                                    style="margin-top: 10px;padding:5px">
                                                                    <div class="col-md-12 text-center pr-2">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm btn-block"
                                                                            style="max-width: 150px">
                                                                            <i class="fa fa-save"></i> Assign
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="space-10"></div>
                                                            </h5>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6" >
                                                                <div class="form-group table-responsive">
                                                                    <label class="tableTitle">

                                                                    </label>
                                                                    <table id="dynamic-table" class="table table-striped table-hover new-table showTable">
                                                                        {{-- Table data receive from script file --}}
                                                                    </table>
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

                        </div>
                    </div>
                    {{-- main content end  --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('pages.parade-course._include.script');
@endsection

