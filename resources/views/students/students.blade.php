@extends('layout.index')

@section('sideber')

<a href="/students/create" class="btn btn-primary">Add New Students</a>

@endsection

@section('content')

<h1>Student List</h1>
@if(isset($message))

<div class="alert alert-success" role="alert">
  {{$message}}
</div>


@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
        <tr>
            <th scope="row">{{$student->id}}</th>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>
                <a href="/students/{{$student->id}}" class="btn btn-success">View</a>
                <a href="/students/{{$student->id}}/edit" class="btn btn-primary">Edit</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>


@endsection