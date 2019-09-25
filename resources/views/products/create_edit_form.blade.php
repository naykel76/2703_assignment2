@if ($form_type == 'create') {{-- create form  --}}

<form id="create_product" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

  @csrf

  @component('components.input', [ 'field_for' => 'name', 'title' => 'Product Name'])@endcomponent

  @component('components.input', [ 'field_for' => 'price', 'title' => 'Price'])@endcomponent

  @component('components.input', [ 'field_for' => 'image', 'title' => 'Image', 'type' => 'file'])@endcomponent

  @component('components.buttons_create_cancel', ['button_text' => 'Add Dish to Menu'])@endcomponent

</form>

@else {{-- update form  --}}

<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">

  @csrf

  @method('PATCH')

  @component('components.input', [ 'field_for' => 'name', 'title' => 'Name', 'value' => $product->name])@endcomponent

  @component('components.input', [ 'field_for' => 'price', 'title' => 'Price', 'value' => $product->price])@endcomponent

  @component('components.input', [ 'field_for' => 'image', 'title' => 'Image (Optional)', 'type' => 'file'])@endcomponent

  @if ($product->image)

  <div class="frm-row w200">

    <img src="{{ asset('storage/' . $product->image ) }}" alt="{{ $product->image }}">

  </div>

  @endif

  @component('components.buttons_create_cancel', ['button_text' => 'Update Dish'])@endcomponent


</form>

@endif
