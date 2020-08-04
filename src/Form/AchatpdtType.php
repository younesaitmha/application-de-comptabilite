<?php

namespace App\Form;

use App\Entity\Achatpdt;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType ;
use Symfony\Bridge\Doctrine\Form\Type\EntityType ;

class AchatpdtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qteAchat')
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
            'data_class' => Achatpdt::class,
        ]);
    }
}
