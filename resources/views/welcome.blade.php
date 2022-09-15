@include('header')

@section('title', 'Main')
    

    @if(Session::has('message'))
        <div class="alert-box success">
         {{ Session::get('message') }}
        </div>
    @endif
@section ('content')
 
    <br>
    <br>
    <div> <h3 class="text-center"> Hi <span style="color:blue">{{$user->name}}!!</span></h3></div></br>
    <a href="/showStudents" target="_self">List of Registered Students</a></br>
    <a href="/showBooks" target="_self">List of Available BOOKS</a></br>

    <a href="/reviewSession" target="_self"> Give us Reviews</a></br>

    

</br><a href="{{ url('/logoutUser')}}"><button class="btn btn-danger btn-sm" >Logout</button></a>
@include('footer')
