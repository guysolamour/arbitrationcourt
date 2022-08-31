<?php

namespace App\Http\Controllers\Back;

use App\Models\Request as RequestModel;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\RequestForm;
use App\Mail\AcceptedRequestApplicantMail;
use App\Mail\AcceptedRequestDefenderMail;
use App\Mail\ApplicantRefereMeetingMail;
use App\Mail\DefenderRefereMeetingMail;
use App\Mail\RejectRequestApplicantMail;
use App\Mail\RejectRequestDefenderMail;
use App\Models\Refere;
use Guysolamour\Administrable\Traits\FormBuilderTrait;
use Illuminate\Support\Facades\Mail;

class RequestController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestModel::last()->get();
        return view('back.requests.index', compact('requests'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new RequestModel, RequestForm::class);

        return view('back.requests.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new RequestModel, RequestForm::class);

       $form->redirectIfNotValid();

       RequestModel::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.request.index');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $request = RequestModel::findByUuid($id);
       return view('back.requests.show', compact('request'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $request = RequestModel::findByUuid($id);
        $form = $this->getForm($request, RequestForm::class);
        return view('back.requests.edit', compact('request','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $requestModel = RequestModel::findByUuid($id);
        $form = $this->getForm($requestModel, RequestForm::class);
        $form->redirectIfNotValid();
        $requestModel->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.request.index');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $requestModel = RequestModel::findByUuid($id);
        $requestModel->delete();

        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.request.index');
    }


    public function confirm(Request $request, $id)
    {
        $requestModel = RequestModel::findByUuid($id);
        $requestModel->setCustomField('accepted_reason', $request->input('accepted_reason'));
        $requestModel->confirm();
        // send email to applicant
        Mail::to($requestModel->applicant->email)->send(new AcceptedRequestApplicantMail($requestModel));
        // send email to defender
        Mail::to($requestModel->defender_user->email)->send(new AcceptedRequestDefenderMail($requestModel));

        flashy("La requete a bien ete approuvée");

        return to_route('back.request.show', $requestModel);
    }

    public function reject(Request $request, $id)
    {
        $requestModel = RequestModel::findByUuid($id);
        $requestModel->setCustomField('rejected_reason', $request->input('rejected_reason'));
        $requestModel->reject();
        // send email to applicant
        Mail::to($requestModel->applicant->email)->send(new RejectRequestApplicantMail($requestModel));
        // send email to defender
        Mail::to($requestModel->defender_user->email)->send(new RejectRequestDefenderMail($requestModel));

        flashy("La requete a bien ete rejetée");

        return to_route('back.request.show', $requestModel);
    }

    public function refere($id)
    {
        $request = RequestModel::findByUuid($id);
        $referes = Refere::get();


        return view('back.requests.refere', compact('request','referes'));
    }


    public function storeRefere(Request $request, $id)
    {
        $requestModel = RequestModel::findByUuid($id);

        $requestModel->setCustomField('meeting_link', $request->input('meeting_link'));
        $requestModel->setCustomField('meeting_description', $request->input('meeting_description'));
        $requestModel->attachReferes($request->input('referes'))->save();

        // send email to applicant
        Mail::to($requestModel->applicant->email)->send(new ApplicantRefereMeetingMail($requestModel));
        // send email to defender
        Mail::to($requestModel->defender_user->email)->send(new DefenderRefereMeetingMail($requestModel));


        flashy("Les arbitres ont bien été ajoutés");

        return to_route('back.request.show', $requestModel);
    }


}
