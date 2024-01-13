
@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Question</div>
                <div class="card-body">
                    <form action="{{ route('questions.store', $quiz ?? 1) }}" method="POST">
                        @csrf
                        <div class="form-group">

                        <label for="question">Quiz:</label>
                        <select name="quiz_id" class="form-control" id="quiz_id">
                            @foreach ($quizzes as $quiz)
                            <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>

                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" class="form-control" name="question" required>
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo URL:</label>
                            <input type="text" class="form-control" name="photo" >
                        </div>

                        <div class="form-group">
                            <label for="option1">Option 1:</label>
                            <input type="text" class="form-control" name="option1" required>
                        </div>

                        <div class="form-group">
                            <label for="option2">Option 2:</label>
                            <input type="text" class="form-control" name="option2" required>
                        </div>

                        <div class="form-group">
                            <label for="option3">Option 3:</label>
                            <input type="text" class="form-control" name="option3" required>
                        </div>

                        <div class="form-group">
                            <label for="option4">Option 4:</label>
                            <input type="text" class="form-control" name="option4" required>
                        </div>

                        <div class="form-group">
                            <label for="correct_answer">Correct Answer:</label>
                            <input type="text" class="form-control" name="correct_answer" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection