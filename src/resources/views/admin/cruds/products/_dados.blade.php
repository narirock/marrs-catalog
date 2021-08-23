<div class="content-box">
    <div class="form-group">
        {!! Form::label('name', 'Nome do produto') !!} <i class="fas fa-question-circle" data-toggle="popover" title="Nome do produto"
            data-content="Nomeie seu produto de forma clara e explicativa."></i>
        {!! Form::text('name', null, [
    'class' => 'form-control',
    'placeholder' => 'Nome',
    'onkeyup' => "setslug(this.value,
        'slug')",
]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('slug', 'URL Amigavel (Slug)') !!}
        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
    </div>
</div>



<div class="content-box">
    <div class="form-group">
        {!! Form::label('description', 'Descrição curta do produto') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control textarea-description', 'placeholder' => 'Descrição', 'rows' => '15']) !!}
    </div>
</div>

<div class="content-box">
    <div class="form-group">
        {!! Form::label('full_description', 'Descrição Completa do produto') !!}
        {!! Form::textarea('full_description', null, ['class' => 'form-control textarea-description editor']) !!}
    </div>
</div>

<div class="content-box">
    <div class="form-group">
        {!! Form::label('key_words', 'Palavras chave (separar por virgula)') !!}
        {!! Form::text('key_words', null, ['class' => 'form-control', 'placeholder' => 'Palavras chave']) !!}
    </div>
</div>

<div class="content-box">
    <div class="row">
        {{-- <div class=" col-sm-12 col-md-3 col-xs-12">
            <div class="form-group">
                {!! Form::label('model', 'Modelo') !!}
                {!! Form::text('model', null, ['class'=>'form-control', 'placeholder'=>"Modelo",]) !!}
            </div>
        </div> --}}

        <div class=" col-sm-12 col-md-3 col-xs-12">
            <div class="form-group">
                {!! Form::label('enabled', 'Status') !!}
                {!! Form::select('status', [1 => 'Habilitado', 0 => 'Desabilitado'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class=" col-sm-12 col-md-2 col-xs-12">
            <div class="form-group">
                {!! Form::label('makeupdays', 'Dias / Confecção') !!}
                {!! Form::text('makeupdays', @$product->makeupdays ? $product->makeupdays : 0, ['class' => 'form-control', 'placeholder' => '']) !!}

            </div>
        </div>
        <div class=" col-sm-12 col-md-7 col-xs-12">
            <div class="form-group">
                {!! Form::label('tags', 'Tags') !!}
                {!! Form::text('tags', null, ['class' => 'form-control', 'placeholder' => 'Tags']) !!}
            </div>
        </div>
    </div>
</div>

<div class="content-box">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-xs-12">
            <div class="form-group">
                {!! Form::label('minimum', 'Quantidade Minima') !!}
                {!! Form::text('minimum', null, ['class' => 'form-control', 'placeholder' => 'Minimo']) !!}
            </div>
        </div>

        <div class="col-sm-12 col-md-3 col-xs-12">
            <div class="form-group">
                {!! Form::label('quantity', 'Quantidade Estoque') !!}
                {!! Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => 'Estoque']) !!}
            </div>
        </div>

        <div class="col-md-2 col-xs-12">
            <div class="form-group">
                {!! Form::label('subtract', 'Subtrair do Estoque?') !!}
                {!! Form::select('subtract', ['1' => 'Sim', '0' => 'Não'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-2 col-xs-12">
            <div class="form-group">
                {!! Form::label('show_if_out', 'Mostrar fora do estoque?') !!}
                {!! Form::select('show_if_out', ['0' => 'Não', '1' => 'Sim'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class=" col-md-2 col-xs-12">
            <div class="form-group">
                {!! Form::label('shipping', 'Item Enviado?') !!}
                {!! Form::select('shipping', ['1' => 'Sim', '0' => 'Não'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>


<div class="row">
    {{-- <div class=" col-md-6 col-xs-12">
        <div class="content-box">
            <h4><i class="fas fa-images"></i> Imagens do produto <sup><i class="fas fa-question-circle"
                        data-toggle="tooltip" data-placement="top"
                        title="Voce pode selecionar uma ou mais imagens para representar seu produto. Tamanhos recomendados (1080px por 1080px)"></i></sup>
            </h4>
            <hr>
            @include('tenant.general.images.uploadimages')
        </div>

    </div> --}}

    <div class=" col-md-6 col-xs-12">
        <div class="content-box">
            <h4><i class="fas fa-asterisk"></i> Especificação e preço</h4>
            <hr>
            <div class="row">
                <div class="col col-md-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('model', 'Modelo') !!}
                        {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Modelo']) !!}
                    </div>
                </div>
                <div class=" col-md-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('ano', 'Ano') !!}
                        {!! Form::text('ano', null, ['class' => 'form-control', 'placeholder' => 'Ano']) !!}
                    </div>
                </div>
                <div class=" col-md-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('brand_id', 'Marca') !!}
                        {!! Form::select('brand_id', $brands ?? [], null, ['class' => 'form-control', 'placeholder' => 'Marca']) !!}
                    </div>
                </div>
                <div class=" col-md-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('price', 'Preço (Valor do produto)') !!}
                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Preço']) !!}
                    </div>
                </div>


            </div>
        </div>

        <div class="content-box">
            <h4><i class="fas fa-ruler-combined"></i> Dimensões do produto <sup><i class="fas fa-question-circle"
                        data-toggle="tooltip" data-placement="top"
                        title="Lembre-se de colocar as dimensões de uma embalagem que caiba o seu produto. Esses dados são importantes para a precificação de seu frete"></i></sup>
            </h4>
            <div class="row">
                <div class=" col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('length', 'Comprimento') !!}
                        {!! Form::text('length', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class=" col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('width', 'Largura') !!}
                        {!! Form::text('width', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class=" col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('height', 'Altura') !!}
                        {!! Form::text('height', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('length_class_id', 'Tipo de Medida') !!}
                        {!! Form::select('length_class_id', ['0' => 'cm', '1' => 'mm'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class=" col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('weight', 'Peso') !!}
                        {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class=" col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('weigth_class_id', 'Tipo de Peso') !!}
                        {!! Form::select('weigth_class_id', ['0' => 'gr', '1' => 'kg'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    {{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalCorreios1">Verificar medidas dos Correios</a> --}}
                    <a href="/tenant/img/tips/correios.jpg" class="btn btn-primary chocolat-image" data-lity>Verificar
                        medidas dos Correios</a>
                </div>
            </div>
        </div>

    </div>

    {{-- @push('modals')
    <!-- Modal Correios -->
<div class="modal" id="modalCorreios1" tabindex="-1" role="dialog" aria-labelledby="modalCorreios" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tabela de dimensões e peso dos Correios</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endpush --}}

</div>
