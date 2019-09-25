@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{$title}}</h1>

@if (empty($suppliers))
<p>There are no suppliers to approve</p>

@else


@endif

@if (!empty($suppliers))


<table class="tbl striped">

  <thead>

    <tr>
      <th>ID</th>
      <th>Supplier</th>
      <th class="w200 txt-ctr">Actions</th>
    </tr>

  </thead>

  @foreach ($suppliers as $supplier)

  <tr>

    <td>{{ $supplier->id }}</td>
    <td>{{ $supplier->user->name }}</td>
    <td class="txt-ctr">


      <form method="POST" class="dilb" action="{{ route('admin.approve-supplier') }}">
        {{-- <form method="POST" class="dilb" action="{{ route('admin.approve', $supplier->id) }}"> --}}

        @csrf

        @method('PATCH')

        <input type="text" name="supplier_id" value="{{ $supplier->id }}" hidden>

        <button type="submit" class="btn-primary sm" onclick="return confirm('Are you sure?')">Approve</button>

      </form>

    </td>

  </tr>

  @endforeach

</table>

@else

<p>There are no suppliers to approve</p>

@endif

@endsection
