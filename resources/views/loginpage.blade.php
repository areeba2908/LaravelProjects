@include('header')

@section('title', 'user login')

@section ('content')

  
<br>
</br>
    <div class="jumbotron vertical-center">
    <div class="row d-flex justify-content-center">
    <div class="col-md-5 col-lg-6" >
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
    <div class="card-body p-4">
        <h1 class="text-center"> User Login</h1>
   
      <form method="post" action="{{ route('user.login') }}">
      @csrf
          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          @error('email')<div class="alert alert-danger">{{$message}}</div>@enderror


          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password"/>
              <span class="text-danger">@error('password'){{$message}}@enderror</span>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Login</button>
      </form>

      <a href="/registrationpage"> Dont have Account?? Register here </a>
      
    </div>
</div>
     </div>
    </div>
</div>
@include('footer')