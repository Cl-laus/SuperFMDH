<?php
namespace App\Form;

use App\Entity\Listing;
use App\Entity\PropertyType;
use App\Entity\TransactionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Import des types de champs
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ListingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, 
            ['required' => true,
             'label' => 'Titre:',
                'attr' => ['maxlength' => 50],

             ])
            ->add('description', TextareaType::class, 
            ['required' => true,
             'label' => 'Description:',
                'attr' => ['maxlength' => 500],

             ])
            ->add('price', IntegerType::class, 
            ['required' => true,
             'label' => 'Prix:',
                'attr' => ['min' => 0],

             ])
            ->add('city', TextType::class, 
            ['required' => true,
             'label' => 'Ville:',
                'attr' => ['maxlength' => 100],

             ])
            ->add('imageUrl', TextType::class, 
            ['required' => true,
             'label' => 'Image:',
                'attr' => ['maxlength' => 255],

             ])
           
            ->add('propertyType', EntityType::class, [
                'class'        => PropertyType::class,
                'choice_label' => 'name', // <-- ici on affiche la colonne "name"
                'label' => 'Type de bien:', // le label du champ
                    'placeholder' => 'Choisissez un type de bien',
            ])
            ->add('transactionType', EntityType::class, [
                'class'        => TransactionType::class,
                'choice_label' => 'name', // <-- ici on affiche la colonne "name"
                'label' => 'Type de transaction:', // le label du champ
                    'placeholder' => 'Choisissez un type de transaction',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Listing::class,
        ]);
    }
}
