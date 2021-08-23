@extends(Config::get('marrs-catalog.template.admin'))

@section('title')
    <h1><i class="fas fa-tags"></i> | DEPARTAMENTOS </h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table form-table table-main data-table">
                <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Departamento Pai</th>
                        <th width="250" class="text-center">
                            <a href="{{ route('admin.catalog.departments.create') }}" class="btn btn-success  btn-sm">Novo</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ @$department->name }}</td>
                            @if ($department->department)
                                <td>{{ @$department->department['name'] }}</td>
                            @else
                                <td class="text-center"> - </td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('admin.catalog.departments.edit', ['department' => $department->id,]) }}"
                                    class="btn btn-info btn-sm">Editar</a>
                                <a href="#" data-toggle="modal" data-target="#confirm-delete-{{ $department->id }}"
                                    class="btn btn-danger  btn-sm">Excluir</a>
                                @push('modals')
                                    <form
                                        action="{{ route('admin.catalog.departments.destroy', ['department' => $department->id,]) }}"
                                        method="post">
                                        <input type="hidden" name="_method" value="delete" />
                                        {!! csrf_field() !!}
                                        <div class="modal fade" id="confirm-delete-{{ $department->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">Atenção</div>
                                                    <div class="modal-body">Deseja remover a departamento
                                                        {{ $department->name }} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Não</button>
                                                        <input
                                                            href="{{ route('admin.catalog.departments.destroy', ['department' => $department->id]) }}"
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
