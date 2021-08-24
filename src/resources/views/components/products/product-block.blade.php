<div class="col-12 col-sm-8 col-md-6 col-lg-{{ $lg }} mb-30">
    <div class="card">
        <a href="/catalog/product/{{ $product->slug }}">
            <figure class="catalog-card-header"
                style="background-image: url('//i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk')"
                role="img" aria-label="[Texto para imagem]"></figure>
        </a>
        <div class="catalog-category">

        </div>
        <div class="card-body">
            <h4 class="card-title">{!! $product->name !!}</h4>

            <p class="card-text">{!! $product->description !!}</p>

            <a href="/catalog/product/{{ $product->slug }}" class="btn btn-outline-info btn-block"
                title="Ver - {{ $product->name }}">Produto</a>
        </div>
    </div>
</div>
