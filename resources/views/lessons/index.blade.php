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
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Trabalho</th>
                            <th>Reformado</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscricoes as $inscricao)
                        <tr>
                            <td>{{ $inscricao->id }}</td>
                            <td>{{ $inscricao->nome }}</td>
                            <td>{{ $inscricao->idade }}</td>
                            <td>{{ $inscricao->trabalho }}</td>
                            <td>{{ $inscricao->reformado == true ? 'Sim' : 'Não' }}</td>
                            <td>{{ $inscricao->email }}</td>
                            <td>{{ $inscricao->aceita == "1" ? 'Aceite' : 'A aguardar aprovação' }}</td>
                            <td>
                                @if ($inscricao->aceita != "1" ) 
                                <div class="m-n2">
                                    <form action="{{ route('lesson-approve', $inscricao->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-square btn-success m-2"><i class="fa fa-check"></i></a>
                                    </form>
                                </div>
                                @endif
                                <div class="m-n2">
                                    <form action="{{ route('lessons.destroy',$inscricao->id) }}" method="POST">
                                        <a href="{{route('lesson.show', $inscricao->id)}}" type="button" class="btn btn-square btn-warning m-2"><i class="fa fa-edit"></i></a>
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