<section id="tabs">
    <div class="row">


        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="col col-sm-12 alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="col col-sm-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill nav-products-create" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-basic" role="tab"
                        aria-controls="nav-home" aria-selected="true">Dados Basicos</a>
                    <a class="nav-item nav-link" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab"
                        aria-controls="nav-details" aria-selected="false">Detalhes</a>
                    <a class="nav-item nav-link" id="nav-relations-tab" data-toggle="tab" href="#nav-relations"
                        role="tab" aria-controls="nav-profile" aria-selected="false">Relações</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">Promoçoes</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab"
                        aria-controls="nav-about" aria-selected="false">Opções</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
                    @include('marrs-catalog::admin.cruds.products._dados')
                </div>
                <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                    <div class="content-box">
                        <h6><i class="fas fa-table"></i> Crie uma tabela com especificações técnicas de seus produtos.
                        </h6>
                    </div>
                    <details-component details="{{ @$details }}"></details-component>
                </div>

                <div class="tab-pane fade" id="nav-relations" role="tabpanel" aria-labelledby="nav-relations-tab">
                    <div class="content-box">
                        <h6><i class="fas fa-link"></i> Relacione seus produtos com departamentos e também com outros
                            produtos</h6>
                    </div>
                    @include('marrs-catalog::admin.cruds.products._relacoes')
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="content-box">
                        <h6><i class="fas fa-percent"></i> Crie campanhas promocionais e configure uma data para início
                            e témino.</h6>
                    </div>
                    @include('marrs-catalog::admin.cruds.products._promocoes')
                </div>
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    <div class="content-box">
                        <h6><i class="far fa-list-alt"></i> Configure opções para seus produtos caso houver. </h6>
                    </div>
                    @include('marrs-catalog::admin.cruds.products._details')
                </div>
            </div>

        </div>
    </div>

</section>

<div>
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.catalog.products.index') }}" class="btn btn-danger">Fechar</a>
</div>


@push('vue')
    <script src="{{ asset('/vendor/marrs-catalog/vue/app.js') }}" defer></script>
@endpush
