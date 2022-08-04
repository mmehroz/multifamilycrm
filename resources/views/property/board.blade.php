@extends('layouts.apptheme')
@section('appcontent')
<<div class="page-wrapper prop-board">
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
          </ul>
        </div>
    @endif
    <h4 class="page-title ">Properties <span class ="num-count">{{$totalcount}}</span> </h4>
    <div class="row mb-5">
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="h2-heading-bg">
                <h2>No Contact Made {{$totalcount}}</h2> </div>
            <div class="prop-main-div">
                @foreach($data as $datas)
                <a href="{{url('/propertydetails')}}/{{$datas->property_id}}">
                <div class="new-tab-content">
                    <p> {{$datas->property_address}}
                        <br> {{$datas->property_name}}
                        <br> {{$datas->property_ownerphone}}
                        <br> <span class="prop-date"> Added On {{$datas->created_at}}  </span> </p>
                </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="h2-heading-bg">
                <h2>Contact Made {{$totalcount}}</h2> </div>
            <div class="prop-main-div">
                @foreach($data as $datas)
                <a href="{{url('/propertydetails')}}/{{$datas->property_id}}">
                <div class="new-tab-content">
                    <p> {{$datas->property_address}}
                        <br> {{$datas->property_name}}
                        <br> {{$datas->property_ownerphone}}
                        <br> <span class="prop-date"> Added On {{$datas->created_at}}  </span> </p>
                </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="h2-heading-bg">
                <h2>Info Received {{$totalcount}}</h2> </div>
            <div class="prop-main-div">
                @foreach($data as $datas)
                <a href="{{url('/propertydetails')}}/{{$datas->property_id}}">
                <div class="new-tab-content">
                    <p> {{$datas->property_address}}
                        <br> {{$datas->property_name}}
                        <br> {{$datas->property_ownerphone}}
                        <br> <span class="prop-date"> Added On {{$datas->created_at}}  </span> </p>
                </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="h2-heading-bg">
                <h2>Offer Made {{$totalcount}}</h2> </div>
            <div class="prop-main-div">
                @foreach($data as $datas)
                <a href="{{url('/propertydetails')}}/{{$datas->property_id}}">
                <div class="new-tab-content">
                    <p> {{$datas->property_address}}
                        <br> {{$datas->property_name}}
                        <br> {{$datas->property_ownerphone}}
                        <br> <span class="prop-date"> Added On {{$datas->created_at}}  </span> </p>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection