@extends('layouts.app')

@section('title', 'Main')
    
@section('content')

@include('layouts.flashmessages')

<div class="card shadow-0 border" style="background-color: #f0f2f5;">
<div class="card-body p-4">
  <h3 class="text-center">Books In Library</h3>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Book ID</td>
          <td>Book Name</td>
          <td>Available</td>
          <td>Student Name</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $books)
        <tr>
            <td>{{$books->id}}</td>
            <td>{{$books->bookname}}</td>
            @if($books->available==1)
            <td><span class="badge badge-warning">YES</span></td>
            @else
                <td><span class="badge badge-warning">NO</span></td>
            @endif
            <td><a href="{{ url('/editStudent')}}/{{$books->student_id}}">{{optional($books->student)->name}}</a></td>
            @if(is_null($books->student_id))

              <td class="text-center"><a href="{{ url('/assignBook')}}/{{$books->id}}"><button class="btn btn-primary" >Assign Book</button></a></td>

            @else

              <td class="text-center">
                  <a  href="{{ url('/returnBook')}}/{{$books->id}}"><button class="btn btn-danger btn-sm" >Return Book</button></a> 
              </td>

        </tr>
        @endif
        @endforeach
    </tbody>
  </table>

    <a href="{{ url('/bookForm')}}">
    <button class="btn btn-danger btn-sm" >Add New Book</button>
    </a>
<div>
          </div>
          </div>

@endsection
@include('layouts.footer')