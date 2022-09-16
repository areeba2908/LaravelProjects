@extends('layouts.app')

@section('title', 'Main')
    
@section('content')
  
    <div class="card-body">
    <h1 class="text-center"> Assign Book to Student</h1>
   
      <form method="post" action="{{ url('/updateBook')}}/{{$book->id}}">
          <div class="form-group">
              @csrf
              <h4>Book Name: </h4> {{$book->bookname}}

          </div>

          <div class="form-group">
              @csrf
              <label for="student_id">Student ID</label>
                    <select name="student_id" id="student_id">
                        <option disabled selected> -- select an option -- </option>
                            @foreach($students as $students)
                            <option value="{{$students->id}}">
                            {{$students->id}}
                            </option>
                            @endforeach
                    </select>
          </div>

          <button type="submit" class="btn btn-block btn-danger">Assigned</button>
      </form>
  </div>

  @endsection
  @include('layouts.footer')