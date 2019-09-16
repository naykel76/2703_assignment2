@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $title }}</h1>

  {{-- submit to student answers --}}
<form method="POST" action="/quiz/submit">

    @csrf

    {{-- question start --}}
    @foreach ($questions as $q)

    <div class="bx">

      <p><strong>Q. </strong>{{ $q->question}}</p>

      {{-- loop throught the question options and display --}}
      @foreach ($q->questionoptions as $o)
        <input type="radio" name="questions{{ $q->id }}" value="{{ $o->id }}" /> {{$o->question_option}} <br>
      @endforeach

    </div>

    @endforeach

    <input type="submit" value="Submit" class="btn-success">

  </form>

@endsection
