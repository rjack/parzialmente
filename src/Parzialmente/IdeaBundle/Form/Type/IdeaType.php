<?php

namespace Parzialmente\IdeaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class IdeaType extends AbstractType
{
    public function buildForm (FormBuilder $builder, array $options)
    {
        $builder->add('title', 'text');
        $builder->add('description', 'textarea');
    }

    public function getName ()
    {
        return 'idea';
    }
}
