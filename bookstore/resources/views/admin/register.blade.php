@extends('admin.adminlayout')

@section('maincontent')
  <div class="wrapper">
    <h1 id="register-label">Admin Register</h1>
    <hr>
    <form id="register"  action ="/adminreg" method ="POST">
      @csrf
      
      @if(session()->has('message'))
        <span>{!! session()->get('message') !!}
      @endif

      <div>
        <label>first name:</label>
        @if($errors->has('fname'))
          <span class="err">{!! $errors->get('fname')[0] !!}</span>
        @endif
        <input type="text" name="fname" placeholder="first name">
      </div>
      <div>
        <label>last name:</label>	
        @if($errors->has('lname'))
          <span class="err">{{ $errors->first('lname') }}</span>
        @endif
        <input type="text" name="lname" placeholder="last name">
      </div>

      <div>
        <label>email:</label>
        @if($errors->has('email'))
          <span class="err"> {{ $errors->first('email') }}</span>
        @endif
        <input type="text" name="email" placeholder="email">
      </div>
      <div>
        <label>password:</label>
        @if($errors->has('password'))
          <span class="err"> {{ $errors->first('password') }}</span>
        @endif
        <input type="password" name="password" placeholder="password">
      </div>

      <div>
        <label>confirm password:</label>	  
        <input type="password" name="password_confirmation" placeholder="password">
      </div>

      <input type="submit" name="register" value="register">
    </form>

    <h4 class="jumpto">Have an account? <a href="/adminlogin">login</a></h4>
  </div>
@endSection