@extends('backend.layout.app')
@section('title', 'Perfect Ten')
@section('css')

@endsection
@section('content')
    <div class="main-content">
        <div class="main-content-inner">

            <div class="col-xs-12 col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><i class="ace-icon fa fa-check bigger-110"></i>Update Organization Info</h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 align="center" class="header black">Organization Info</h4>
                                    <div align="center" class="row">
                                        <div align="right" class="col-sm-3">
                                            <br>Favicon
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-12">
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <label class="ace-file-input ace-file-multiple"><input
                                                                        multiple="" type="file" id="favicon"><span
                                                                        class="ace-file-container"
                                                                        data-title="Drop files here or click to choose"><span
                                                                            class="ace-file-name"
                                                                            data-title="No File ..."><i
                                                                                class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a
                                                                        class="remove" href="#"><i
                                                                            class=" ace-icon fa fa-times"></i></a></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div align="center" class="col-sm-3">
                                            <br><img src="{{ $OrganizationInformation->favicon }}"
                                                style="width: 150px;height:150px" alt="">
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Name </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="name"
                                                        value="{{ $OrganizationInformation->name }}" class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Title </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="title"
                                                        value="{{ $OrganizationInformation->title }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Phone </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="phoneOne"
                                                        value="{{ $OrganizationInformation->phone_one }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Phone </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="phoneTwo"
                                                        value="{{ $OrganizationInformation->phone_two }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Hot Line </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="hotLine"
                                                        value="{{ $OrganizationInformation->hot_line }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Primary Email </label>

                                                <div class="col-sm-9 ">
                                                    <input type="text" id="primaryEmail"
                                                        value="{{ $OrganizationInformation->primary_email }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <small style="position: absolute;margin-left:-160px;"><b style="color: red">
                                                    (NB: Above mail will use for recieve users message through contact us
                                                    form)</b></small><br>
                                        </div>
                                    </div>
                                    <div align="center" class="row">

                                    </div>
                                    {{-- <div align="center" class="row">
                                <br> --}}
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Secondary Email </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="secondaryEmail"
                                                        value="{{ $OrganizationInformation->secondary_email }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Primary Address </label>

                                                <div class="col-sm-9">
                                                    <textarea id="primaryAddress" class="col-xs-10 col-sm-10">{{ $OrganizationInformation->primary_address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <h4 align="center" class="header black">Organization Info</h4>
                                    <div align="center" class="row">
                                        <div align="right" class="col-sm-3">
                                            <br>Company Logo
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-12">
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <label class="ace-file-input ace-file-multiple"><input
                                                                        multiple="" type="file"
                                                                        id="companyLogo"><span class="ace-file-container"
                                                                        data-title="Drop files here or click to choose"><span
                                                                            class="ace-file-name"
                                                                            data-title="No File ..."><i
                                                                                class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a
                                                                        class="remove" href="#"><i
                                                                            class=" ace-icon fa fa-times"></i></a></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div align="left" class="col-sm-3">
                                            <br><img src="{{ $OrganizationInformation->company_logo }}"
                                                style="width: 150px;height:150px" alt="">
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div align="right" class="col-xs-12">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Website </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="website"
                                                        value="{{ $OrganizationInformation->website }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Bin No </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="binNo"
                                                        value="{{ $OrganizationInformation->bin_no }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Google Map </label>

                                                <div class="col-sm-9">
                                                    <input type="text" id="googleMap"
                                                        value="{{ $OrganizationInformation->google_map }}"
                                                        class="col-xs-10 col-sm-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Secondary Address </label>

                                                <div class="col-sm-9">
                                                    <textarea id="secondaryAddress" class="col-xs-10 col-sm-10">{{ $OrganizationInformation->secondary_address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Meta Keyword </label>

                                                <div class="col-sm-9">
                                                    <textarea id="metaKeyword" class="col-xs-10 col-sm-10">{{ $OrganizationInformation->meta_keyword }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center" class="row">
                                        <div class="col-xs-12">
                                            <div align="right" class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                                    Meta Description </label>

                                                <div class="col-sm-9">
                                                    <textarea id="metaDescription" class="col-xs-10 col-sm-10">{{ $OrganizationInformation->meta_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div align="right" class="row">
                                <div class="col-sm-11">
                                    <button class="btn btn-success" type="button" id="uploadPercent"
                                        onclick="updateCompany()">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Update
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function updateCompany() {
            let favicon = document.getElementById("favicon").files[0];
            let name = document.getElementById("name").value;
            let title = document.getElementById("title").value;
            let phoneOne = document.getElementById("phoneOne").value;
            let phoneTwo = document.getElementById("phoneTwo").value;
            let hotLine = document.getElementById("hotLine").value;
            let primaryEmail = document.getElementById("primaryEmail").value;
            let secondaryEmail = document.getElementById("secondaryEmail").value;
            let primaryAddress = document.getElementById("primaryAddress").value;
            let websiteLogo = document.getElementById("companyLogo").files[0];
            let website = document.getElementById("website").value;
            let binNO = document.getElementById("binNo").value;
            let googleMap = document.getElementById("googleMap").value;
            let secondaryAddress = document.getElementById("secondaryAddress").value;
            let metaKeyword = document.getElementById("metaKeyword").value;
            let metaDescription = document.getElementById("metaDescription").value;


            let url = "/websiteInformationUpdate";
            let allData = new FormData();
            allData.append("Favicon", favicon);
            allData.append("Name", name);
            allData.append("Title", title);
            allData.append("PhoneOne", phoneOne);
            allData.append("PhoneTwo", phoneTwo);
            allData.append("HotLine", hotLine);
            allData.append("PrimaryEmail", primaryEmail);
            allData.append("SecondaryEmail", secondaryEmail);
            allData.append("PrimaryAddress", primaryAddress);
            allData.append("CompanyLogo", websiteLogo);
            allData.append("Website", website);
            allData.append("BinNO", binNO);
            allData.append("GoogleMap", googleMap);
            allData.append("SecondaryAddress", secondaryAddress);
            allData.append("MetaKeyword", metaKeyword);
            allData.append("MetaDescription", metaDescription);
            let configuration = {
                headers: {
                    "content-type": "multipart/form-data"
                },
                onUploadProgress: function(progressEvent) {
                    let uploadProgressPercent = Math.round((progressEvent.loaded * 100) / progressEvent.total)
                    document.getElementById("uploadPercent").innerHTML = uploadProgressPercent + '%';
                }
            };

            axios.post(url, allData, configuration).then(
                function() {
                    location.reload();
                }
            ).catch(
                function(error) {
                    alert("Error...try again");
                    location.reload();
                }
            )

        }
    </script>
@endsection
