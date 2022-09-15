@include('header')

@section('title', 'form')

@section ('content')

  
<br>
  <div class="card-body">
    <h1 class="text-center"> Registeration of Students</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('student.register') }}">
          <div class="form-group">
              @csrf
              <label for="studentname">Name</label>
              <input type="text" class="form-control" name="studentname"/>
              @if ($errors->has('name'))
                  <span class="text-danger">Select a book name</span>
                @endif
          </div>
          <div class="form-group">
              <label for="studentemail">Email</label>
              <input type="studentemail" class="form-control" name="studentemail"/>
              @if ($errors->has('email'))
                  <span class="text-danger">Select a book name</span>
                @endif
          </div>
        
          <button type="submit" class="btn btn-block btn-danger">Create Student</button>
      </form>
  </div>
</div>
  
@include('footer')