@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Quiz Results</h1>
    {{-- @dd($quiz); --}}
    <div class="text-center">
        <p class="lead">Your score for "{{ $quiz->name }}" is: <strong>{{ $score }}/{{ $questions->count() }}</strong></p>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('quizzes.index') }}" class="btn btn-primary">Back to Quizzes</a>
    </div>
</div>
@endsection