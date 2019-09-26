<div class="pxy primary">

  <div class="container">

    <a class="btn-primary mr" href="{{ route('dashboard') }}">Dashboard</a>

    <a class="btn-primary mr" href="{{ route('supplier.orders') }}">Orders History</a>

    <a class="btn-primary mr" href="/restaurants/{{ Auth::id() }}/products" target="_blank">Display Menu</a>

    <a class="btn-primary mr" href="{{ route('supplier.sales-history') }}">Sales Reports</a>

    <a href="{{ route('products.create') }}" class="btn-success">Add New Dish</a>

  </div>

</div>
