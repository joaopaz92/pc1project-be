<?php
    $categories=\App\Models\Category::all();
?>
@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center mx-0">  
        <h3 class="mb-4 mt-4 justify-content-center">Create Trademark</h3>
        <form action="{{route('trademark-add')}}" method="post" enctype="multipart/form-data">
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
                        <div class="form-floating mb-3">
                            <input name="contact" type="text" class="form-control" id="floatingInput"
                            placeholder="Contact">
                            <label for="floatingInput">Contact</label>
                        </div>                                 
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