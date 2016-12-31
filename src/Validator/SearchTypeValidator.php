<?php
namespace Firelike\LitRes\Validator;


use Zend\Validator\AbstractValidator;
use Zend\Validator\InArray;

class SearchTypeValidator extends AbstractValidator
{
    /**
     * @param string $value
     * @return bool
     */
    public function isValid($value)
    {

        $inArrayValidator = new InArray();

        $haystack = [
            0 => 'eBook',
            1 => 'Audio Book',
            2 => 'Multimedia Book',
            3 => 'eBook Reader',
            4 => 'PDF Book',
            5 => 'Print On Demand Book',
            6 => 'Database',
            7 => 'Video',
            8 => 'Computer Game',
            9 => 'Software',
            10 => 'Adobe DRM Books',
        ];
        $inArrayValidator->setHaystack(array_keys($haystack));

        $types = explode(',', $value);

        foreach ($types as $type) {
            if (!$inArrayValidator->isValid($type)) {
                $this->setMessage(sprintf('invalid search type provided: %s . expecting % s', $type, implode(' or ', $haystack)));
                return false;
            }
        }

        return true;
    }


}