<?php

namespace App\Form;

use App\Entity\Vente;
use App\Entity\Client;
use App\Form\VentepdtType ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType ;
use Symfony\Component\Form\Extension\Core\Type\CollectionType ; 

class VenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datevente')
            ->add('totalTtc')
            ->add('idclient',EntityType::class ,array(
                'class'=> Client::class ,
                 'placeholder' => 'CLIENT'


            ))
            ->add('ventepdts', CollectionType::class, array(
                'label' => false ,
                'entry_type' => VentepdtType::class ,
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
            'data_class' => Vente::class,
        ]);
    }
}
