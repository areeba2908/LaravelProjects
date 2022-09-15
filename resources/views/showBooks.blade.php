@include('header')

@section('title', 'Books')

@section ('content')

  
<br>
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
                  <a  href="{{ url('/returnBook')}}/{{$books->id}}"><button class="btn btn-danger btn-sm" >Book Return</button></a> 
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
@include('footer')