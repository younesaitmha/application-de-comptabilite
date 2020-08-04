<?php

namespace App\Form;

use App\Entity\Achat;
use App\Entity\Fournisseur;
use App\Form\AchatpdtType ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType ;
use Symfony\Component\Form\Extension\Core\Type\CollectionType ; 

class AchatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateAchat')
            ->add('totalTtc')
            ->add('idfournisseur',EntityType::class ,array(
                'class'=> Fournisseur::class,
                'placeholder' => 'Fournisseur'
            ))
            ->add('achatpdts', CollectionType::class, array(
                'label' => false ,
                'entry_type' => AchatpdtType::class ,
                'allow_add' => true ,
                'allow_delete' => true ,
                'delete_empty' => true ,
                'by_reference' => false 
                ))
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Achat::class,
        ]);
    }
}
