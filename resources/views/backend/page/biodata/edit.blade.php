@extends('backend.layout.app')
@section('title', 'Hospital-Admin')
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
                    <li class="active">Edit Branch</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Edit Branch</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('website.biodata.index') }}" class="">
                                                    <i class="fa fa-list"></i> Branch <span class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">

                                                    <form action="{{ route('website.biodata.update',$branch->id) }}" id="Form" method="post" enctype="multipart/form-data">
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
                                                                               name="name" id="name" value="{{ old('name', $branch->name) }}">

                                                                    </div>
                                                                </div>

                                                                <!-- Address -->
                                                                <div class="form-group">
                                                                    <div class="input-group width-100 mb-1">
                                                                    <span class="input-group-addon width-30" style="text-align: left">
                                                                        Address <sup class="text-danger">*</sup><span class="label-required"></span>
                                                                    </span>
                                                                        <input type="text" class="form-control @error('address') has-error @enderror"
                                                                               name="address" id="address" value="{{ old('address', $branch->address) }}">

                                                                    </div>
                                                                </div>

                                                                <!-- Contact -->
                                                                <div class="form-group">
                                                                    <div class="input-group width-100 mb-1">
                                                                    <span class="input-group-addon width-30" style="text-align: left">
                                                                        Contact <sup class="text-danger">*</sup><span class="label-required"></span>
                                                                    </span>
                                                                        <input type="text" class="form-control @error('contact') has-error @enderror"
                                                                               name="contact" id="contact" value="{{ old('contact', $branch->contact) }}">

                                                                    </div>
                                                                </div>
                                                                {{-- Previous Image --}}
                                                                <div class="form-group">
                                                                    <div class="input-group width-100">
                                                                        <span class="input-group-addon width-30" style="background-color: transparent !important; border:none !important; text-align: left">Previous Image:</span>
                                                                        <img class="pt-1" src="{{ asset($branch->image) }}" width="300" height="200" style="margin-left: 13px;">
                                                                    </div>
                                                                </div>

                                                                <!-- Image -->
                                                                <div class="firm-group">
                                                                    <div class="col-sm-12 col-md-6 input-group width-100">
                                                                    <span class="input-group-addon width-30" style="text-align: left">
                                                                        Image
                                                                    </span>
                                                                        <input type="file" class="form-control @error('image') has-error @enderror" name="image" id="image">

                                                                    </div>
                                                                    <div class="input-group width-100 mb-1">
                                                                        <span class="input-group-addon width-30" style="background-color: transparent !important; border:none !important;"></span>
                                                                        <small style="margin-left: 13px;"><b>Image size '1350 X 680'. </b><b style="color: red"> (NB: Slider "height" must be 680px)</b></small>
                                                                    </div>
                                                                </div>



                                                                {{-- Status --}}
                                                                <div class="form-group">
                                                                    <div class="input-group width-100">
                                                                    <span class="input-group-addon width-30" style="text-align: left">
                                                                        Status
                                                                    </span>
                                                                        <label style="margin: 5px 0 0 8px">
                                                                            <input name="status" class="ace ace-switch ace-switch-6" type="checkbox" {{ $branch->status == 1 ? 'checked' : '' }}>
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
                                                                                <i class="fa fa-save"></i> Create
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
@endsection
