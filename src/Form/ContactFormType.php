<?php

namespace App\Form;

use App\Model\Contact;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
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
            ->add('phoneNumber', TelType::class,[
                'label' => false,

                'constraints' => [
                    new NotBlank(message: 'form.constraint.tel.not_blank')
                ],
                'attr' => [
                    'placeholder' => 'form.placeholder.phone'
                ]
            ])
            ->add('company', TextType::class, [
                'label' => false,
                'required' =>false,
                'empty_data' => 'Non communiquée',

                'constraints' => [
                    new Length(max: 50 , maxMessage: 'form.constraint.company.maxMessage')
                ],
                'attr' => [
                    'placeholder' => 'form.placeholder.company'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => false,
                 'constraints' => [
                     new NotBlank(message: 'form.constraint.message.not_blank')
                 ],
                 'attr' => [
                    'placeholder' => 'contact.title'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'form.submit.send'
            ])
            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(),
                'action_name' => 'contact'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
