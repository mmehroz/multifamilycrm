@extends('layouts.logintheme')
@section('logincontent')
<section id="login">
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
    <h2>Sign-In</h2>
    <p class="">Access dashboard using your email and password.</p>
    <form method="Post" action="{{url('/submitlogin')}}">
        {{ csrf_field() }}
        <input type="email" name="email" class="" id="" placeholder="Enter your email address" required><br>
        <input type="password" id="password" name="password"  placeholder="Enter your password" required><br>
        <button type="submit" class=" ">  Log In </button>     
        <p class="login-p"> <a href="#">Forgot Password? </b> </a>  </p>
    </form>
</section>  
@endsection