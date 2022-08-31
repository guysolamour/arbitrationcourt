<?php

namespace App\Http\Controllers\Front\Dashboard;

use Illuminate\Http\Request;
use App\Forms\Front\RequestForm;
use App\Mail\RequestCreatedMail;
use App\Models\Refere;
use App\Models\Request as RequestModel;
use Guysolamour\Administrable\Traits\FormBuilderTrait;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Mail;

class RequestController extends BaseController
{
    use FormBuilderTrait;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requests = get_user()->applicants;
        return view('front.dashboard.requests.index', compact('requests'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function defense()
    {
        $defenses = get_user()->defenders;
        return view('front.dashboard.requests.defenses', compact('defenses'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function refere()
    {
        $referes = Refere::last()->get();
        return view('front.dashboard.requests.referes', compact('referes'));
    }

    public function create()
    {
        $form = $this->getForm(new RequestModel, RequestForm::class);
        return view('front.dashboard.requests.create', compact('form'));
    }

    public function store(Request $request)
    {
        $form = $this->getForm(new RequestModel, RequestForm::class);
        $form->redirectIfNotValid();

        /**
         * @var \App\Models\Request
         */
        $model = get_user()->applicants()->create($request->all());

        // if ($request->input('online'))

        if ($model->online == 1 ){
            // mettre le state à progress
            $model->update(['status' => 'progress']);
            Mail::to($model->defender_email)->send(new RequestCreatedMail($model));
            // send email to the defender

        }

        flashy("Votre requete a bien été enregistrée");

        return to_route('front.dashboard.request.index');
    }

    public function show( $id)
    {
        $request = RequestModel::findByUuid($id);

        // dd($request->getAttachedFiles()->map(fn($file) => $file->getUrl())->toArray());

        return view('front.dashboard.requests.show', compact('request'));
    }

    public function edit( $id)
    {
        // dd($id);
        $request = RequestModel::findByUuid($id);
        // dd($request);
        $form = $this->getForm($request, RequestForm::class);

        return view('front.dashboard.requests.edit', compact('request', 'form'));
    }

    public function update(Request $request,  $id)
    {
        $model = RequestModel::findByUuid($id);
        // dd($model);
        $form = $this->getForm($model, RequestForm::class);
        $form->redirectIfNotValid();

        $model->update($request->all());

        flashy("Le requete a bien ete modifiee");

        return to_route('front.dashboard.request.index');

    }
}

