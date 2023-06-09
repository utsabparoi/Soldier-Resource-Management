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
                    <li class="active">Soldier Migration</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Migrate Soldier</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                    <!--------------- Slider List---------------->
                                                    <a href="{{ route('prm.parade-migrate.index') }}" >
                                                        <i class="fa fa-list"></i> Migration <span class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">

                                                    <form action="{{ route('prm.parade-migrate.update',$parade_migration->id) }}" id="Form" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

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
                                                                        <select align="left" name="parade_id"
                                                                            class="form-control multiselect" onchange="loadCurrentCamp(this)">
                                                                            <option value="">-Select a Soldier-</option>
                                                                            @foreach ($parades as $parade)
                                                                                <option value="{{ $parade->id }}"
                                                                                    @if($parade->id == $parade_migration->parade_id) selected @endif>{{ $parade->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label for="">
                                                                        <h5>
                                                                            <strong>Current Camp(Location)</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                       <h4 class="current-camp blue" style="margin:3px">{!! $parade_migration->camp->name !!}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- <div class="col-sm-6" >
                                                                <div class="form-group table-responsive">
                                                                    <label class="tableTitle">

                                                                    </label>
                                                                    <table id="dynamic-table" class="table table-striped table-hover new-table showTable">

                                                                    </table>
                                                                </div>
                                                            </div> --}}


                                                        </div>
                                                        <div class="row">
                                                            <!-- Course -->
                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Migrate to <sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select name="camp_id"
                                                                            class="form-control multiselect">
                                                                            <option value="">-Select a Camp(Location)-</option>
                                                                            @foreach ($camps as $camp)
                                                                                <option value="{{ $camp->id }}"
                                                                                    @if($camp->id == $parade_migration->camp_id) selected @endif>{{ $camp->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Date of Migration</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input value="{{ old('migration_date', $parade_migration->migration_date) }}" class="form-control box-resize" type="date" name="migration_date" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- <div class="col-sm-2">
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
                                                            </div> --}}

                                                        </div>
                                                        <br>

                                                        <div class="form-group">
                                                            <!-- Add Page -->
                                                            <h5 class="widget-title">
                                                                <div class="row"
                                                                    style="margin-top: 10px;padding:5px">
                                                                    <div class="col-md-12 text-center pr-2">
                                                                        <button type="submit"
                                                                            class="button-submit"
                                                                            style="max-width: 150px;padding:8px 20px 8px 20px;font-size:15px">
                                                                            Update Migrate
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

@section('js')
    @include('pages.parade-migrate._include.script')
@endsection

