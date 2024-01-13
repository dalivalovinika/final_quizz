@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1 class="mt-4">{{ $quiz->name }}</h1>
        <p>{{ $quiz->description }}</p>

        <img src="{{ $quiz->main_photo }}" alt="{{ $quiz->name }}" class="img-fluid rounded mb-4 " style="max-width: 300px;">
    </div>
    @if ($questions->count() > 0)
        <form action="{{ route('quizzes.submit', $quiz) }}" method="POST">
            @csrf

            @foreach ($questions as $question)
                <div class="card my-4">
                    <div class="card-body ">
                        <h3 class="card-title text-center">{{ $question->question }}</h3>

                        @if ($question->photo)
                            <img src="{{ $question->photo }}" alt="{{ $question->question }}" class="img-fluid rounded mb-3 " style="max-width: 150px;">
                        @endif

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]" value="1" required>
                            <label class="form-check-label">{{ $question->option1 }}</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]" value="2" required>
                            <label class="form-check-label">{{ $question->option2 }}</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]" value="3" required>
                            <label class="form-check-label">{{ $question->option3 }}</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]" value="4" required>
                            <label class="form-check-label">{{ $question->option4 }}</label>
                        </div>
                       

                    </div>
                    <input type="hidden" class="form-check-input" name="quiz_id" value="{{ $quiz->id }}" required>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>
    @else
        <p class="alert alert-warning mt-4">No questions available for this quiz.</p>
    @endif
</div>
@endsection
