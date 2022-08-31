<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class RefereForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.refere.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.refere.store' );
        }

        $this->formOptions = [
          'method' => $method,
          'url'    => $url,
          'name'   => get_form_name($this->getModel()),
        ];

        $this
            // add fields here

            ->add('name', 'text', [
                'label'  => 'Nom',


                'attr' => [


                ],

            ])
    //         ->add('uuid', 'text', [
    //             'label'  => 'Uuid',

    //                 'rules'  => [
    //     'required',
    //     \Illuminate\Validation\Rule::unique('referes')->ignore($this->getModel())
    // ],

    //             'attr' => [


    //             ],

    //         ])
            ->add('email', 'text', [
                'label'  => 'Adresse courriel',

                'rules' => ['nullable',],
                'attr' => [


                ],

            ])
            ->add('phone_number', 'text', [
                'label'  => 'Phone_number',

                'rules' => ['nullable',],
                'attr' => [


                ],

            ])
            ->add('job', 'text', [
                'label'  => 'Job',

                'rules' => ['nullable',],
                'attr' => [


                ],

            ])
            ->add('about', 'textarea', [
                'label'  => 'A propos',

                'rules' => ['nullable',],
                'attr' => [


                ],

            ])


        ;

    }
}
