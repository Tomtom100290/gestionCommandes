<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre adresse email',
                'attr' => [
                    'placeholder' => 'Indiquez votre email'
                ]
            ])

            //->add('roles') champs pour le role de l'utilisateur

            /*->add('password', PasswordType::class, [
                'label' => 'Votre mot de passe',
                'attr' => [
                    'placeholder' => 'Choisissez votre mdp'
                ]
            ])*/ //Remplacement de password par plainpassword, pour l'entré et la confirmation de mdp
                 // 'plainpassword' mapped à "false car ce champ n'existe pas dans l'entité "User"
            ->add('plainpassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'constraints' => [
                    new Length([
                        'min' => 4,
                        'max' => 30
                    ])
                    ],
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Votre mot de passe',
                'attr' => [
                    'placeholder' => 'Choisissez votre mdp'
                ],
                'hash_property_path' => 'password'
                ],
                'second_options' => ['label' => 'Confirmez votre mot de passe',
                'attr' => [
                    'placeholder' => 'Confirmez votre mdp'
                ]
            ],
                'mapped'=> false,
            ])

            ->add('prenom', TextType::class, [
                'label' => 'Votre prénom',
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'max' => 30
                    ])
                    ],
                'attr' => [
                    'placeholder' => 'Indiquez votre prénom'
                ]
            ])

            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'max' => 30
                    ])
                    ],
                'attr' => [
                    'placeholder' => 'Indiquez votre nom'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Ajout de contrainte sur l'unicité de l'identifiant de connexion,
            //à savoir, l'email.
            'constraints' => [
                new UniqueEntity([
                    'entityClass' => User::class,
                    'fields' => 'email'
                ])
                ],
            'data_class' => User::class,
        ]);
    }
}
