<?php
namespace Firelike\LitRes\Validator\Factory;


use Firelike\LitRes\Validator\SearchTypeValidator;
use Firelike\LitRes\Validator\LitResServiceRequestValidator;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class LitResServiceRequestValidatorFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {
        $validator = new LitResServiceRequestValidator();
        $validator->setSearchTypeValidator($sm->get(SearchTypeValidator::class));
        return $validator;
    }

}