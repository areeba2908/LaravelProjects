@extends('layouts.app')

@section('title', 'Main')
    
@section('content')

@include('layouts.flashmessages')

<div class="card shadow-0 border" style="background-color: #f0f2f5;">
<div class="card-body p-4">
  <h3 class="text-center">Available Books In Library</h3>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Book ID</td>
          <td>Book Name</td>
          <td>Available</td>
          <td>Student_id</td>
          <td>Student Name</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $books)
        <tr>
            <td>{{$books->id}}</td>
            <td>{{$books->bookname}}</td>
            <td>{{$books->available}}</td>
            <td>{{$books->student_id}}</td>
            <td>{{optional($books->student)->name}}</td>
            @if(is_null($books->student_id))
            {
              <td class="text-center"><a href="{{ url('/assignBook')}}/{{$books->id}}"><button class="btn btn-primary" >Assign Book</button></a></td>
            }
            @else
            {
              <td class="text-center">
                  <a  href="{{ url('/returnBook')}}/{{$books->id}}"><button class="btn btn-danger btn-sm" >Return Book</button></a> 
              </td>
              
            }
        </tr>
        @endif
        @endforeach
    </tbody>
  </table>
  
  <form action="{{ url('/bookForm')  }}" method="post" style="display: inline-block">
  @csrf
    <button class="btn btn-danger btn-sm" type="submit">Add New Book</button>
    </form>
<div>
          </div>
          </div>

@endsection
@include('layouts.footer')