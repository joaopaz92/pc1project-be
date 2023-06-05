<?php
    $categories=\App\Models\Category::all();
    $trademarks=\App\Models\Trademark::all();
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
                                <select class="form-select form-select-lg form-floating mb-3" aria-label="Default select example" onchange="myFunction(this.value)">
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
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="selTrademark" class="col-form-label">Trademark</label> 
                            </div>
                            <div class="col-sm-9">
                                <select name="trademark" id="trademark-drop" class="form-select form-select-lg form-floating mb-3" aria-label="Default select example">
                                            <option selected="" value="#">Select one trademark</option>
                                            @foreach($trademarks as $trademark)
                                                <option value="{{$trademark->id}}">{{$trademark->name}}</option>
                                            @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="selTrademark" class="col-form-label">Model</label> 
                            </div>
                            <div class="col-sm-9">
                                <select name="model" id="model-drop" class="form-select form-select-lg form-floating mb-3" aria-label="Default select example">
                                    <option selected="" value="#">Select one model</option>
                                </select>
                            </div>
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#trademark-drop').on('change', function () {
                var idTrademark = this.value;
                var route = "{{ route('get-models', 'id') }}";
                route = route.replace('id', idTrademark);
                $.ajax({
                    url: route,
                    type:"GET",
                    success: function (data) {
                        $('#model-drop').empty().append($('<option>').val("#").text("Select one model"));
                        $.each(data, function( index, value ) {

                            console.log(data[index].id, data[index].name)
                            $('#model-drop').append($('<option>').val(data[index].id).text(data[index].name));
                            
                        });
                        
                        // $('#userList').html(data);
                    },
                    error:  function () {
                        $('#model-drop').empty().append($('<option>').val("#").text("Select one model"));
                    }
                })
                
            });
            
        });        
    </script>
@endsection

