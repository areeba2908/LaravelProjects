@extends('layouts.app')

@section('title', 'Main')
    
@section('content')

  

    <div class="card push-top">
  <div class="card-header">
    Edit User
  </div>
  <div class="card-body">
    <h1 class="text-center">Edit Student Details</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{url('updateStudent')}}/{{$student->id}}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value = "{{$student->name}}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value = "{{$student->email}}"/>
          </div>
          
          
          <button type="submit" class="btn btn-block btn-danger">update Student</button>
      </form>
  </div>
</div>

@endsection
@include('layouts.footer')