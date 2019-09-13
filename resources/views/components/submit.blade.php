{{---------------------------------------------------------------------------
  Reusable submitt button


  // simple inputs for 'new' items
   @component('components.input')@endcomponent
    @component('components.input', [ 'text' => 'optional'])@endcomponent

  // input for 'existing' records
  @component('components.input', [ 'field_for' => 'for', 'title' => 'title/label', 'placeholder' => 'placeholder/title', 'value' => $])@endcomponent

---------------------------------------------------------------------------}}

<div class="frm-row">

  <button type="submit" class="btn-primary"> {{ $button_text }} </button>

</div>
