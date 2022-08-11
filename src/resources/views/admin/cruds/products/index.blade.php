@extends(Config::get('marrs-catalog.template.admin'))

@section('title')
<div style="width:100%!important">
    <h1><i class="fas fa-box"></i> | PRODUTOS</h1>
    <a href="/admin/store/xls/products" class="btn btn-primary" style="float:right"><i class="fas fa-file-csv"></i>
        Exportar</a>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <div class="row mb-2">
            <div class="col col-sm-12">
                {!! Form::open(['url' => route('admin.catalog.products.store'), 'files' => true, 'method'=>'GET',
                'class'=>'form-inline
                my-2 my-lg-0']) !!}
                <input class="form-control mr-sm-2" type="text" name="term" placeholder="Buscar" aria-label="Buscar">
                <input type="hidden" value="1" name="page">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                {!! Form::close() !!}
            </div>
        </div>

        <table class="table form-table table-main table-responsive-sm">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Produto</th>
                    <th>Modelo</th>
                    <th>Departamentos</th>
                    <th width="150" class="text-center">
                        <a href="{{ route('admin.catalog.products.create') }}" class="btn btn-success  btn-sm">Novo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('admin.catalog.products.edit', ['product' => $product->id]) }}">
                            <img src="/{{ @$product->images[0]->link }}" alt="" width='85'>
                        </a>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ @$product->model }}</td>
                    @if ($product->product)
                    <td>{{ $product->product['name'] }}</td>
                    @else
                    <td class="text-center" width='300'>
                        @foreach (@$product->departments as $departamento)
                        <span class="badge badge-secondary" style='margin:5px'>{{ @$departamento->department->name
                            }}</span>
                        @endforeach
                    </td>
                    @endif
                    <td class="text-center">
                        <a href="{{ route('admin.catalog.products.edit', ['product' => $product->id]) }}" title="editar"
                            class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <a href="/admin/catalog/products/copy/{{ $product->id }}" class="btn btn-dark"
                            title="duplicar"><i class="fas fa-clone"></i></a>
                        <a href="#" data-toggle="modal" data-target="#confirm-delete-{{ $product->id }}" title="excluir"
                            class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        @push('modals')
                        <form action="{{ route('admin.catalog.products.destroy', ['product' => $product->id]) }}"
                            method="DELETE">
                            <input type="hidden" name="_method" value="delete" />
                            {!! csrf_field() !!}
                            <div class="modal fade" id="confirm-delete-{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">Atenção</div>
                                        <div class="modal-body">Deseja remover o veículo {{ $product->name }} ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Não</button>
                                            <input
                                                href="{{ route('admin.catalog.products.destroy', ['product' => $product->id]) }}"
                                                class="btn btn-danger" type="submit" value="Sim" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endpush
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {{$products->links()}}
        </div>
    </div>
</div>
@stop
