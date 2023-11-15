<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom',TextType::class,[
            'attr'=>[
                'class'=>"form-control",
                'minlength'=>'2',
                'maxlength'=>'50'
            ],
            'label'=>'Nom',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])
        ->add('prenom',TextType::class,[
            'attr'=>[
                'class'=>"form-control",
                'minlength'=>'2',
                'maxlength'=>'50'
            ],
            'label'=>'Prenom',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])

        ->add('telephone',NumberType::class,[
            'attr'=>[
                'class'=>"form-control",
                'length'=>'10'
               
            ],
            'label'=>'Téléphone',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])
        ->add('adresse',TextType::class,[
            'attr'=>[
                'class'=>"form-control",
                'minlength'=>'2',
                'maxlength'=>'50'
            ],
            'label'=>'Votre adresse',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])
        ->add('cp',NumberType::class,[
            'attr'=>[
                'class'=>"form-control",
                'length'=>'5',
                
            ],
            'label'=>'Code Postal',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])
        ->add('ville',TextType::class,[
            'attr'=>[
                'class'=>"form-control",
                'minlength'=>'2',
                'maxlength'=>'50'
            ],
            'label'=>'Ville',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])
            ->add('email',EmailType::class,[
                'attr'=>[
                    'class'=>"form-control",
                
                ],
                'label'=>'Email',
                'label_attr'=>[
                   'class'=>"form-label my-2"
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label'=>'j\'accepte les conditions',
                'label_attr'=>[
                   'class'=>"form-check-label mt-2 "],
                   'attr'=>[
                    'class'=>"form-check-input mx-3 mt-3 "],
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password','class'=>"form-control"],
                'label'=>'Mot de passe',
                'label_attr'=>[
                   'class'=>"form-label my-2"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])/*
            ->add('submit',SubmitType::class,[
                'attr'=>[
                    'class'=>"btn btn-primary mt-4 "
                    
                ],
                'label'=>'Créer mon compte',
                 
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
