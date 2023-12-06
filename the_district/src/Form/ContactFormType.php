<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom',TextType::class,[
            'attr'=>[
                'class'=>"form-control",
                'placeholder'=>'votre nom',
                'minlength'=>'2',
                'maxlength'=>'50'
            ],
            'label'=>'Nom*',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])
        ->add('prenom',TextType::class,[
            'attr'=>[
                'class'=>"form-control",
                'placeholder'=>'votre prenom',
                'minlength'=>'2',
                'maxlength'=>'50'
            ],
            'label'=>'Prenom',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])
        ->add('email', EmailType::class, [
            'attr'=>[
                'class'=>"form-control",
                'placeholder'=>'votre adresse Email',
                
            ],
            'label'=>'Email*',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
            
            ]
        )
        ->add('telephone',NumberType::class,[
            'attr'=>[
                'class'=>"form-control",
                'placeholder'=>'votre numéro de téléphone',
                'minlength'=>'10',
                'maxlength'=>'20'
            ],
            'label'=>'Téléphone',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
        ])
        //On a rajouté un label et on a rendu le champ optionnel en
        // donnant la valeur false à l'attribut required
        ->add('message', TextareaType::class, [
            'attr'=>[
                'class'=>"form-control",
                'placeholder'=>'votre demande maximum 1000 caractères',
                'minlength'=>'2',
                'maxlength'=>'1000'
            ],
            'label'=>'Votre demmande*',
            'label_attr'=>[
               'class'=>"form-label mt-4"
            ]
            ]
            );
        
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
