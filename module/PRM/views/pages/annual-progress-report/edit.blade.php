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
                    <li class="active">Edit Annual Progress Report</li>
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
                                                    <i class="fa fa-minus-circle"></i> <span class="hide-in-sm">Edit Annual Progress Report
                                                        Form</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                    <!--------------- Slider List---------------->
                                                    <a href="{{ route('prm.apr.index') }}" class="">
                                                        <i class="fa fa-list"></i> Report <span
                                                            class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <form action="{{ route('prm.apr.store') }}" id="Form"
                                                          method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <!-- Parade Name -->
                                                            <div class="col-sm-4">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Selected Soldier<sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select name="paradeID"
                                                                                class="form-control multiselect" id="soldiers">
                                                                            <option value="">-No Soldier Select-</option>

                                                                            @foreach ($soldier as $soldiers)
                                                                                <option value="{{ $soldiers->id }}">{{ $soldiers->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-sm-4">
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
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <!-- Company Name -->
                                                            <div class="col-sm-12">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Report Details</strong></h5>
                                                                    </label>
                                                                    <div>
                                                                        <textarea name="annualReport" id="annualReport" placeholder="Please write the annual report for this soldier"
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
                                                                            <i class="fa fa-save"></i> Create
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



    <script>
        function selectSoldiers() {
            // let filterSoldier = document.getElementById('soldiers').value;
            // document.getElementById('selectedSoldiers').innerHTML = filterSoldier;
        }
    </script>
@endsection
