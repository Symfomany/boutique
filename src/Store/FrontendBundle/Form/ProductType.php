<?php

namespace Store\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ProductType
 * @package Store\FrontendBundle\Form
 */
class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'label' => 'Titre de produit',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Titre du produit',
                    'pattern' => '[a-zA-Z ]{5,}'
                )
            ))
            ->add('description', null, array(
                'label' => 'Description de produit',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'cols' => 10,
                    'rows' => 5,
                    'placeholder' => 'Description du produit',
                )
            ))
            ->add('visible', null, array(
                'label' => 'Est-il visible?'
            ))
            ->add('created')
            ->add('category', null, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('tag', null, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('Enregistrer','submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Store\FrontendBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'store_frontendbundle_product';
    }
}
