<?php
    $categories=\App\Models\Category::all();
?>
@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center mx-0">  
        <h3 class="mb-4 mt-4 justify-content-center">Create Product</h3>
        <form action="{{route('product-add')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="floatingInput"
                            placeholder="Computer">
                            <label for="floatingInput">Name</label>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="inputCategory" class="col-form-label">Category</label> 
                            </div>
                            <div class="col-sm-10">
                                <select class="form-select form-select-lg form-floating mb-3" aria-label="Default select example">
                                            <option selected="">Select one category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                </select>
                            </div>
                        </div>                                   
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="form-floating mb-3">
                            <input name="trademark" type="text" class="form-control" id="floatingInput"
                            placeholder="Trademark">
                            <label for="floatingInput">Trademark</label>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="form-floating mb-3">
                            <input name="Models" type="text" class="form-control" id="floatingInput"
                            placeholder="Model">
                            <label for="floatingInput">Trademark</label>
                        </div>
                    </div>
                </div>

            <!-- 
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose a category picture</label>
                    <input class="form-control bg-dark" name="picture"  type="file" id="formFile">
                </div>
            </div>   -->
            <div class="col-sm-12 col-xl-3 justify-content mx-0">
                <div class="form-floating mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection