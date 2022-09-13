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
  
    <div class="row d-flex justify-content-center">
  <div class="col-md-10 col-lg-10">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
      <div class="card-body p-4">
        <div class="form-outline mb-4">
        <form method="post" action="{{ url('/postReview')}}">
          @csrf
          <label class="form-label" for="addANote">+ Add a note</label>
          <input type="text" id="addANote" name= "addANote" class="form-control" placeholder="Type comment..." />
        </div>
              <label for="student_id">Review About: </label>
                <select name="bookname" id="bookname">
                    <option disabled selected> -- select a book -- </option>
                        @foreach($books as $books)
                            <option value="{{$books->bookname}}">
                            {{$books->bookname}}
                            </option>
                            @endforeach
                </select>
        <button type="submit" class="btn btn-block btn-danger">Post</button><br>

        @foreach($reviews as $reviews)
        <div class="card mb-4">
          <div class="card-body">
            <p>{{$reviews->reviews}}</p>

            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <p class="small mb-0 ms-2"><strong>Review By: {{$reviews->user->name}}</strong></p>
              </div>
              <div class="d-flex flex-row align-items-center">
                <p class="small text-muted mb-0">Book: {{$reviews->book}}</p>
                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                <p class="small text-muted mb-0">3</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
</body>
</html>