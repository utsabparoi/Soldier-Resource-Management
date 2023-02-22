
<div id="company-setting" class="tab-pane active" style="margin-top: -36px !important;">

    <form class="form-horizontal mt-2" action="{{ route('settings.update-company-setting', $companyInfos->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-sm-6">

                <!-- COMPANY NAME -->
                <div class="input-group width-100 @error('name') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Company Name<span class="label-required">*</span>
                    </span>

                    <input type="text" class="form-control" name="name" id="name"
                           value="{{ old('name', $companyInfos->name ) }}" tabindex="1" placeholder="Company Name" required>
                </div>
                <span class="text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </span>




                <!-- COMPANY TITLE -->
                <div class="input-group mt-2 width-100 @error('title') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Company Title<span class="label-required">*</span>
                    </span>

                    <input type="text" class="form-control" name="title" id="title"
                           value="{{ old('title', $companyInfos->title ) }}" tabindex="2" placeholder="Company Title" required>
                </div>
                <span class="text-danger">
                    @error('title')
                    {{ $message }}
                    @enderror
                </span>




                <!-- PHONE -->
                <div class="input-group mt-2 width-100 @error('phone') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Phone<span class="label-required">*</span>
                    </span>

                    <input type="text" class="form-control" name="phone" id="phone"
                           value="{{ old('phone', $companyInfos->phone ) }}" tabindex="3" placeholder="Phone" required>
                </div>
                <span class="text-danger">
                    @error('phone')
                    {{ $message }}
                    @enderror
                </span>




                <!-- HOTLINE -->
                <div class="input-group mt-2 width-100 @error('hotline') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Hotline<span class="label-required">*</span>
                    </span>

                    <input type="text" class="form-control" name="hotline" id="hotline"
                           value="{{ old('hotline', $companyInfos->hotline ) }}" tabindex="4" placeholder="Hotline" required>
                </div>
                <span class="text-danger">
                    @error('hotline')
                    {{ $message }}
                    @enderror
                </span>




                <!-- EMAIL -->
                <div class="input-group mt-2 width-100 @error('email') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Email<span class="label-required">*</span>
                    </span>

                    <input type="email" class="form-control" name="email" id="email"
                           value="{{ old('email', $companyInfos->email) }}" tabindex="5" placeholder="Email" required>
                </div>
                <span class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </span>




                <!-- ADDRESS -->
                <div class="input-group mt-2 width-100 @error('address') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Address<span class="label-required">*</span>
                    </span>

                    <textarea class="form-control" name="address" id="address" rows="1" tabindex="6" required>{{ old('address', $companyInfos->address) }}</textarea>
                </div>
                <span class="text-danger">
                    @error('address')
                    {{ $message }}
                    @enderror
                </span>



                   <!-- BILL FOOTER -->
                   <div class="input-group mt-2 width-100 @error('address') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Bill Footer<span class="label-required"></span>
                    </span>

                    <textarea class="form-control" name="bill_footer" id="bill_footer" rows="1" tabindex="6">{{ old('address', $companyInfos->bill_footer) }}</textarea>
                </div>
                <span class="text-danger">
                    @error('address')
                    {{ $message }}
                    @enderror
                </span>




                <!-- DRUG LICENCE -->
                {{-- <div class="input-group mt-2 width-100 @error('drug_licence') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Drug Licence
                    </span>

                    <input type="text" class="form-control" name="drug_licence" id="drug_licence"
                           value="{{ old('drug_licence', $companyInfos->drug_licence) }}" tabindex="7" placeholder="Drug Licence">
                </div>
                <span class="text-danger">
                    @error('drug_licence')
                    {{ $message }}
                    @enderror
                </span> --}}




                <!-- BIN -->
                <div class="input-group mt-2 width-100 @error('bin') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Bin
                    </span>

                    <input type="text" class="form-control" name="bin" id="bin"
                           value="{{ old('bin', $companyInfos->bin) }}" tabindex="8" placeholder="Bin">
                </div>
                <span class="text-danger">
                    @error('bin')
                    {{ $message }}
                    @enderror
                </span>




                <!-- COMPANY LOGO -->
                <div class="input-group mt-2 width-100 @error('logo') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Company Logo @if(empty($companyInfos->logo)) <span class="label-required">*</span> @endif
                    </span>

                    <input type="file" class="form-control" name="logo" id="logo" tabindex="9"  @if(empty($companyInfos->logo)) required @endif>
                </div>
                <small><b>Logo size must be 220x60.</b></small>
                <span class="text-danger">
                    @error('logo')
                        <br>{{ $message }}
                    @enderror<br>
                </span>
                @if(!empty($companyInfos->logo))
                    <img src="{{ asset($companyInfos->logo) }}" height="60">
                @endif




                <!-- FAVICON ICON -->
                <div class="input-group mt-2 width-100 @error('favicon_icon') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Favicon Icon @if(empty($companyInfos->favicon_icon)) <span class="label-required">*</span> @endif
                    </span>

                    <input type="file" class="form-control" name="favicon_icon" id="favicon_icon" tabindex="10"  @if(empty($companyInfos->favicon_icon)) required @endif>
                </div>
                <small><b>Favicon Icon size must be 50x50.</b></small>
                <span class="text-danger">
                    @error('favicon_icon')
                        <br>{{ $message }}
                    @enderror<br>
                </span>
                @if(!empty($companyInfos->favicon_icon))
                    <img src="{{ asset($companyInfos->favicon_icon) }}" height="50">
                @endif

            </div>


            <div class="col-sm-6">

                <!-- WEBSITE -->
                <div class="input-group mb-2 width-100 @error('website') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Website Link
                    </span>

                    <input type="url" class="form-control" name="website" id="website"
                           value="{{ old('website', $companyInfos->website) }}" tabindex="11" placeholder="Website Link">
                </div>
                <span class="text-danger">
                    @error('website')
                    {{ $message }}
                    @enderror
                </span>



{{--
                <!-- FACEBOOK LINK -->
                <div class="input-group mt-2 width-100 @error('facebook_link') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Facebook Link
                    </span>

                    <input type="url" class="form-control" name="facebook_link" id="facebook_link"
                           value="{{ old('facebook_link', $companyInfos->facebook_link) }}" tabindex="12" placeholder="Facebook Link">
                </div>
                <span class="text-danger">
                    @error('facebook_link')
                    {{ $message }}
                    @enderror
                </span>




                <!-- YOUTUBE LINK -->
                <div class="input-group mt-2 width-100 @error('youtube_link') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Youtube Link
                    </span>

                    <input type="url" class="form-control" name="youtube_link" id="youtube_link"
                           value="{{ old('youtube_link', $companyInfos->youtube_link) }}" tabindex="13" placeholder="Youtube Link">
                </div>
                <span class="text-danger">
                    @error('youtube_link')
                    {{ $message }}
                    @enderror
                </span>




                <!-- TWITTER LINK -->
                <div class="input-group mt-2 width-100 @error('twitter_link') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Twitter Link
                    </span>

                    <input type="url" class="form-control" name="twitter_link" id="twitter_link"
                           value="{{ old('twitter_link', $companyInfos->twitter_link) }}" tabindex="14" placeholder="Twitter Link">
                </div>
                <span class="text-danger">
                    @error('twitter_link')
                    {{ $message }}
                    @enderror
                </span>




                <!-- INSTAGRAM LINK -->
                <div class="input-group mt-2 width-100 @error('instagram_link') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Instagram Link
                    </span>

                    <input type="url" class="form-control" name="instagram_link" id="instagram_link"
                           value="{{ old('instagram_link', $companyInfos->instagram_link) }}" tabindex="15" placeholder="Instagram Link">
                </div>
                <span class="text-danger">
                    @error('instagram_link')
                    {{ $message }}
                    @enderror
                </span>




                <!-- WHATSAPP LINK -->
                <div class="input-group mt-2 width-100 @error('whatsapp_link') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Whatsapp Link
                    </span>

                    <input type="url" class="form-control" name="whatsapp_link" id="whatsapp_link"
                           value="{{ old('whatsapp_link', $companyInfos->whatsapp_link) }}" tabindex="16" placeholder="Whatsapp Link">
                </div>
                <span class="text-danger">
                    @error('whatsapp_link')
                    {{ $message }}
                    @enderror
                </span>




                <!-- TELEGRAM LINK -->
                <div class="input-group mt-2 width-100 @error('telegram_link') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Telegram Link
                    </span>

                    <input type="url" class="form-control" name="telegram_link" id="telegram_link"
                           value="{{ old('telegram_link', $companyInfos->telegram_link) }}" tabindex="17" placeholder="Telegram Link">
                </div>
                <span class="text-danger">
                    @error('telegram_link')
                    {{ $message }}
                    @enderror
                </span> --}}




                <!-- GOOGLE MAP EMBED CODE -->
                <div class="input-group mt-2 @error('google_map_embed_code') has-error @enderror">
                    <textarea class="form-control" name="google_map_embed_code" id="google_map_embed_code" rows="10" tabindex="18" placeholder="Google Map Embed Code here...">{{ old('google_map_embed_code', $companyInfos->google_map_embed_code) }}</textarea>
                    <small><b>Note: Google Map Embed Code must be W:600, H:400</b></small><br>
                </div>
                <span class="text-danger">
                    @error('google_map_embed_code')
                    {{ $message }}
                    @enderror
                </span>


                <div class="input-group mt-2 width-100 @error('app_link') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						App Link
                    </span>

                    <input type="text" class="form-control" name="app_link" id="app_link"
                           value="{{ old('app_link', $companyInfos->app_link) }}" tabindex="12" placeholder="App Link">
                </div>
                <span class="text-danger">
                    @error('app_link')
                    {{ $message }}
                    @enderror
                </span>


                <div class="input-group mt-2 width-100 @error('ios_link') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Ios Link
                    </span>

                    <input type="text" class="form-control" name="ios_link" id="ios_link"
                           value="{{ old('ios_link', $companyInfos->ios_link) }}" tabindex="12" placeholder="Ios Link">
                </div>
                <span class="text-danger">
                    @error('ios_link')
                    {{ $message }}
                    @enderror
                </span>

                {{-- Meta Keyword --}}
                <div class="input-group mt-2 width-100 @error('meta_keyword') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Meta Keyword
                    </span>
                    <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="2" tabindex="6" placeholder="Meta Keyword">{{ old('meta_keyword', $companyInfos->meta_keyword) }}</textarea>
                </div>
                <span class="text-danger">
                    @error('meta_keyword')
                    {{ $message }}
                    @enderror
                </span>

                {{-- Meta Description --}}
                <div class="input-group mt-2 width-100 @error('meta_description') has-error @enderror">
                    <span class="input-group-addon width-35" style="text-align: left">
						Meta Description
                    </span>
                    <textarea class="form-control" name="meta_description" id="meta_description" rows="2" tabindex="6" placeholder="Meta Description">{{ old('meta_description', $companyInfos->meta_description) }}</textarea>
                </div>
                <span class="text-danger">
                    @error('meta_description')
                    {{ $message }}
                    @enderror
                </span>


            </div>
        </div>


        <div class="row">
            <div class="col-md-12 text-right">
                <div class="btn-group">
                    <button class="btn btn-sm btn-primary"> <i class="fa fa-check"></i> UPDATE </button>
                </div>
            </div>
        </div>
    </form>
</div>
