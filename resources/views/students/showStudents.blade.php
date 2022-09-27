@extends('layouts.app')

@section('title', 'Main')
    
@section('content')

@include('layouts.flashmessages')
<div class="card shadow-0 border" style="background-color: #f0f2f5;">
<div class="card-body p-4">
  <h3 class="text-center">Registered Students</h3>

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $students)
        <tr>
            <td>{{$students->id}}</td>
            <td>{{$students->name}}</td>
            <td>{{$students->email}}</td>
            
            <td class="text-center">
              <a href="{{ url('/editStudent')}}/{{$students->id}}"><button class="btn btn-primary btn-sm" >Edit</button></a>
                <a href="{{ url('/softDeleteStudent')}}/{{$students->id}}"><button class="btn btn-danger btn-sm" >Delete</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <a href="{{ url('/showForm')}}"><button class="btn btn-danger btn-sm">Register Student</button></a>
<a href="{{ url('/restoreAllSoftDeletes')}}"><button class="btn btn-danger btn-sm" >Restore All</button></a>
<div>
</div>
</div>
@endsection
@include('layouts.footer')