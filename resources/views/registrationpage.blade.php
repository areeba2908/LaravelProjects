@include('header')

@section('title', 'user registration')

@section ('content')

  
<br>
    
<div class="jumbotron vertical-center">
    <div class="row d-flex justify-content-center">
    <div class="col-md-5 col-lg-6" >
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
    <div class="card-body p-4">
    
        <h1 class="text-center">User Registeration</h1>
   
      <form method="post" action="{{ route('user.register') }}">
      @csrf
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" placeholder="enter full name"/>
          </div>
          <span class="text-danger">@error('name'){{$message}}@enderror</span>

          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <span class="text-danger">@error('email'){{$message}}@enderror</span>

          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <span class="text-danger">@error('password'){{$message}}@enderror</span>

          <div class="form-group">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" class="form-control" name="password_confirmation"/>
          </div>
          <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>

          <button type="submit" class="btn btn-block btn-danger">Register</button>
      </form>

      <a href="/"> Already have account?? Login here </a>

    </div>
     </div>
    </div>
</div>
</div>

    @include('footer')