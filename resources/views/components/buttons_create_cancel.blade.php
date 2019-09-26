{{---------------------------------------------------------------------------
  Reusable submit and cancel buttons for forms

  <form action="">

    @component('components.buttons_create_cancel', ['button_text' => 'optional'])@endcomponent

  </form>
---------------------------------------------------------------------------}}

<div class="frm-row">

  <button type="submit" class="btn-success">{{ $button_text ?? 'Create' }}</button> &nbsp;

  {{-- <a class="btn-danger" href="{{ URL::previous() }}">Cancel</a> &nbsp; --}}

</div>
