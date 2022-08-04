@extends('layouts.apptheme')
@section('appcontent')
<div class="page-wrapper prop-name-page">
    @if(session('message'))
        <div>
            <p class="alert alert-success" >{{session('message')}}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <div><h4><li>{{ $error }}</li></h4> </div>
            @endforeach
          </ul>Studio Effective Rent/Unit
                            
        </div>
    @endif
   <div class="dash-url"> <span style="color:#4D525B">properties </span>
                <a href="#"> <span style="color:#A2A2A2">  &gt; property name </span> </a>
            </div>
        <h4 class="page-title">{{$data->property_name}}</h4>
            <form method="Post" action="{{url('/submiteditproperty')}}" class="user-profile-form property-form">
            {{ csrf_field() }}
            <input type="hidden" name="hdn_property_id" value="{{$data->property_id}}">
            <input type="hidden" name="hdn_type" value="{{$type}}">
                <div class="form-sec top-sec-form">
                    <div class="row proff-form-row">
                        <div class="col-lg-3">
                            <label for="">Property Title *</label>
                            <input type="text" name="property_name" value="{{$data->property_name}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Add Property Tags *</label>
                            <input type="text" name="property_tag"> </div>
                        <div class="col-lg-3"> </div>
                    </div>
                </div>
                <div class="h2-heading-bg">
                    <h2>Property Specs And Price</h2> </div>
                <div class="form-sec">
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">Property Address *</label>
                            <input type="text" name="property_address" value="{{$data->property_address}}"> </div>
                        <div class="col-lg-3">
                            <label for="">City * </label>
                            <input type="text" name="property_city*" value="{{$data->property_city}}"> </div>
                        <div class="col-lg-3">
                            <label for="">State *</label>
                            <input type="text" name="property_state" value="{{$data->property_state}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Zip * </label>
                            <br>
                            <input type="text" name="property_zip" value="{{$data->property_zip}}"> </div>
                    </div>
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for=""> Number Of Units *</label>
                            <input type="text" name="property_noofunit" value="{{$data->property_noofunit}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Building Class * </label>
                            <input type="text" name="property_class" value="{{$data->property_class}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Year Built *</label>
                            <input type="text" name="property_yearbuilt" value="{{$data->property_yearbuilt}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Year Renovated * </label>
                            <br>
                            <input type="text" name="property_yearrenovated" value="{{$data->property_yearrenovated}}"> </div>
                    </div>
                </div>
                <div class="h2-heading-bg">
                    <h2>Property Specs And Price</h2> </div>
                <div class="form-sec">
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">Avg Unit SF *</label>
                            <input type="text" name="property_unitsf" value="{{$data->property_unitsf}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Avg Asking/SF * </label>
                            <input type="text" name="property_askingsf" value="{{$data->property_askingsf}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Avg Asking/Unit *</label>
                            <input type="text" name="property_askingunit" value="{{$data->property_askingunit}}"> </div>
                        <div class="col-lg-3">
                            <label for="">For Sale Price * </label>
                            <br>
                            <input type="text" name="property_forsaleprice" value="{{$data->property_forsaleprice}}" > </div>
                    </div>
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for=""> Cap Rate *</label>
                            <input type="text" name="property_caprate" value="{{$data->property_caprate}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Vacancy % * </label>
                            <input type="text" name="property_vacancy" value="{{$data->property_vacancy}}"> </div>
                        <div class="col-lg-3">
                            <label for="">$Price/Unit *</label>
                            <input type="text" name="property_spriceunit" value="{{$data->property_spriceunit}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Studio Effective Rent/Unit * </label>
                            <br>
                            <input type="text" name="property_studiorentunit" value="{{$data->property_studiorentunit}}"> </div>
                    </div>
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">Number Of 1 Bedrooms Units *</label>
                            <input type="text" name="property_noofonebed" value="{{$data->property_noofonebed}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Number Of 2 Bedrooms Units * </label>
                            <input type="text" name="property_nooftwobed" value="{{$data->property_nooftwobed}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Number Of 3 Bedrooms Units *</label>
                            <input type="text" name="property_noofthreebed" value="{{$data->property_noofthreebed}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Number Of 4 Bedrooms Units * </label>
                            <br>
                            <input type="text" name="property_nooffourbed" value="{{$data->property_nooffourbed}}"> </div>
                    </div>
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">One Bedroom Effective Rent/Unit *</label>
                            <input type="text" name="property_onebedrentunit" value="{{$data->property_onebedrentunit}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Two Bedroom Asking Rent/Unit * </label>
                            <input type="text" name="property_twobedaskingrentunit" value="{{$data->property_twobedaskingrentunit}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Three Bedroom Effective Rent/Unit *</label>
                            <input type="text" name="property_threebedaskingrentunit" value="{{$data->property_threebedaskingrentunit}}"> </div>
                        <div class="col-lg-3"> </div>
                    </div>
                </div>
                <div class="h2-heading-bg">
                    <h2>Owner Details</h2> </div>
                <div class="form-sec">
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">Owner Name *</label>
                            <input type="text" name="property_ownername" value="{{$data->property_ownername}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Owner Address * </label>
                            <input type="text" name="property_owneraddress" value="{{$data->property_owneraddress}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Owner City State Zip *</label>
                            <input type="text" name="property_ownercitystatezip" value="{{$data->property_ownercitystatezip}}"> </div>
                        <div class="col-lg-3"> </div>
                    </div>
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">Owner Contact * </label>
                            <br>
                            <input type="text" name="property_ownercontact" value="{{$data->property_ownercontact}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Owner Phone * </label>
                            <input type="text" name="property_ownerphone" value="{{$data->property_ownerphone}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Property Manager Name *</label>
                            <input type="text" name="property_managername" value="{{$data->property_managername}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Property Manager Phone * </label>
                            <br>
                            <input type="text" name="property_managerphone" value="{{$data->property_managerphone}}"> </div>
                    </div>
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">Recorded Owner Name *</label>
                            <input type="text" name="property_recordedname" value="{{$data->property_recordedname}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Recorded Owner Contact * </label>
                            <input type="text" name="property_recordedcontact" value="{{$data->property_recordedcontact}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Recorded Owner Phone *</label>
                            <input type="text" name="property_recordedphone" value="property_recordedphone"> </div>
                        <div class="col-lg-3">
                            <label for="">Recorded Owner Address * </label>
                            <br>
                            <input type="text" name="property_recordedaddress" value="{{$data->property_recordedaddress}}"> </div>
                    </div>
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">Recorded Owner City State Zip *</label>
                            <input type="text" name="property_recordedcitystatezip" value="{{$data->property_recordedcitystatezip}}"> </div>
                    </div>
                    <div class="row  col-streets">
                        <div class="col-lg-3">
                            <label for="">Sale Company Name *</label>
                            <input type="text" name="property_salecname" value="{{$data->property_salecname}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Sale Company Phone * </label>
                            <input type="text" name="property_salecphone" value="{{$data->property_salecphone}}"> </div>
                        <div class="col-lg-3">
                            <label for="">Sale Company Contact *</label>
                            <input type="text" name="property_saleccontact" value="{{$data->property_saleccontact}}"> </div>
                        <div class="col-lg-3"> </div>
                    </div>
                    <div class="user-btns">
                        <input type="submit" name="Save" value="Save">
                        @if($type == "Dashboard")
                        <a href="{{url('admindashboard')}}">Cancel</a>
                        @else
                        <a href="{{url('propertylist')}}">Cancel</a>
                        @endif
                         </div>
                </div>
        </div>
        </form>
</div>
@endsection