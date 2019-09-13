{{---------------------------------------------------------------------------

edit toolbar for forms

form="{{ $form_name }}" where $form_name is the id of the form. This is
used so laravel knows which form it is submitting.

-- usage --
@component('toolbar-edit', ['form_name' => 'form_id'])
insert toolbar partial here ...
@endcomponent

-- note --
cancel will only work if there is a previous url to go back to
---------------------------------------------------------------------------}}
<div class="toolbar mb">
  <button form="{{ $form_name }}" type="submit" class="btn-success">Create</button> &nbsp;
  <a class="btn-danger" href="{{ URL::previous() }}">Cancel</a> &nbsp;
</div>
