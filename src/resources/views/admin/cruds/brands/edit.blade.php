@extends(Config::get('marrs-catalog.template.admin'))

@section('title')
    <h1><i class="fas fa-tags"></i> | DEPARTAMENTO </h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($brand, ['url' => route('admin.catalog.brands.update', ['brand' => $brand->id]), 'files' => true, 'method' => 'PUT']) !!}

            @include("marrs-catalog::admin.cruds.brands._form")

            {!! Form::close() !!}
        </div>
    </div>
@stop
