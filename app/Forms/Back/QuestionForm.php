<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class QuestionForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.question.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.question.store' );
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
                'rules'  => 'required',

                'attr' => [


                ],

            ])
            ->add('online', 'select', [
                'label'   => 'En ligne',
                'choices' => ['1' => 'Oui', '0' => 'Non'],
                'rules'   => 'required|in:0,1',
            ])

            /*->add('uuid', 'text', [
                'label'  => 'Uuid',

                    'rules'  => [
        'required',
        \Illuminate\Validation\Rule::unique('questions')->ignore($this->getModel())
    ],

                'attr' => [


                ],

            ])*/
            ->add('answer', 'textarea', [
                'label'  => 'Answer',

                'rules' => ['nullable',],
                'attr' => [
                    'data-tinymce',

                ],

            ])


        ;

    }
}
