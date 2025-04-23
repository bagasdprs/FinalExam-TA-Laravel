<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionScores;

class QuestionScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Question Scores';
        $quest = QuestionScores::all();
        return view('questionscores.index', compact('quest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questionscores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max::255',
            'category' => 'nullable|string|max:100',
            'score' => 'required|numeric|min:0.1',
        ]);

        QuestionScores::create($request->all());
        return redirect()->route('questionscores.index')->with('success', 'Question Added Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = QuestionScores::findOrFail($id);
        return view('questionscores.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'score' => 'required|numeric|min:0.01|max:10',
        ]);

        $question = QuestionScores::findOrFail($id);
        $question->update($request->only('question', 'kategori', 'score'));

        return redirect()->route('questionscores.index')->with('success', 'Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = QuestionScores::findOrFail($id);
        $question->delete();

        return redirect()->route('questionscores.index')->with('success', 'Question deleted');
    }
}
