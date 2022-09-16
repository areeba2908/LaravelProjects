@extends('layouts.app')

@section('title', 'Main')
    
@section('content')

<div class="jumbotron vertical-center">
<div class="row d-flex justify-content-center">
<div class="col-md-5 col-lg-6" >
<div class="card shadow-0 border" style="background-color: #f0f2f5;">
<div class="card-body p-4">

    <form method="post" action="{{ route('send.mail') }}">
      @csrf
          <div class="form-group">
              <label for="senderemail">Sender Address</label>
              <input type="text" class="form-control" name="senderemail"/>
          </div>

          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title"/>
          </div>


          <div class="fcf-form-group">
            <label for="messagebody" class="fcf-label">Your Message</label>
            <div class="fcf-input-group">
            <textarea id="messagebody" name="messagebody" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-block btn-danger">send</button>
    </form>
</div>
</div>
</div>
</div>
</div>


@endsection

@include('layouts.footer')