<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
class CommandeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
           
            ->add('adresse_de_livraison', TextType :: Class,[

                'attr'=>[
                    'class'=>"form-control",
                    'placeholder'=>'votre adresse de livraison',
                    'minlength'=>'15',
                    'maxlength'=>'50'
                ],
                'label'=>'Adresse de livraison*',
                'label_attr'=>[
                   'class'=>"form-label mt-4"
                ],
                'error_bubbling' => false,
            ])
            ->add('adresse_de_facturation', TextType :: Class,[

                'attr'=>[
                    'class'=>"form-control",
                    'placeholder'=>'votre adresse de facturation ',
                    'minlength'=>'10',
                    'maxlength'=>'100'
                ],
                'label'=>'Adresse de facturation',
                'label_attr'=>[
                   'class'=>"form-label mt-4"
                ]
            ])
            ->add('mode_de_paiement', ChoiceType :: Class,[

                'choices' => [
                    'Carte de crédit' => 'credit_card',
                    'PayPal' => 'paypal',
                    'Virement bancaire' => 'bank_transfer',
                    'Espèces' => 'éspèces'
                ],
                'label'=>'Mode de paiement*',
                'label_attr'=>[
                   'class'=>"form-label mt-4"
                ]
                ])
                ->add('accepte_cgu', CheckboxType::class, [
                    'label' => "J'accepte les Conditions Générales d'Utilisation*",
                    'label_attr'=>[
                        'class'=>"form-label mt-4"],
                    'mapped' => false, // pour ne pas l'ajouter sur notre base de donnée
                    'constraints' => [
                        new IsTrue([
                            'message' => 'Vous devez accepter les Conditions Générales d\'Utilisation.',
                        ])
                   ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
