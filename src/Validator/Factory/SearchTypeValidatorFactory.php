<?php
namespace Firelike\LitRes\Validator\Factory;


use Firelike\LitRes\Validator\SearchTypeValidator;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class SearchTypeValidatorFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {
        $validator = new SearchTypeValidator();
        return $validator;
    }

}