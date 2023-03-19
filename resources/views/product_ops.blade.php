@extends('layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">  
            <h3 class="mb-4 mt-4">Product Operations</h3>
            <div class="bg-secondary rounded h-100 p-4">
                <div class="m-n2">
                    <a href="/product/insert" class="mb-4 mt-4 btn btn-outline-info m-2">Add Product</a>
                    <a href="/products" class="mb-4 mt-4 btn btn-outline-info m-2">List all</a>
                </div>
            </div>
        </div>
    </div>
@endsection
