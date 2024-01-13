<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();

        return view('quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        dd($quiz);
        $questions = $quiz->questions;

        return view('quizzes.show', compact('quiz', 'questions'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $user = Auth::user();
        if ($user->id == 1) {
            $published = true;
        }
        $quiz = new Quiz([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'main_photo' => $request->input('main_photo'),
            'author_id' => auth()->user()->id,
            'quiz_id' => $request->input('quiz_id') ?? 1,
            'published' => $published,
        ]);

        

        $quiz->save();

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully');
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $quiz->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'main_photo' => $request->input('main_photo'),
        ]);

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect("/quizzes");
    }

    public function publish(Quiz $quiz)
    {
        
        $quiz->published = true;
        $quiz->save();

        return redirect()->route('quizzes.index')->with('success', 'Quiz published successfully');
    }

    public function submit(Request $request, Quiz $quiz)
    { 
        $quiz = Quiz::find($request->quiz_id);
        $answers = $request->input('answers');
        $score = $this->calculateScore($quiz, $answers);
       
        return redirect()->route('quizzes.results', ['quiz' => $quiz->id, 'score' => $score]);
    }

    


    private function calculateScore(Quiz $quiz, array $answers)
    {
        $score = 0;
       
        foreach ($answers as $questionId => $selectedOption) {
            $question = $quiz->questions->firstWhere('id', $questionId);

            if ($question && $question->correct_answer == $selectedOption) {
                $score++;
                
            }
        }

        return $score;
    }
    public function start(Quiz $quiz)
    {
        $questions = $quiz->questions;

        return view('quizzes.start', compact('quiz', 'questions'));
    }

    public function results($quiz_id, $score)
    {
        $quiz = Quiz::find($quiz_id);
        $questions = $quiz->questions;
        return view('quizzes.results', compact('quiz', 'score', 'questions'));
    }

}
