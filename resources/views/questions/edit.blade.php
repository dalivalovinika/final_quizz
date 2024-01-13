<!-- resources/views/questions/edit.blade.php -->
@extends('layouts.app')

@section('content')
<form action="{{ route('questions.update', [$quiz, $question]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="question">Question:</label>
    <input type="text" name="question" value="{{ $question->question }}" required>

    <label for="photo">Photo URL:</label>
    <input type="text" name="photo" value="{{ $question->photo }}" >

    <!-- Repeat similar fields for options and correct_answer -->

    <button type="submit">Update Question</button>
</form>
@endsection 