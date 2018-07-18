<div class="m-portlet m-portlet--mobile">

        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
                        <h3 class="m-portlet__head-text">
                           Edit Your Profile
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" id="editForm" method="POST" action="{{route('user.update',$user->id)}}">
                {{csrf_field()}}
                <input type="hidden" id="csrf-token" name="_token" value="{{ Session::token() }}">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="name">
                           Name *
                        </label>
                        <input type="text" name="name" class="form-control m-input m-input--solid" id="name"  value="{{$user->name}}">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="email">
                            Email address *
                        </label>
                        <input type="email" name="email" class="form-control m-input m-input--solid" id="email" value="{{$user->email}}">

                    </div>
                    <div class="form-group m-form__group">
                        <label for="phone">
                            Phone
                        </label>
                        <input type="tel" name="phone" class="form-control m-input m-input--solid" id="phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="address">
                           Address *
                        </label>
                        <textarea  name="address" class="form-control m-input m-input--solid" id="address" rows="3">{{$user->address}}</textarea>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="country">
                            Country *
                        </label>
                        <select name="country" class="form-control m-input m-input--solid" id="country" data-default-value="{{$user->country}}" style="padding-top: 5px;">

                        </select>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="city">
                            City *
                        </label>
                        <select name="city" class="form-control m-input m-input--solid" id="city" data-default-value="{{$user->city}}" style="padding-top: 5px;">

                        </select>
                    </div>

                    <button type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#m_modal_1" style="margin-left: 30px">
                        Upload Logo
                    </button>
                    <div class="white-popup" id="check" style="display:none;position: relative;background: #FFF;padding: 20px;width: auto;max-width: 500px;margin: 20px auto;">
                    <!--form of uploading image -->
                    
                    <div class="modal-body">
                                  <div class="avatar-body">

                                    <!-- Upload image and data -->
                                    <div class="avatar-upload">
                                      <input data-validation="" data-name="" class="avatar-src" name="avatar_src" type="hidden">
                                      <input data-validation="" data-name="" class="avatar-data" name="avatar_data" type="hidden">
                                      <label for="avatarInput">Local upload</label>
                                      <input data-validation="" data-name="" class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                    </div>

                                    <!-- Crop and preview -->
                                    <div class="row">
                                      <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="avatar-preview preview-lg"><img src="https://png2.kisspng.com/sh/ad2dd1a13b945474f08c450c90e7183c/L0KzQYi4UsE5N5YAUZGAYUO6RoS3gcdlamE3TZCAOEe8R4W3VME2OWQ6T6s7N0S4QYWBTwBvbz==/5a37630a7db025.5879740415135792745148.png" id="imgCrop"></div>
                                      </div>
                                    </div>

                                    <div class="row avatar-btns">
                                     
                                      <div class="col-md-3">
                                        <button type="button" class="btn btn-primary btn-block avatar-save">Done</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                    <!--end form of uploading image -->
                    
                    </div>
               </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-success" id="{{$user->id}}">
                            Save
                        </button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>

</div>

