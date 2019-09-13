{{---------------------------------------------------------------------------
  Reusable checkbox component

  'field_for' => 'database_field',
  'title' => 'label and placeholder',
  'is_checked' => 'checked or null(default)',
  'value' => $value_for_database_field


  // simple inputs for 'new' items
  not checked
  @component('components.checkbox', [ 'field_for' => 'for', 'title' => 'title/label'])@endcomponent

  @component('components.checkbox', [ 'field_for' => 'for', 'title' => 'title/label', 'is_checked' => 'checked'])@endcomponent

  // input for 'existing' records
  @component('components.checkbox', [ 'field_for' => 'for', 'title' => 'title/label', 'value' => $])@endcomponent



---------------------------------------------------------------------------}}
<div class="frm-row">

  <label class="checkbox">
    <input type="checkbox" name="{{ $field_for }}" {{ $is_checked == 1 ? 'checked' : '' }}>
    {{-- <input type="checkbox" name="{{ $field_for }}" {{ $is_checked }}> --}}
    {{-- <input type="checkbox" name="{{ $field_for }}" {{ $is_checked ?? '' }}> --}}
    {{ $title }}
  </label>

</div>
