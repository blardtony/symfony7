<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Email()
                ],
                'attr' => ['placeholder' => 'user.email'],
                'label' => 'user.email',
                'required' => false
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'user.password', 'attr' => ['placeholder' => 'user.password']],
                'second_options' => ['label' => 'user.password_confirmation', 'attr' => ['placeholder' => 'user.password_confirmation']],
                'first_name' => 'password',
                'second_name' => 'confirm_password',
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 6,
                        'max' => 4096,
                    ]),
                ],
                'required' => false
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Register',
                'attr' => ['class' => 'btn btn-primary btn-lg']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,

        ]);
    }
}
