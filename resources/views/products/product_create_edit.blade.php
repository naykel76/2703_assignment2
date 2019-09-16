@if ($form_type == 'create')
<form id="create_product" method="POST" action="{{ route('products.store') }}">

  @csrf

  <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>

  @component('components.input', [ 'field_for' => 'name', 'title' => 'Product Name'])@endcomponent

  @component('components.input', [ 'field_for' => 'price', 'title' => 'Price'])@endcomponent

  @component('components.input', [ 'field_for' => 'image', 'title' => 'Image'])@endcomponent

  @component('components.buttons_create_cancel', ['button_text' => 'Add Dish to Menu'])@endcomponent


</form>

@else

<form method="POST" action="{{ route('products.update', $product->id) }}">

  @csrf
  @method('PATCH')

  @component('components.input', [ 'field_for' => 'name', 'title' => 'Name', 'value' => $product->name])@endcomponent

  @component('components.input', [ 'field_for' => 'price', 'title' => 'Price', 'value' => $product->price])@endcomponent

  @component('components.input', [ 'field_for' => 'image', 'title' => 'Image', 'value' => $product->image])@endcomponent

  @component('components.buttons_create_cancel', ['button_text' => 'Update Dish'])@endcomponent

</form>

@endif