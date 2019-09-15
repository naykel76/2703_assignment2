@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{$title}}</h1>

<table class="tbl striped">

  <thead>

    <tr>
      <th>ID</th>
      <th>User</th>
      <th>Email</th>
      <th>Role</th>
      <th class="w200 txt-ctr">Actions</th>
    </tr>

  </thead>

  @foreach ($users as $user)

  <tr>

    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray()) }}</td>
    <td class="txt-ctr">

      <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-success sm">Edit</a>

      <form method="POST" class="dilb" action="{{ route('admin.users.destroy', $user->id) }}">

        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <button type="submit" class="btn-danger sm" onclick="return confirm('Are you sure?')">Delete</button>

      </form>

    </td>

  </tr>

  @endforeach

</table>

@endsection
