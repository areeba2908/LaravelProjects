<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <div class="push-top">
        @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>BOOK ID</td>
          <td>BOOK Name</td>
          <td>Available</td>
          <td>Student_id</td>
          <td>Student Name</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $books)
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
</body>
</html>