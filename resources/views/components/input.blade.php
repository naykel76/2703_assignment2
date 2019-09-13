{{---------------------------------------------------------------------------
  Reusable input component

  $title, used for label and place holder
  $value is the input 'value' from DB or 'old' when using validation

  'field_for' => 'database_field',
  'title' => 'label and placeholder',
  'placeholder' => 'placeholder or title', // optional will default to title
  'value' => $value_for_database_field


  // simple inputs for 'new' items
  @component('components.input', [ 'field_for' => 'for', 'title' => 'title/label', 'placeholder' => 'optional',])@endcomponent

  // input for 'existing' records
  @component('components.input', [ 'field_for' => 'for', 'title' => 'title/label', 'placeholder' => 'placeholder/title', 'value' => $])@endcomponent

---------------------------------------------------------------------------}}

<div class="frm-row">

  <label for="{{ $field_for }}">{{ $title }}</label>
  <input name="{{ $field_for }}" type="{{ $type ?? 'text'}}" placeholder="{{ $placeholder ?? ''}}" class="{{ $errors->has( $field_for ) ? 'danger' : '' }}"
    value="{{ $value ?? old($field_for) }}" />

  @error($field_for)
  <span class="txt-red" role="alert"> {{ $message }} </span>
  @enderror
</div>


{{-- <div class="frm-row">

    <label for="{{ $field_for }}">{{ $title }}</label>
<input name="{{ $field_for }}" type="text" placeholder="{{ $placeholder ?? 'Enter ' . $title}}" class="{{ $errors->has( $field_for ) ? 'danger' : '' }}"
  value="{{ $value ?? old($field_for) }}" />

</div> --}}
