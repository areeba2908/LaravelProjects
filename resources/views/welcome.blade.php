@extends('layouts.app')

@section('title', 'Main')
    
@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
         {{ session('status') }}
 </div>
 @endif
@include('layouts.flashmessages')
    
    
    <a href="/showStudents" target="_self">List of Registered Students</a></br>
    <a href="/showBooks" target="_self">List of Available BOOKS</a></br>

    <a href="/reviewSession" target="_self"> Give us Reviews</a></br>
    <a href="/mailForm" target="_self"> Want to send mail</a></br>

    

<!--</br><a href="{{ url('/logoutUser')}}"><button class="btn btn-danger btn-sm" >Logout</button></a>-->
@endsection

