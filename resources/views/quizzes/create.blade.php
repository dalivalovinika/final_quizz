<!-- resources/views/quizzes/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Quiz</div>
                <div class="card-body">
                    <form action="{{ route('quizzes.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Quiz Name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="main_photo">Main Photo URL:</label>
                            <input type="text" class="form-control" name="main_photo" >
                        </div>

                        <button type="submit" class="btn btn-primary">Create Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection