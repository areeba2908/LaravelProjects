@extends('layouts.app')

@section('title', 'Main')
    
@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
         {{ session('status') }}
 </div>
 @endif
@include('layouts.flashmessages')
    
    <div class="text-center">
    <!--<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
    </a>
  </div>
</nav>-->
        <h3> Hi {{ Auth::user()->name }} </h3>
    <div class="container pt-3">
    <a href="/showStudents" target="_self">List of Registered Students</a></br>
    <a href="/showBooks" target="_self">List of Available BOOKS</a></br>

    <a href="/reviewSession" target="_self"> Give us Reviews</a></br>
    <a href="/mailForm" target="_self"> Want to send mail</a></br>
    <a href="/showUsers" target="_self"> List of all admin users</a></br>
    <a href="/addImage" target="_self"> Add user Image</a></br>
</div>
</div>
    

<!--</br><a href="{{ url('/logoutUser')}}"><button class="btn btn-danger btn-sm" >Logout</button></a>-->
@endsection

