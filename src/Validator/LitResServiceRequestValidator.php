<?php
namespace Firelike\LitRes\Validator;


use Firelike\LitRes\Request\AbstractRequest;
use Zend\Validator\AbstractValidator;

class LitResServiceRequestValidator extends AbstractValidator
{
    /**
     * @var SearchTypeValidator
     */
    protected $searchTypeValidator;

    /**
     * @param mixed $request
     * @return bool
     */
    public function isValid($request)
    {
        if (!$request instanceof AbstractRequest) {
            return false;
        }


        if (method_exists($request, 'getSearchType')) {
            if ($request->getSearchType()) {
                $validator = $this->getSearchTypeValidator();
                if (!$validator->isValid($request->getSearchType())) {
                    $this->setMessage('Invalid Search Type');
                    return false;
                }
            }
        }


        return true;
    }

    /**
     * @return SearchTypeValidator
     */
    public function getSearchTypeValidator()
    {
        return $this->searchTypeValidator;
    }

    /**
     * @param SearchTypeValidator $searchTypeValidator
     */
    public function setSearchTypeValidator($searchTypeValidator)
    {
        $this->searchTypeValidator = $searchTypeValidator;
    }


}