@include('header')

@section('title', 'reviews')

@section ('content')

  
<br>


    
  <div class="row d-flex justify-content-center">
  <div class="col-md-10 col-lg-10">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
      <div class="card-body p-4">
        <div class="form-outline mb-4">
        <form method="post" action="{{ url('/postReview')}}">
          @csrf
          <label class="form-label" for="addANote">+ Add a note</label>
          <input type="text" id="addANote" name= "addANote" class="form-control" placeholder="Type comment..." />
 
          @if ($errors->has('addANote'))
            <span class="text-danger">Kindly add Comment</span>
          @endif

        </div>
              <label for="student_id">Review About: </label>
                <select name="bookname" id="bookname">
                    <option disabled selected> -- select a book -- </option>
                        @foreach($books as $books)
                            <option value="{{$books->bookname}}">
                            {{$books->bookname}}
                            </option>
                            @endforeach
                </select><br>
                @if ($errors->has('bookname'))
                  <span class="text-danger">Select a book name</span>
                @endif
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
@include('footer')