<div class="content-box">
    <div class="form-group">
        {!! Form::label('description', 'Nome da marca') !!}
        {!! Form::text('description', null, [
    'class' => 'form-control',
    'placeholder' => 'Digite um nome para esta marca',
    'onkeyup' => "setslug(this.value,
        'slug')",
]) !!}
    </div>
</div>



<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="content-box">
            <h4><i class="far fa-copyright"></i> Logotipo da marca</h4>
            <hr>
            <div class="content-inner">

                <div class="form-group">
                    @if (@$brand && @$brand->image)
                        <img src="/{{ $brand->image->link }}" alt="" width="450" class="image-show">
                        <button type="button" title="Remover imagem" class='btn btn-danger image-show'
                            onclick="$('#remove_image').val('true');$('.image-show').hide();"><i
                                class='fa fa-trash'></i></button>
                        {!! Form::hidden('remove_image', null, ['class' => 'form-control', 'id' => 'remove_image']) !!}<br>
                        <hr />
                    @endif
                    {!! Form::label('file', 'Imagem') !!}
                    {!! Form::file('file', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

    </div>



    <div class="col-md-6 col-sm-12">
        <div class="content-box">

            <div class="form-group">
                {!! Form::label('enable', 'Habilitado') !!}
                {!! Form::select('enable', ['1' => 'Sim', '0' => 'Não'], null, ['class' => 'form-control']) !!}
            </div>
        </div>


    </div>

</div>

<div>
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.catalog.brands.index') }}" class="btn btn-danger">Fechar</a>
</div>
