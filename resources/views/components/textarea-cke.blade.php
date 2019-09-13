{{---------------------------------------------------------------------------
  Reusable Component for 'body' input for create and edit forms

  $title, used for label and place holder
  $value is the input 'value' from DB or 'old' when using validation

  // Create only requires title/label
  @component('components.textarea-cke', ['title' => 'TitleLabel'])@endcomponent

  // edit requires the value
  @component('components.textarea-cke', ['title' => 'TitleLabel','value' => $db->body])@endcomponent

---------------------------------------------------------------------------}}



<div class="frm-row">

  <textarea id="article-ckeditor" name="body" class="col {{ $errors->has('body') ? 'danger' : '' }}">{{ $value ?? old('body') }}</textarea>

</div>
