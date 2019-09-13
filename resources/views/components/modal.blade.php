{{---------------------------------------------------------------------------
  Reusable modal component

  <a href="#myModal">Open Modal</a><br>

  <a href="#">Close Modal</a>

  @component('components.modal', ['modalId' => 'myModal', 'modal_title' => 'Test Modal'])
  content goes here
  @endcomponent

---------------------------------------------------------------------------}}


<div id="{{ $modalId }}" class="modal">

  <a href="#" class="cancel"></a>

  <div class="modal-content">

    <div class="modal-header">

      <div class="modal-title">{{ $modal_title}}</div>

      <a href="#" class="close"><svg class="icon-close">
          <use xlink:href="/svg/icons.svg#icon-close"></use>
        </svg></a>

    </div>

    {{ $slot }}

  </div>

</div>
