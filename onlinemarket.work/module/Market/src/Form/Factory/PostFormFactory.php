<?php
namespace Market\Form\Factory;

use Market\Form\ {PostForm,PostFilter};
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class PostFormFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $form = new PostForm(
            $container->get('categories'),
            $container->get('market-expire-days'),
            $container->get('market-captcha-options')
        );
        $form->setInputFilter($container->get(PostFilter::class));
        return $form;
    }
}
