@extends('backend.layout.app')
@section('title', 'Perfect Ten')
@section('css')

@endsection
@section('content')
    <div class="main-content">
        <div class="main-content-inner">

            <div class="col-xs-12 col-sm-12" style="font-family: MariendaBold">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><i class="ace-icon fa fa-refresh"></i>Update Organization Info</h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <form action="{{ route('prm.company_update') }}" class="form-horizontal" role="form"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row" style="margin:0 20px 0 30px">
                                    <div class="row" style="margin-left:36px">
                                        <div align="left" class="col-sm-3">
                                            <br>Organization Logo
                                        </div>
                                        <div class="col-sm-6" style="margin-left:-30px">
                                            <div class="col-sm-12">
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <label class="ace-file-input ace-file-multiple">
                                                                    <input multiple="" type="file" name="organization_logo" id="file-upload-input">
                                                                    <span class="ace-file-container" data-title="Drop your logo here or click to choose">
                                                                        <span class="ace-file-name" data-title="No File ...">
                                                                            <i class=" ace-icon ace-icon fa fa-cloud-upload"></i>
                                                                        </span>
                                                                    </span>
                                                                    <a class="remove" href="#">
                                                                        <i class=" ace-icon fa fa-times"></i>
                                                                    </a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div align="center" class="col-sm-3">
                                            @if (strpos($allSiteInfo->organization_logo, 'assets'))
                                                <img width="140px" src="{{ asset($allSiteInfo->organization_logo) }}"
                                                    alt="{{ $allSiteInfo->name }}">
                                            @else
                                                <img width="140px" src="{{ asset('img/' . $allSiteInfo->organization_logo) }}"
                                                    alt="No Photo upload yet">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-5 " style="margin:4px 10px 0 50px">

                                        {{-- <div class="file-upload form-group">
                                            <label class=" control-label no-padding-right" for="form-field-2">Choose New
                                                Logo </label>
                                            <div class="file-upload-select">
                                                <input type="file" name="organization_logo" id="file-upload-input">
                                            </div>
                                        </div> --}}


                                        <div class="form-group">
                                            <label class="no-padding-right" for="form-field-1"> Organization Name </label>
                                            <div>
                                                <input value="{{ $allSiteInfo->name }}" name="name" type="text"
                                                    id="form-field-1" placeholder="Name" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class=" no-padding-right" for="form-field-1"> Primary Email </label>
                                            <div>
                                                <input value="{{ $allSiteInfo->primary_email }}" name="primary_email"
                                                    type="text" id="form-field-1" placeholder="Email"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" control-label no-padding-right" for="form-field-1"> Phone One
                                            </label>
                                            <div>
                                                <input value="{{ $allSiteInfo->phone_one }}" name="phone_one" type="text"
                                                    id="form-field-1" placeholder="Link.." class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" control-label no-padding-right" for="form-field-1"> Website URL
                                            </label>
                                            <div>
                                                <input value="{{ $allSiteInfo->website_url }}" name="website_url" type="text"
                                                    id="form-field-1" placeholder="Website URL" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-5" style="margin:0 0 0 50px">

                                        <div class="form-group">
                                            <label class=" control-label no-padding-right" for="form-field-1"> Organization Address
                                            </label>
                                            <div>
                                                <input value="{{ $allSiteInfo->address }}" name="address" type="text"
                                                    id="form-field-1" placeholder="Address" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" no-padding-right" for="form-field-1"> Secondary Email </label>
                                            <div>
                                                <input value="{{ $allSiteInfo->secondary_email }}" name="secondary_email"
                                                    type="text" id="form-field-1" placeholder="Email"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" control-label no-padding-right" for="form-field-1"> Phone Two
                                            </label>
                                            <div>
                                                <input value="{{ $allSiteInfo->phone_two }}" name="phone_two" type="text"
                                                    id="form-field-1" placeholder="Address" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" control-label no-padding-right" for="form-field-2">Google Map
                                                (Embeded Code) </label>
                                            <div>
                                                <input value="{{ $allSiteInfo->google_map }}" name="google_map"
                                                    type="text" id="form-field-1" class="form-control"
                                                    placeholder="Map Embeded Code">
                                            </div>
                                        </div>


                                        @if ($allSiteInfo->google_map == 0 or $allSiteInfo->google_map == null)
                                        @else
                                            <div class="form-group">
                                                <label class=" control-label no-padding-right" for="form-field-2">Google
                                                    Map Preview </label>
                                                <div>
                                                    <iframe src="{{ $allSiteInfo->google_map }}" width="760"
                                                        height="450" style="border:0;" allowfullscreen=""
                                                        loading="lazy"></iframe>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="row" >
                                        <div class="col-sm-11" style="margin-left:50px !important;padding-right:38px">
                                            <label class=" control-label no-padding-right" for="form-field-1"> Description
                                            </label>
                                            <div>
                                                <textarea name="description" id="" rows="5" placeholder="Description"
                                                    class="form-control">{{ $allSiteInfo->description }}</textarea>
                                            </div>

                                            <div class="form-group text-center" style="margin-top: 35px;font-family:MariendaBold !important">
                                                <button type="submit" class="button-submit bigger-120">Update</button>
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

@endsection
