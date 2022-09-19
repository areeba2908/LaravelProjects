@extends('layouts.app')

@section('title', 'Main')

@section('content')

    @include('layouts.flashmessages')
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
        <div class="card-body p-4">
            <h3 class="text-center">Registered Students</h3>

            <table class="table">
                <thead>
                <tr class="table-warning">
                    <td>Name</td>
                    <td>Email</td>
                    <td>Image</td>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $users)
                    <tr>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td><img src="http://library-app.test/Images/users/{{$users->images}}" class="img-fluid"></td>
                        <!--<td class="text-center">
                            <a href="{{ url('/editStudent')}}/{{$users->id}}"><button class="btn btn-primary btn-sm" >Edit</button></a>
                            <a href="{{ url('/softDeleteStudent')}}/{{$users->id}}"><button class="btn btn-danger btn-sm" >Delete</button></a>
                        </td>-->
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ url('/register')}}"><button class="btn btn-danger btn-sm">Register User</button></a>
            <div>
            </div>
        </div>
@endsection
@include('layouts.footer')