<!-- if we have any errors -->
@if ($errors->any())

<div class="bx danger">

  <ul>

    <!-- for each errors as error give me all of them -->
    @foreach ($errors->all() as $error)

    <!-- display the error -->
    <li>{{ $error }}</li>

    @endforeach

  </ul>

</div>

@endif
