<div class="dd txt-l">

  <div class="btn-secondary">

    <svg class="icon-cart">

      <use xlink:href="/svg/icons.svg#icon-cart"></use>

    </svg>

    @if (Session::has('cart'))

    <span class="ml">{{ Session('cart')->totalQty }}</span>

    @endif

  </div>

  <div class="dd-content" style="right: 0;">

    @include('orders.cart_module')

  </div>

</div>
