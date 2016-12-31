<?php
namespace Firelike\LitRes\Controller;

use Firelike\LitRes\Request\Browser as BrowserRequest;
use Firelike\LitRes\Request\Genres as GenresRequest;
use Firelike\LitRes\Request\Persons as PersonsRequest;
use Zend\Mvc\Console\Controller\AbstractConsoleController;


class ConsoleController extends AbstractConsoleController
{
    /**
     * @var \Firelike\LitRes\Service\LitResService
     */
    protected $service;

    public function browserAction()
    {
        $this->markBegin();

        $request = new BrowserRequest();

        $search = $this->getRequest()->getParam('search');
        if ($search) {
            $request->setSearch($search);
        } else {
            $request->setSearch('fiction');
        }

        $result = $this->getService()->browser($request);

        $records = $result->toArray()['fb2-book'];

        var_dump($records);

        $this->markEnd();
    }

    public function genresAction()
    {
        $this->markBegin();

        $request = new GenresRequest();
        $request->setLang('en');
        $result = $this->getService()->genres($request);

        $records = $result->toArray()['genre'];

        var_dump($records);

        $this->markEnd();
    }

    public function personsAction()
    {
        $this->markBegin();

        $request = new PersonsRequest();

        $searchPerson = $this->getRequest()->getParam('search_person');
        if ($searchPerson) {
            $request->setSearchPerson($searchPerson);
        } else {
            $request->setSearchPerson('Stephen King');
        }

        $request->setSearchTypes('0,4'); // ebooks and PDF Books

        $result = $this->getService()->persons($request);

        $records = $result->toArray()['subject'];

        var_dump($records);

        $this->markEnd();
    }

    public function markBegin()
    {
        $delimiter = str_repeat('=', 10);
        $this->getConsole()->writeLine(implode('BEGIN', [
            $delimiter,
            $delimiter
        ]));
    }

    public function markEnd()
    {
        $request = $this->getRequest();
        $verbose = $request->getParam('verbose') || $request->getParam('v');

        if ($verbose) {
            $this->getConsole()->writeLine("Done");
        }

        $delimiter = str_repeat('=', 10);
        $this->getConsole()->writeLine(implode('END', [
            $delimiter,
            $delimiter
        ]));
    }

    /**
     * @return \Firelike\LitRes\Service\LitResService
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param \Firelike\LitRes\Service\LitResService $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }


}

