<?php

namespace App\Http\Controllers;


use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $quizzes = Quiz::all();

        return view('questions.index', compact('questions', 'quizzes'));
    }

    public function create(Quiz $quiz)
    {   
        $questions = Question::all();
        $quizzes = Quiz::all();
        return view('questions.create', compact('questions', 'quizzes'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        
        $question = new Question([
            'question' => $request->input('question'),
            'photo' => $request->input('photo'),
            'option1' => $request->input('option1'),
            'option2' => $request->input('option2'),
            'option3' => $request->input('option3'),
            'option4' => $request->input('option4'),
            'correct_answer' => $request->input('correct_answer'),
            'quiz_id' => $request->quiz_id,
        ]);

        $question->save();

        return redirect("/questions");
    }

    public function edit(Quiz $quiz, Question $question)
    {
        return view('questions.edit', compact('quiz', 'question'));
    }

    public function update(Request $request, Quiz $quiz, Question $question)
    {
       

        $question->update([
            'question' => $request->input('question'),
            'photo' => $request->input('photo'),
            'option1' => $request->input('option1'),
            'option2' => $request->input('option2'),
            'option3' => $request->input('option3'),
            'option4' => $request->input('option4'),
            'correct_answer' => $request->input('correct_answer'),
        ]);

        return redirect()->route('quizzes.show', $quiz)->with('success', 'Question updated successfully');
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();

        return redirect()->route('quizzes.show', $quiz)->with('success', 'Question deleted successfully');
    }
}