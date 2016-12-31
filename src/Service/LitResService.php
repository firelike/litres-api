<?php
namespace Firelike\LitRes\Service;

use Firelike\LitRes\Request\Browser as BrowserRequest;
use Firelike\LitRes\Request\Genres as GenresRequest;
use Firelike\LitRes\Request\Persons as PersonsRequest;

use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\ResultInterface;

/**
 * Class LitResService
 * @package Firelike\LitRes\Service
 *
 * @method ResultInterface browser_command(array $args)
 * @method ResultInterface genres_command(array $args)
 * @method ResultInterface persons_command(array $args)
 *
 */
class LitResService extends GuzzleClient
{
    /**
     * @var \Firelike\LitRes\Validator\LitResServiceRequestValidator
     */
    protected $requestValidator;

    /**
     * @param BrowserRequest $request
     * @return array|mixed
     */
    public function browser(BrowserRequest $request)
    {
        $validator = $this->getRequestValidator();
        if (!$validator->isValid($request)) {
            return $validator->getMessages();
        }

        return $this->browser_command(array_filter($request->toArray()));
    }

    /**
     * @param GenresRequest $request
     * @return array|mixed
     */
    public function genres(GenresRequest $request)
    {
        $validator = $this->getRequestValidator();
        if (!$validator->isValid($request)) {
            return $validator->getMessages();
        }

        return $this->genres_command(array_filter($request->toArray()));
    }

    /**
     * @param PersonsRequest $request
     * @return array|mixed
     */
    public function persons(PersonsRequest $request)
    {
        $validator = $this->getRequestValidator();
        if (!$validator->isValid($request)) {
            return $validator->getMessages();
        }

        return $this->persons_command(array_filter($request->toArray()));
    }

    /**
     * @return \Firelike\LitRes\Validator\LitResServiceRequestValidator
     */
    public function getRequestValidator()
    {
        return $this->requestValidator;
    }

    /**
     * @param \Firelike\LitRes\Validator\LitResServiceRequestValidator $requestValidator
     */
    public function setRequestValidator($requestValidator)
    {
        $this->requestValidator = $requestValidator;
    }

}