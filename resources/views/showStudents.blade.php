@include('header')

@section('title', 'Students')

@section ('content')

<div class="push-top">
 @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <br>
</br>
  <h3 class="text-center">Registered Students</h3>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $students)
        <tr>
            <td>{{$students->id}}</td>
            <td>{{$students->name}}</td>
            <td>{{$students->email}}</td>
            
            <td class="text-center">
              <a href="{{ url('/editStudent')}}/{{$students->id}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ url('/softDeleteStudent')}}/{{$students->id}}"><button class="btn btn-danger btn-sm" >Delete</button></a> 
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  

<a href="{{ url('/showForm')}}"><button class="btn btn-danger btn-sm">Register Student</button></a>
<a href="{{ url('/restoreAllSoftDeletes')}}"><button class="btn btn-danger btn-sm" >Restore All</button></a> 
<div>
@include('footer')