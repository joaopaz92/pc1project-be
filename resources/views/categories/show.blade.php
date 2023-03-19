@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center mx-0">  
        <h3 class="mb-4 mt-4 justify-content-center">Show/Edit - {{$category->name}}</h3>
        <form action="{{route('category-update', $category->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-sm-12 col-xl-6  mx-0">
                <div class="row">
                    <div class="col-sm-6 justify-content">
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="floatingInput"
                            placeholder="Computer" value="{{$category->name}}">
                            <label for="floatingInput">Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 justify-content-end">
                        <img class="img-fluid mb-4" src="{{$category->picture}}" style="width: 100px; height: 100px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 justify-content">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Choose a category picture</label>
                            <input class="form-control bg-dark" name="picture"  type="file" id="formFile">
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
            </div>
        </form>
    </div>
</div>

@endsection