@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center mx-0">  
        <h3 class="mb-4 mt-4 justify-content-center">Show/Edit - {{$trademark->name}}</h3>
        <form action="{{route('trademark-update', $trademark->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-4 col-xl-4 justify-content mx-0">
                    <div class="form-floating mb-3">
                        <input name="name" type="text" class="form-control" id="floatingInput"
                        placeholder="Computer" value="{{$trademark->name}}">
                        <label for="floatingInput">Name</label>
                    </div>
                </div>
                <div class="col-4 col-xl-4 justify-content mx-0">
                    <div class="form-floating mb-3">
                        <input name="contact" type="text" class="form-control" id="floatingInput"
                        placeholder="Contact"  value="{{$trademark->contact}}">
                        <label for="floatingInput">Contact</label>
                    </div>                                 
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 justify-content">
                    <div class="form-floating mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection