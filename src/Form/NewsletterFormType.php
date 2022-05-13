<?php

namespace App\Form;

use App\Entity\Newsletter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Unique;
use Symfony\Contracts\Translation\TranslatorInterface;

class NewsletterFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class,[
                'label' => false,
                'constraints' => [
                    new NotBlank( message: "form.constraint.lastname.not_blank"),
                    new Length(min: 2, max: 50, minMessage:'form.constraint.firstname.minMessage', maxMessage: 'form.constraint.firstname.maxMessage')
                ],
                'attr' => [
                    'placeholder' => 'form.placeholder.lastname'
                ]])
            ->add('firstname', TextType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank(message: "form.constraint.firstname.not_blank"),
                    new Length(min: 2, max: 50, minMessage:'form.constraint.lastname.minMessage', maxMessage: 'form.constraint.lastname.maxMessage' )
                ],
                'attr' => [
                    'placeholder' => 'form.placeholder.firstname'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,

                'constraints' => [
                    new NotBlank(message: "form.constraint.email.not_blank"),
                    new Email(message: "form.constraint.email.type")
                ],
                'attr' => [
                    'placeholder' => 'form.placeholder.email'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'form.submit'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newsletter::class,
        ]);
    }
}
