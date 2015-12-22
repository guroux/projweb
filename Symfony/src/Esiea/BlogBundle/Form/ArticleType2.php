<?php
/**
 * Created by PhpStorm.
 * User: pst
 * Date: 02/12/2015
 * Time: 16:00
 */

namespace Esiea\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('auteur', 'text')
            ->add('date', 'date')
            ->add('contenu', 'textarea')
            ->add('nom', 'text')
            ->add('enregistrer', 'submit')
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esiea\BlogBundle\Entity\Article',
        ));
    }

    public function getName(){
        return 'article_form';
    }
}