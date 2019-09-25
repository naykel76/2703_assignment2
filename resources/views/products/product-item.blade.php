{{-- product grid item  --}}

<div class="product-item">

  <div class="txt-ctr">

    <img src="{{ asset('storage/' . $product->image ) }}" alt="{{ $product->image }}">

  </div>

  <div class="pxy">

    <h5>{{ $product->name}}</h5>

    <h5 class="price">$ {{ number_format($product->price, 2) }}</h5>

    <br>

  </div>

</div>
