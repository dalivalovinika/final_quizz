@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Quizzes</h1>
        <a href="quizzes/create" class="btn btn-primary">Create Quiz</a>
        @foreach ($quizzes as $quiz)
            <div class="card mb-4 mt-4">
                
                <img src="{{ $quiz->main_photo }}" class="card-img-top" alt="{{ $quiz->name ?? "" }}" style="max-width: 300px">
                <div class="card-body">
                    <form method="POST" action="{{ action('App\Http\Controllers\QuizController@destroy', $quiz->id) }}">
                        
                        <input type="submit" value="Delete" class="btn btn-danger">
                        @method("DELETE")
                        @csrf
                    </form>

                    <h5 class="card-title">{{ $quiz->name ?? "" }}</h5>
                    <p class="card-text">{{ $quiz->description ?? "" }}</p>

                    @if ($quiz->published)
                        <p class="text-success">Published</p>
                    @else
                        <form action="{{ route('quizzes.publish', $quiz->id ?? 1) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    @endif

                    <form action="{{ route('quizzes.start', ['quiz' => $quiz->id ?? 1]) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success">Start Quiz</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
