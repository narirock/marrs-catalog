<div class="col-12 col-sm-8 col-md-6 col-lg-{{ $lg }} mb-30">
    <div class="card">
        <a href="#">
            <figure class="catalog-card-header" style="background-image: url('/{{ $product->image }}')" role="img"
                aria-label="[Texto para imagem]"></figure>
        </a>
        <div class="catalog-category">
            <a href="/catalog/?category={{ @$product->category->id }}" class="btn btn-primary btn-sm"
                title="{{ @$product->category->name }}">{{ @$product->category->name }}</a>
        </div>
        <div class="card-body">
            <h4 class="card-title">{!! $product->title !!}</h4>
            <small class="text-muted cat">
                <i class="far fa-calendar text-info"></i>
                {{ Carbon\Carbon::create($product->publish)->format('d/m/Y') }}
                <i class="fas fa-users text-info"></i> {{ @$product->author->name }}
            </small>
            <p class="card-text">{!! $product->excerpt !!}</p>

            <a href="/catalog/product/{{ $product->slug }}" class="btn btn-outline-info btn-block"
                title="Ler - {{ $product->title }}">Ver
                matéria</a>
        </div>
    </div>
</div>
