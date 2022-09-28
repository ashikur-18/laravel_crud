@extends('layout.index')


@section('sideber')
<a href="/students" class="btn btn-primary">Students</a>
@endsection


@section('content')
    <h1>Edit Students</h1>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
               <li> {{$error}} </li>
            @endforeach
        </ul>
    @endif
        <form action='/students/{{ $student->id }}' method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value="{{old('name',$student->name)}}" name="name" palceholder="Enter Name">
            </div>
            <div class="form-group">
                <label class="form-label">E-Mail</label>
                <input type="email" class="form-control" value="{{old('email',$student->email)}}" name="email" palceholder="Enter Email">
            </div>
            <div class="form-group">
                <label class="form-label">Roll</label>
                <input type="text" class="form-control" value="{{old('roll',$student->roll)}}" name="roll" palceholder="Enter Roll">
            </div>
            <div class="form-group">
                <label class="form-label">Registration</label>
                <input type="text" class="form-control" value="{{old('registration',$student->registration)}}" name="registration" palceholder="Enter Registration">
            </div>
            <div class="form-group">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" value="{{old('address',$student->address)}}" name="address" palceholder="Enter Address">
            </div>
            <div class="form-group">
                <label class="form-label">Photo</label>
                <input type="file" class="form-control"
                onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])"
                  name="photo">
              @if(!empty($student->photo))
                  <img src="{{ $student->photo }}" width="160" height="160" id='photo' alt="">
              @endif
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection