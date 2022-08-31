<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class RequestForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.request.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.request.store' );
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
                    
                    
                ],

            ])    
            ->add('uuid', 'text', [
                'label'  => 'Uuid',
                
                    'rules'  => [
        'required',
        \Illuminate\Validation\Rule::unique('requests')->ignore($this->getModel())
    ],

                'attr' => [
                    
                    
                ],

            ])    
            ->add('content', 'textarea', [
                'label'  => 'Contenu',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])    
            ->add('defender', 'textarea', [
                'label'  => 'Defender',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])    
            ->add('amount', 'text', [
                'label'  => 'Amount',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])
            ->add('online', 'select', [
                'label'   => 'En ligne',
                'choices' => ['1' => 'Oui', '0' => 'Non'],
                'rules'   => 'required|in:0,1',
            ])
            ->add('applicant_id', 'entity', [
                'class'  => \App\Models\User::class,
                'property' => 'name',
                'label'  => 'Applicant',
                'rules' => ['nullable','exists:users,id',],
                // 'query_builder => function(\App\Models\User $user) {
                    // return $user;
                // }
            ])
            ->add('defender_id', 'entity', [
                'class'  => \App\Models\User::class,
                'property' => 'name',
                'label'  => 'Defender',
                'rules' => ['nullable','exists:users,id',],
                // 'query_builder => function(\App\Models\User $user) {
                    // return $user;
                // }
            ])


        ;

    }
}
