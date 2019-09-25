<table class="tbl striped">

  <thead>

    <tr>
      <th>ID</th>
      <th>Dish</th>
      <th class="w100 txt-ctr">Price</th>
      <th class="w200 txt-ctr">Actions</th>
    </tr>

  </thead>

  @foreach ($products as $product)

  <tr>

    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td class="txt-r">${{ number_format($product->price, 2) }}</td>
    <td class="txt-ctr">

      {{-- need to pass supplier id --}}
      <a href="{{ route('products.edit', $product->id) }}" class="btn-success sm">Edit</a>

      <form method="POST" class="dilb" action="{{ route('products.destroy', $product->id) }}">

        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <button type="submit" class="btn-danger sm" onclick="return confirm('Are you sure?')">Delete</button>

      </form>

    </td>

  </tr>

  @endforeach

</table>
