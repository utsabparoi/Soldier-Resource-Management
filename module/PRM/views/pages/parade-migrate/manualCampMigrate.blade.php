@extends('backend.layout.app')
@section('title', 'Soldier Migrate')
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
                                                    <a href="{{ route('prm.parade-migrate.index') }}">
                                                        <i class="fa fa-list"></i> Migration <span class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">

                                                    <form action="{{ route('prm.parade-migrate.store') }}" id="Form"
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
                                                                        <select align="left" name="parade_id"
                                                                            class="form-control multiselect" onchange="loadCurrentCamp(this)">
                                                                            <option value="">-Select a Soldier-</option>

                                                                            @if (isset($checkParade)) {{-- this condition check where the parade is in a camp more than 30 days --}}
                                                                                <option value="{{ $checkParade->id }}" selected>{{ $checkParade->name }}</option>
                                                                            @else
                                                                                @foreach ($parades as $parade)
                                                                                    <option value="{{ $parade->id }}">{{ $parade->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    @if ($errors->has('parade_id'))
                                                                        <span class="text-danger">The Soldier already migrated in the selected camp with same migration date</span>
                                                                    @endif
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
                                                                       <strong> <span class="current-camp">Select a soldier to see his/her current location</span></strong>
                                                                    </div>
                                                                </div>
                                                            </div>

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
                                                                                <option value="{{ $camp->id }}">{{ $camp->name }}</option>
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
                                                                        <input class="form-control date-picker box-resize" type="text" name="migration_date" placeholder="When to Migrate">
                                                                    </div>
                                                                    @if ($errors->has('migration_date'))
                                                                        <span class="text-danger">{{ $errors->first('migration_date') }}</span>
                                                                    @endif
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
                                                                            class="button-submit"
                                                                            style="max-width: 150px;padding:8px 20px 8px 20px;font-size:18px">
                                                                            Migrate
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

