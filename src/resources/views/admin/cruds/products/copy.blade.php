@extends(Config::get('marrs-catalog.template.admin'))

@section('title')
    <h1><i class="fas fa-box"></i> | PRODUTO</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($product, ['url' => route('admin.catalog.products.store'), 'files' => true]) !!}

            @include("marrs-catalog::admin.cruds.products._form")

            {!! Form::close() !!}
        </div>
    </div>
@stop
