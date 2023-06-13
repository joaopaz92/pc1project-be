<?php
    $categories=\App\Models\Category::all();
    $trademarks=\App\Models\Trademark::all();
    $trademarkmodels=\App\Models\TrademarkModel::all();
?>
@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center mx-0">  
        <h3 class="mb-4 mt-4 justify-content-center">Show/Edit - {{$product->name}}</h3>
        <form action="{{route('product-update', $product->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-7">
                <div class="row">
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="form-floating mb-3">
                            <input name="reference" type="text" class="form-control" id="floatingInputRef" placeholder="Reference" value="{{$product->reference}}" readonly>
                            <label for="floatingInputRef">Reference</label>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="inputCategory" class="col-form-label">Category</label> 
                            </div>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-select form-select-lg form-floating mb-3" aria-label="Default select example" onchange="myFunction(this.value)">
                                            <option selected="">Select one category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{ ( $product->category_id == $category->id) ? 'selected' : '' }}> {{$category->name}} </option>
                                            @endforeach
                                </select>
                            </div>
                        </div>                                   
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="floatingInput" placeholder="Name" value="{{$product->name}}">
                            <label for="floatingInput">Name</label>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="selTrademark" class="col-form-label">Trademark</label> 
                            </div>
                            <div class="col-sm-9">
                                <select name="trademark_id" id="trademark-drop" class="form-select form-select-lg form-floating mb-3" aria-label="Default select example">
                                            <option value="0">Select one trademark</option>
                                            @foreach($trademarks as $trademark)
                                                <option value="{{$trademark->id}}"{{ ( $product->trademark_id == $trademark->id) ? 'selected' : '' }}> {{$trademark->name}} </option>
                                            @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="selTrademark" class="col-form-label">Model</label> 
                            </div>
                            <div class="col-sm-10">
                                <select name="trademarkmodel_id" id="model-drop" class="form-select form-select-lg form-floating mb-3" aria-label="Default select example">
                                    <option selected="" value="0">Select one model</option>
                                    <option selected="" value="{{$product->trademarkmodel_id}}">{{ \App\Models\TrademarkModel::where('id', $product->trademarkmodel_id)->first()["name"] }}</option>
                                </select>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="form-floating mb-3">
                            <input name="price" type="text" class="form-control" id="floatingInput"
                            placeholder="Price" value="{{$product->price}}">
                            <label for="floatingInput">Price</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="form-floating mb-3">
                            <input name="stock" type="text" class="form-control" id="floatingInput"
                            placeholder="Stock" value="{{$product->stock}}">
                            <label for="floatingInput">Stock</label>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4 justify-content mx-0">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload a product picture</label>
                            <input class="form-control bg-dark" name="picture"  type="file" id="formFile">
                        </div>
                    </div> 
                </div>

            </div>
            <div class="col-3">
                <img class="img-fluid mb-4" src="{{$product->product_pict_url}}" style="width: 200px; height: 200px;">
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