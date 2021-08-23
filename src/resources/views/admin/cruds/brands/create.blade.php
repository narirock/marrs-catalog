@extends(Config::get('marrs-catalog.template.admin'))

@section('title')
    <h1><i class="fas fa-tags"></i> | MARCA </h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['url' => route('admin.catalog.brands.store'), 'files' => true]) !!}

            @include("marrs-catalog::admin.cruds.brands._form")

            {!! Form::close() !!}
        </div>
    </div>
@stop
