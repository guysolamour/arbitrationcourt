<?php

namespace App\Http\Controllers\Back;

use App\Models\Refere;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\RefereForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class RefereController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referes = Refere::last()->get();
        return view('back.referes.index', compact('referes'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Refere, RefereForm::class);

        return view('back.referes.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Refere, RefereForm::class);

       $form->redirectIfNotValid();

       Refere::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.refere.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refere  $refere
     * @return \Illuminate\Http\Response
     */
    public function show(Refere $refere)
    {
       return view('back.referes.show', compact('refere'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refere  $refere
     * @return \Illuminate\Http\Response
     */
    public function edit(Refere $refere)
    {
        $form = $this->getForm($refere, RefereForm::class);
        return view('back.referes.edit', compact('refere','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refere  $refere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refere $refere)
    {
        $form = $this->getForm($refere, RefereForm::class);
        $form->redirectIfNotValid();
        $refere->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.refere.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refere  $refere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refere $refere)
    {
        $refere->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.refere.index');
    }


}
