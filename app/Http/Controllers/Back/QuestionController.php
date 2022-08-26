<?php

namespace App\Http\Controllers\Back;

use App\Models\Question;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\QuestionForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class QuestionController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::last()->get();
        return view('back.questions.index', compact('questions'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Question, QuestionForm::class);

        return view('back.questions.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Question, QuestionForm::class);

       $form->redirectIfNotValid();

       Question::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.question.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
       return view('back.questions.show', compact('question'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $form = $this->getForm($question, QuestionForm::class);
        return view('back.questions.edit', compact('question','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $form = $this->getForm($question, QuestionForm::class);
        $form->redirectIfNotValid();
        $question->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.question.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.question.index');
    }


}
