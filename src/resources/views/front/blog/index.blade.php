@extends(Config::get('marrs-catalog.template.front'))

@section('seo')

    <!-- Primary Meta Tags -->
    <title>{{ Config::get('marrs-catalog.name') }}</title>
    <meta name="title" content="{{ Config::get('marrs-catalog.name') }}">
    <meta name="description" content="{{ Config::get('marrs-catalog.description') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}/">
    <meta property="og:title" content="{{ Config::get('marrs-catalog.name') }}">
    <meta property="og:description" content="{{ Config::get('marrs-catalog.description') }}">
    <meta property="og:image" content="{{ Config::get('marrs-catalog.seo_image') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}/">
    <meta property="twitter:title" content="{{ Config::get('marrs-catalog.name') }}">
    <meta property="twitter:description" content="{{ Config::get('marrs-catalog.description') }}">
    <meta property="twitter:image" content="{{ Config::get('marrs-catalog.seo_image') }}">
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ env('APP_URL') }}/catalog" />
@endsection
@section('content')
    <section class="main-header catalog-header"
        style="background:linear-gradient(0deg,rgba(12, 78, 170, 0.589),rgba(20, 167, 212, 0.205)),url('/site/images/bg_main.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <h1 class="mb-3 bread text-white">Bem-vindo ao nosso Catalog</h1>
                    <p class="breadcrumbs text-white">Confira todas as notícias e informações sobre nós.</p>
                </div>
            </div>
        </div>
    </section>

    @include('marrs-catalog::front.catalog.components.search')

    <section class="catalog-section ">
        <div class="container">
            <div class="courses-box">
                <div class="row">

                    <div class="col-lg-8 col-md-8 col-sm-12">
                        @if (count($products) > 0)
                            <div class="row">
                                @foreach ($products as $product)
                                    <x-marrs-catalog-products-product-block :product="$product" :lg='6' />
                                @endforeach
                            </div>

                            {{ $products->appends(request()->query())->render('marrs-catalog::front.catalog.components.paginator') }}
                        @else
                            <div class="alert alert-info text-center"> Nenhuma matéria encontrada para a pesquisa</div>
                        @endif

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <x-marrs-catalog-categories-widget />
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection
