<div class="row">
    <div class="col col-sm-12">
        <table class='table table-straped table-bordered form-table table-main' id="departmentsTable"
            data-show="department">
            <thead>
                <tr>
                    <th>Departamentos</th>
                    <th class='text-center'>
                        <a href="javascript:;" onclick="grid_create('departments')" class="btn btn-primary"><i
                                class="fas fa-plus"></i></a>
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        {!! Form::textarea('departmentsData', null, ['id' => 'departmentsData', 'class' => 'form-control gridTorres', 'style' => 'visibility:collapse']) !!}

        @push('modals')
            <!-- Modal -->
            <div class="modal fade" id="departmentsModal" tabindex="-1" role="dialog"
                aria-labelledby="departmentsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="departmentsModalLabel">Departamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::hidden('departments_id', null, ['placeholder' => 'id', 'class' => 'form-control']) !!}
                            <div class="row">
                                <div class="col col-sm-12">
                                    {!! Form::label('department', 'Departamento ', ['class' => 'control-label']) !!}
                                    {!! Form::select('department', $listdepartments ?? [], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary" id="departmentsAction">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endpush
    </div>
</div>
