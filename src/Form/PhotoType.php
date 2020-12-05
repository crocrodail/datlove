<?php

namespace App\Form;

use App\Entity\Photos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class PhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', FileType::class, [
            'label' => false,
            'mapped' => false, // Tell that there is no Entity to link
            'required' => true,
            'constraints' => [
              new File([
                'mimeTypes' => [ // We want to let upload only txt, csv or Excel files
                  'image/x-png',
                  'image/gif',
                  'image/jpeg'
                ],
                'mimeTypesMessage' => "This image isn't valid.",
              ])
            ],
          ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photos::class,
        ]);
    }
}
