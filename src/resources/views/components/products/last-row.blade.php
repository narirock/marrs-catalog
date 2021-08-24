<div>
    <section class="ftco-section catalog-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Catalog / Notícias</span>
                    <h2>Confira nossas últimas productagens</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <!-- Card Catalog -->
                    <x-marrs-catalog-products-product-block :product="$product" />
                @endforeach
            </div>

        </div>
    </section>

</div>
