@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">List of Products</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Category</th>
                            <th scope="col">Trademark</th>
                            <th scope="col">Model</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->reference}}</td>
                            <td>{{\App\Models\Category::where('id', $product->category_id)->first()["name"]}}</td>
                            <td>{{\App\Models\Trademark::where('id', $product->trademark_id)->first()["name"]}}</td>
                            <td>{{\App\Models\TrademarkModel::where('id', $product->trademarkmodel_id)->first()["name"]}}</td>
                            <td>{{$product->stock}}</td>
                            <td>
                                <div class="m-n2">
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                        <a href="{{route('product.show', $product->id)}}" type="button" class="btn btn-square btn-warning m-2"><i class="fa fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-square btn-danger m-2" ><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection