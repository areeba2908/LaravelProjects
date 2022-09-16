@extends('layouts.app')

@section('title', 'Main')
    
@section('content')

    <div class="card push-top">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h1 class="text-center"> ADD NEW BOOK IN LIBRARY</h1>
   
      <form method="post" action="{{ route('book.register') }}">
          <div class="form-group">
              @csrf
              <label for="bookname">Book Name</label>
              <input type="text" class="form-control" name="bookname"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Add Book</button>
      </form>
  </div>
</div>

@endsection
@include('layouts.footer')