<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
              "attr" => array(
              )
            ))
            ->add('age', NumberType::class, array(
              "attr" => array(
                "min" => 0
              )
            ))
            ->add('bio', TextareaType::class, array(
              "attr" => array(
                "maxlength" => 2000
              )
            ))
            ->add('job')
            ->add('city')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults([
          'data_class' => User::class,
      ]);
    }
}
