@extends(Config::get('marrs-catalog.template.admin'))

@section('title')
    <h1><i class="fas fa-tags"></i> | MARCAS </h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table form-table table-main data-table table-responsive-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250" class="text-center">
                            <a href="{{ route('admin.catalog.brands.create') }}" class="btn btn-success  btn-sm">Novo</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.catalog.brands.edit', ['brand' => $brand->id]) }}"
                                    class="btn btn-info btn-sm">Editar</a>
                                <a href="#" data-toggle="modal" data-target="#confirm-delete-{{ $brand->id }}"
                                    class="btn btn-danger  btn-sm">Excluir</a>
                                @push('modals')
                                    <form action="{{ route('admin.catalog.brands.destroy', ['brand' => $brand->id]) }}"
                                        method="post">
                                        <input type="hidden" name="_method" value="delete" />
                                        {!! csrf_field() !!}
                                        <div class="modal fade" id="confirm-delete-{{ $brand->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">Atenção</div>
                                                    <div class="modal-body">Deseja remover a departamento {{ $brand->name }} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Não</button>
                                                        <input
                                                            href="{{ route('admin.catalog.brands.destroy', ['brand' => $brand->id]) }}"
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
    </div>
@stop
