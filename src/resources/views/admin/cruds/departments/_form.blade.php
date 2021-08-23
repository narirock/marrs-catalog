<div class="form-group">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', null, [
    'class' => 'form-control',
    'placeholder' => 'Nome',
    'onkeyup' => "setslug(this.value,
    'slug')",
]) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Descrição') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
</div>
<div class="row">
    <div class="col col-md-6">
        <div class="form-group">
            @if (@$department->image != '')
                <img src="/{{ $department->image }}" alt="" width="450" class="image-show"><br>
                <button type="button" class='btn btn-danger image-show'
                    onclick="$('#remove_image').val('true');$('.image-show').hide();"><i class='fa fa-trash'> Remover
                        imagem</i></button>
                {!! Form::hidden('remove_image', null, ['class' => 'form-control', 'id' => 'remove_image']) !!}<br>
            @endif
            {!! Form::label('image', 'Imagem') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col col-md-6">
        <div class="form-group">
            {!! Form::label('department_id', 'Departamento Pai') !!}
            {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => 'Nenhum']) !!}
        </div>
        <div class="row">
            <div class="col col-sm-4">
                <div class="form-group">
                    {!! Form::label('enable', 'Habilitado') !!}
                    {!! Form::select('enable', ['1' => 'Sim', '0' => 'Não'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col col-sm-4">
                <div class="form-group">
                    {!! Form::label('hasmenu', 'Mostrar no menu') !!}
                    {!! Form::select('hasmenu', ['1' => 'Sim', '0' => 'Não'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col col-sm-4">
                <div class="form-group">
                    {!! Form::label('listalls', 'Lista Geral') !!}
                    {!! Form::select('listalls', ['1' => 'Sim', '0' => 'Não'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>


    </div>

</div>


<div>
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.catalog.departments.index') }}" class="btn btn-danger">Fechar</a>
</div>
