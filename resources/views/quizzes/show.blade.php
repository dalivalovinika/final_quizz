@extends('layouts.app')

@section('content')
    <h1>Quizzes</h1>
    @foreach ($quizzes as $quiz)
        <div>
            <h2>{{ $quiz->name }}</h2>
            <p>{{ $quiz->description }}</p>
            <img src="{{ $quiz->main_photo }}" alt="{{ $quiz->name }}">
            @if ($quiz->published)
                <p>Published</p>
            @else
                <form action="{{ route('quizzes.publish', $quiz) }}" method="POST">
                    @csrf
                    <button type="submit">Publish</button>
                </form>
            @endif
            <form action="{{ route('quizzes.show', ['quiz' => $quiz->id]) }}" method="GET">
                @csrf
                <button type="submit">Start Quiz</button>
            </form>
        </div>
    @endforeach
@endsection
