<div class="row">
    <div class="col col-sm-12">
        <table class='table table-straped table-bordered form-table table-main' id="relatedsTable" data-show="related">
            <thead>
                <tr>
                    <th>Relacionados</th>
                    <th class='text-center'>
                        <a href="javascript:;" onclick="grid_create('relateds')" class="btn btn-primary"><i
                                class="fas fa-plus"></i></a>
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        {!! Form::textarea('relatedsData', null, ['id' => 'relatedsData', 'class' => 'form-control gridTorres', 'style' => 'visibility:collapse']) !!}

        @push('modals')
            <!-- Modal -->
            <div class="modal fade" id="relatedsModal" tabindex="-1" role="dialog" aria-labelledby="relatedsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="relatedsModalLabel">Departamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::hidden('relateds_id', null, ['placeholder' => 'id', 'class' => 'form-control']) !!}
                            <div class="row">
                                <div class="col col-sm-12">
                                    {!! Form::label('related', 'Departamento ', ['class' => 'control-label']) !!}
                                    {!! Form::select('related', $productslist ?? [], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary" id="relatedsAction">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endpush
    </div>
</div>
