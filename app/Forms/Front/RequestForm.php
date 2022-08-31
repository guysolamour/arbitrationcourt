<?php

namespace App\Forms\Front;

use Kris\LaravelFormBuilder\Form;

class RequestForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'front.dashboard.request.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'front.dashboard.request.store' );
        }

        $this->formOptions = [
          'method' => $method,
          'url'    => $url,
          'name'   => get_form_name($this->getModel()),
        ];

        $this
            // add fields here

            ->add('title', 'text', [
                'label'  => 'Titre',


                'attr' => [
                    'rules' => 'required',

                ],

            ])

            ->add('content', 'textarea', [
                'label'  => 'Contenu',

                'rules' => ['nullable',],
                'attr' => [
                    'rules' => 'required',
                    'placehoder' => 'Donner toutes les informations concernant le litige'

                ],

            ])
            ->add('defender_email', 'email', [
                'label'  => 'Email défendeur',


                'attr' => [

                    'rules' => 'required',
                ],

            ])
            ->add('defender', 'textarea', [
                'label'  => 'Défendeur',

                'rules' => ['required',],
                'attr' => [
                    'placeholder' => "Les informations sur le défendeur"


                ],

            ])
            ->add('amount', 'number', [
                'label'  => 'Montant',

                'rules' => ['required',],
                'attr' => [
                    'placeholder' => "Montant de l'opération"

                ],

            ])
            ->add('online', 'select', [
                'label'   => 'Brouillon',
                'choices' => ['0' => 'Oui','1' => 'Non', ],
                'rules'   => 'required|in:0,1',
            ])
            // ->add('applicant_id', 'entity', [
            //     'class'  => \App\Models\User::class,
            //     'property' => 'name',
            //     'label'  => 'Applicant',
            //     'rules' => ['nullable','exists:users,id',],
            //     // 'query_builder => function(\App\Models\User $user) {
            //         // return $user;
            //     // }
            // ])
            // ->add('defender_id', 'entity', [
            //     'class'  => \App\Models\User::class,
            //     'property' => 'name',
            //     'label'  => 'Defender',
            //     'rules' => ['nullable','exists:users,id',],
            //     // 'query_builder => function(\App\Models\User $user) {
            //         // return $user;
            //     // }
            // ])


        ;

    }
}
