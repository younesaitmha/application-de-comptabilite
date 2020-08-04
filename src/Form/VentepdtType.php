<?php

namespace App\Form;

use App\Entity\Ventepdt;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType ;
use Symfony\Bridge\Doctrine\Form\Type\EntityType ;

class VentepdtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qteVente',IntegerType::class)
            ->add('idProduit',EntityType::class, array(
                  'required' => false ,
                  'class' => Produit::class ,
                  'placeholder' => 'Produit' ,
                  'choice_value' => 'idProduit' ,
                  'multiple' => false ,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ventepdt::class,
        ]);
    }
}
