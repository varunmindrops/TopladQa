@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="main_class single_admin">
    <div class="container brd-cumb">
        <div class="row no-gutters slider-text  align-items-end justify-content-center">
            <div class="col-md-12 ftco-animate pt-4 text-left">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2">
                        <a href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span class="mr-2">
                        <a href="profile">Students <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span class="mr-2">
                        <a class="active-breadcumb" href="#">Address Setting </a>
                    </span>
                </p>
                <!-- <h1 class="bread">CMA</h1> -->
            </div>
        </div>
    </div>

    <section class="ftco-section faclt-edit-page">
        <div class="container">
            <div class="row">
                <div class="edit_contents">
                    @include('admin.student.layouts.sidebar')
                    <div class="col-md-9 col-sm-8">
                        <div class="wrap_tab_contents edit_profiler">
                            <div class="card_info shadow_blk">
                                <h4 class="font-italic mb-2">Address Setting</h4>
                                <div class="form_data d-flex justify-content-between align-items-center ">
                                    <form action="/student/address/{{Auth::id()}}" method="POST" autocomplete="off">
                                        <div class="wrap_in_form">
                                            @csrf
                                            @method('PUT')
                                            <div class="form_data d-flex">
                                                <div class="form-group col-md-12 title_mini">
                                                    <label for="">Billing Address</label>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="asterisk">Address <span
                                                            class="mini_adder">(Area/Colony/Street/Sector/Village)</span></label>
                                                    <!-- <input class="form-control" type="text" value="Plot Number-7, Sector-13"> -->
                                                    <input type="text"
                                                        class="form-control @error('bill_address') is-invalid @enderror"
                                                        id="bill_address" name="bill_address"
                                                        value="{{ old('bill_address', $billAddress['address'] ?? '' ) }}"
                                                        placeholder="Address" autofocus>
                                                    @error('bill_address')
                                                    <p class="error_result" style="color:red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="asterisk">City <span
                                                            class="mini_adder">(City/District/Town)</span></label>
                                                    <input class="form-control @error('bill_city') is-invalid @enderror"
                                                        name="bill_city" type="text"
                                                        value="{{ old('bill_city', $billAddress['city'] ?? '' ) }}"
                                                        placeholder="City" autofocus>
                                                    @error('bill_city')
                                                    <p class="error_result" style="color:red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="asterisk" for="bill_state">State</label>
                                                    <select name="bill_state"
                                                        class="form-control @error('bill_state') is-invalid @enderror"
                                                        value="{{ old('bill_state', $billAddress['state_id'] ?? '' ) }}"
                                                        autofocus>
                                                        <option value="">Select State</option>
                                                        @foreach($state as $value)
                                                        <option value="{{$value['id']}}"
                                                            <?php if ($billAddress) {
                                                                                        {{ echo old('bill_state', $billAddress['state_id']) == $value['id'] ? 'selected' : '';}}
                                                                                    } else { {{ echo old('bill_state') == $value['id'] ? 'selected' : '';}} } ?>>
                                                            {{$value['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('bill_state')
                                                    <p class="error_result" style="color:red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="asterisk" for="bill_country">Country</label>
                                                    <select name="bill_country"
                                                        class="form-control @error('bill_country') is-invalid @enderror"
                                                        value="{{ old('bill_country', $billAddress['country_id'] ?? '' ) }}"
                                                        autofocus>
                                                        <option value="">Select Country</option>
                                                        @foreach($country as $value)
                                                        <option value="{{$value['id']}}"
                                                            <?php if ($billAddress) {
                                                                                         {{ echo old('bill_country', $billAddress['country_id']) == $value['id'] ? 'selected' : '';}}
                                                                                    } else { {{ echo old('bill_country') == $value['id'] ? 'selected' : '';}} } ?>>
                                                            {{$value['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('bill_country')
                                                    <p class="error_result" style="color:red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="asterisk">Pincode</label>
                                                    <input type="text"
                                                        class="form-control @error('bill_pincode') is-invalid @enderror"
                                                        name="bill_pincode"
                                                        value="{{ old('bill_pincode', $billAddress['pin_code'] ?? '' ) }}"
                                                        placeholder="Pincode" autofocus>
                                                    @error('bill_pincode')
                                                    <p class="error_result" style="color:red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Landmark</label>
                                                    <input type="text" class="form-control" name="bill_landmark"
                                                        value="{{ old('bill_landmark', $billAddress['landmark'] ?? '' ) }}"
                                                        placeholder="Landmark">
                                                </div>
                                            </div>

                                            <div class="form_data d-flex align-items-center">
                                                <div class="form-group col-md-12 title_mini">
                                                    <label for="">Shipping Address</label>
                                                </div>

                                                <div class="col-sm-12 check_selection">
                                                    <input type="checkbox" name="different_ship_address"
                                                        id="different_address_checkbox" value="yes"
                                                        <?php {{ echo old('different_ship_address', $shipAddress && $shipAddress['different_ship_address'] ?? '') == "yes" ? 'checked' : '' ;}} ?>>
                                                    <label for="different_address_checkbox">Different Shipping Address
                                                        ?</label>
                                                </div>

                                                <div class="" id="shipment_address_div"
                                                    style="<?php {{ echo old('different_ship_address', $shipAddress && $shipAddress['different_ship_address'] ?? '') == "yes" ? '' : 'display:none' ;}} ?>">
                                                    <div class="form_data d-flex align-items-center shipp_here">

                                                        <div class="form-group col-md-12">
                                                            <label class="asterisk">Address <span
                                                                    class="mini_adder">(Area/Colony/Street/Sector/Village)</span></label>
                                                            <!-- <input class="form-control" type="text" value="Plot Number-7, Sector-13"> -->
                                                            <input type="text"
                                                                class="form-control @error('ship_address') is-invalid @enderror"
                                                                id="ship_address" name="ship_address"
                                                                value="{{ old('ship_address', $shipAddress['address'] ?? '' ) }}"
                                                                placeholder="Address" autofocus>
                                                            @error('ship_address')
                                                            <p class="error_result" style="color:red">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="asterisk">City <span
                                                                    class="mini_adder">(City/District/Town)</span></label>
                                                            <input
                                                                class="form-control  @error('ship_city') is-invalid @enderror"
                                                                id="ship_city" name="ship_city" type="text"
                                                                value="{{ old('ship_city', $shipAddress['city'] ?? '' ) }}"
                                                                placeholder="City" autofocus>
                                                            @error('ship_city')
                                                            <p class="error_result" style="color:red">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="asterisk" for="ship_state">State</label>
                                                            <select name="ship_state" id="ship_state"
                                                                class="form-control @error('ship_state') is-invalid @enderror"
                                                                value="{{ old('ship_state', $shipAddress['state_id'] ?? '' ) }}"
                                                                autofocus>
                                                                <option value="">Select State</option>
                                                                @foreach($state as $value)
                                                                <option value="{{$value['id']}}"
                                                                    <?php if ($shipAddress) {
                                                                                                  {{ echo old('ship_state', $shipAddress['state_id']) == $value['id'] ? 'selected' : '';}}
                                                                                            } else { {{ echo old('ship_state') == $value['id'] ? 'selected' : '';}} } ?>>
                                                                    {{$value['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('ship_state')
                                                            <p class="error_result" style="color:red">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="asterisk" for="ship_country">Country</label>
                                                            <select name="ship_country" id="ship_country"
                                                                class="form-control @error('ship_country') is-invalid @enderror"
                                                                value="{{ old('ship_country', $shipAddress['country_id'] ?? '') }}"
                                                                autofocus>
                                                                <option value="">Select Country</option>
                                                                @foreach($country as $value)
                                                                <option value="{{$value['id']}}"
                                                                    <?php if ($shipAddress) {
                                                                                                {{ echo old('ship_country', $shipAddress['country_id']) == $value['id'] ? 'selected' : '';}}
                                                                                            } else { {{ echo old('ship_country') == $value['id'] ? 'selected' : '';}} } ?>>
                                                                    {{$value['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('ship_country')
                                                            <p class="error_result" style="color:red">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="asterisk">Pincode</label>
                                                            <input name="ship_pincode"
                                                                class="form-control @error('ship_pincode') is-invalid @enderror"
                                                                id="ship_pincode" type="text"
                                                                value="{{ old('ship_pincode', $shipAddress['pin_code'] ?? '') }}"
                                                                placeholder="Pincode" autofocus>
                                                            @error('ship_pincode')
                                                            <p class="error_result" style="color:red">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Landmark</label>
                                                            <input type="text" id="ship_landmark" class="form-control"
                                                                name="ship_landmark"
                                                                value="{{ old('ship_landmark', $shipAddress['landmark'] ?? '' ) }}"
                                                                placeholder="Landmark">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="update_btns wrap_in_btns">
                                                <button type="submit" class="btn btn-primary f-size">Update</button>
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
</section>
</div>
@endsection

@push('scripts')
<script>
$(document).on('ready', function() {
    let arrShipAddress = <?php echo json_encode($shipAddress); ?>;
    let arrBillAddress = <?php echo json_encode($billAddress); ?>;
    // console.log('add',arrShipAddress);
    $('#different_address_checkbox').on('click', function(e) {
        if ($(this).is(':checked')) {
            $('#ship_address').val('');
            $('#ship_apartment').val('');
            $('#ship_city').val('');
            $('#ship_state').val('');
            $('#ship_country').val('');
            $('#ship_pincode').val('');
            $('#ship_landmark').val('');
            $('#shipment_address_div').show();
        } else {
            if (arrShipAddress) {
                $('#ship_address').val(arrShipAddress['address']);
                $('#ship_apartment').val(arrShipAddress['apartment']);
                $('#ship_city').val(arrShipAddress['city']);
                $('#ship_state').val(arrShipAddress['state_id']);
                $('#ship_country').val(arrShipAddress['country_id']);
                $('#ship_pincode').val(arrShipAddress['pin_code']);
                $('#ship_landmark').val(arrShipAddress['landmark']);
            } else if (arrBillAddress) {
                $('#ship_address').val(arrBillAddress['address']);
                $('#ship_apartment').val(arrBillAddress['apartment']);
                $('#ship_city').val(arrBillAddress['city']);
                $('#ship_state').val(arrBillAddress['state_id']);
                $('#ship_country').val(arrBillAddress['country_id']);
                $('#ship_pincode').val(arrBillAddress['pin_code']);
                $('#ship_landmark').val(arrBillAddress['landmark']);
            } else {
                $('#ship_address').val('');
                $('#ship_apartment').val('');
                $('#ship_city').val('');
                $('#ship_state').val('');
                $('#ship_country').val('');
                $('#ship_pincode').val('');
                $('#ship_landmark').val('');
            }
            $('#shipment_address_div').hide();
        }
    });
});
</script>
@endpush