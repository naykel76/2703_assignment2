{{---------------------------------------------------------------------------

edit toolbar for forms

form="{{ $form_name }}" where $form_name is the id of the form. This is
used so laravel knows which form it is submitting.

-- usage --
@component('toolbar-edit', ['form_name' => 'form_id'])

@endcomponent

---------------------------------------------------------------------------}}
<div class="toolbar mb">
  <button form="{{ $form_name }}" type="submit" name="action" value="save_stay" class="btn-success">Save and Stay</button> &nbsp;
  <button form="{{ $form_name }}" type="submit" name="action" value="save_close" class="btn-primary">Save and Close</button> &nbsp;
  <a class="btn-danger" href="{{ URL::previous() }}">Cancel</a> &nbsp;
</div>
