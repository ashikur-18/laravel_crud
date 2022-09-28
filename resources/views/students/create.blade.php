@extends('layout.index')


@section('sideber')
<a href="/students" class="btn btn-primary">Students</a>
@endsection


@section('content')
    <h1>Add New Students</h1>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
               <li> {{$error}} </li>
            @endforeach
        </ul>
    @endif
        <form action='/students' method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value="{{old('name')}}" name="name" palceholder="Enter Name">
            </div>
            <div class="form-group">
                <label class="form-label">E-Mail</label>
                <input type="email" class="form-control" value="{{old('email')}}" name="email" palceholder="Enter Email">
            </div>
            <div class="form-group">
                <label class="form-label">Roll</label>
                <input type="text" class="form-control" value="{{old('roll')}}" name="roll" palceholder="Enter Roll">
            </div>
            <div class="form-group">
                <label class="form-label">Registration</label>
                <input type="text" class="form-control" value="{{old('registration')}}" name="registration" palceholder="Enter Registration">
            </div>
            <div class="form-group">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" value="{{old('address')}}" name="address" palceholder="Enter Address">
            </div>
            <div class="form-group">
                <label class="form-label">Photo</label>
                <input type="file" class="form-control"
                onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])"
                  name="photo">
                 <img src="" width="160" height="160" id='photo' alt="">
            </div>
        
            <br/>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection