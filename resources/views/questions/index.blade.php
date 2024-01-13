@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <a href="questions/create" class="btn btn-primary">Create Question</a>

                <div class="card-header">Question List</div>
                <div class="card-body">
                    @if ($questions->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Options</th>
                                    <th>Quiz</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            <ul>
                                                <li>{{ $question->option1 }}</li>
                                                <li>{{ $question->option2 }}</li>
                                                <li>{{ $question->option3 }}</li>
                                                <li>{{ $question->option4 }}</li>
                                            </ul>
                                        </td>
                                        <td>{{ $question->quiz->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No questions available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
