@extends('layout.index')

@section('sideber')

<a href="/students" class="btn btn-primary">Show Student List</a>

@endsection

@section('content')
    <h1>Student Information</h1>
     <table class="table">
        <tr>
            <th>Name</th>
            <td>{{$student->name}}</td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td>{{$student->email}}</td>
        </tr>
        <tr>
            <th>Roll</th>
            <td>{{$student->roll}}</td>
        </tr>
        <tr>
            <th>Registration</th>
            <td>{{$student->registration}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$student->address}}</td>
        </tr>
            <th>Photo</th>
            <td>
                <img @if(!isset($student->photo))  @endif src="{{$student->photo}}" width="150" alt="">
            </td>

       
     </table>
     <form action="/students/{{ $student->id }}" method="POST">
        @csrf
        @method('delete')
         <button class="btn btn-danger" onclick="return confirm('Are you Sure???')">Delete</button>
    </form>
@endsection