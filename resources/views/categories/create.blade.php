@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center mx-0">  
        <h3 class="mb-4 mt-4 justify-content-center">Create Product Type</h3>
        <form action="{{route('category-add')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-sm-12 col-xl-6 justify-content mx-0">
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control" id="floatingInput"
                    placeholder="Computer">
                    <label for="floatingInput">Name</label>
                </div>
                
              
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose a category picture</label>
                    <input class="form-control bg-dark" name="picture"  type="file" id="formFile">
                </div>
            </div>  
            <div class="col-sm-12 col-xl-3 justify-content mx-0">
                <div class="form-floating mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection