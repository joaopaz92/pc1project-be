@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">List of Models</h6>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Trademark</th>
                            <th scope="col">Model Name</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($models as $model)
                        <tr>
                            <th scope="row">{{$model->id}}</th>
                            <td>{{\App\Models\Trademark::where('id', $model->trademark_id)->first()["name"]}}</td>
                            <td>{{$model->name}}</td>
                            <td>
                                <div class="m-n2">
                                    <form action="{{ route('trademarkmodels.destroy',$model->id) }}" method="POST">
                                        <a href="{{route('trademarkmodel.show', $model->id)}}" type="button" class="btn btn-square btn-warning m-2"><i class="fa fa-edit"></i></a>
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