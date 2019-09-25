@if (Session::has('cart'))

<ul class="lst">

  @foreach (Session::get('cart')->items as $product)

  <li>

    <h6>{{$product['item']['name']}}</h6>

    <span>${{number_format($product['item']['price'], 2)}} ea</span>

    <br>

    <div class="my">

      <a href="{{ route('products.reduce', $product['item']['id']) }}">

        <svg class="icon-minus">

          <use xlink:href="/svg/icons.svg#icon-minus-circle"></use>

        </svg>

      </a>

      <input type="text" value="{{$product['qty']}}" style="width: 50px;" class="txt-ctr mx" disabled>

      <a href="{{ route('products.increase', $product['item']['id']) }}">

        <svg class="icon-plus mr-lg">

          <use xlink:href="/svg/icons.svg#icon-plus-circle"></use>

        </svg>

      </a>

    </div>

    <a href="{{ route('products.remove', $product['item']['id']) }}" class="blk txt-red ml-lg">

      Remove Item

    </a>

    <hr>

    @endforeach

    <strong>Total Items:</strong> {{ Session('cart')->totalQty }} <br>

    <h5>Total Price: ${{ number_format(Session('cart')->totalPrice, 2) }}</h5>

    <br>

    <form id="checkout-form" method="POST" action="{{ route('orders.store') }}">

      @csrf

      <input type="submit" class="btn-primary" value="Checkout">

    </form>

</ul>

@else

No Items in Cart

@endif
