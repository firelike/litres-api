<?php
namespace Firelike\LitRes\Test\Service;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../src/Service/Factory/LitResServiceFactory.php';
require_once __DIR__ . '/../../src/Service/LitResService.php';

require_once __DIR__ . '/../../src/Request/AbstractRequest.php';
require_once __DIR__ . '/../../src/Request/Browser.php';
require_once __DIR__ . '/../../src/Request/Genres.php';
require_once __DIR__ . '/../../src/Request/Persons.php';

require_once __DIR__ . '/../../src/Validator/LitResServiceRequestValidator.php';
require_once __DIR__ . '/../../src/Validator/SearchTypeValidator.php';

use Firelike\LitRes\Request\Browser as BrowserRequest;
use Firelike\LitRes\Request\Genres as GenresRequest;
use Firelike\LitRes\Request\Persons as PersonsRequest;

use Firelike\LitRes\Service\Factory\LitResServiceFactory;
use Firelike\LitRes\Service\LitResService;

use Firelike\LitRes\Validator\LitResServiceRequestValidator;
use Firelike\LitRes\Validator\SearchTypeValidator;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\ResultInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class LitResServiceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Firelike\LitRes\Service\LitResService
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();


        $client= $this->createClientWithMockHandler();
        //$client = $this->createClientWithHandler();


        $config = include __DIR__ . '/../../config/module.config.php';
        $description = new Description($config['litres_service']['description']);

        $this->service = new LitResService($client, $description);

        $validator = new LitResServiceRequestValidator();
        $validator->setSearchTypeValidator(new SearchTypeValidator());

        $this->service->setRequestValidator($validator);

    }

    protected function createClientWithHandler()
    {

        $config = [
            'litres_service' => [
                'log' => [
                    'enable' => false,
                    'message_formats' => [
                        '{method} {uri} HTTP/{version} {req_body}',
                        'RESPONSE: {code} - {res_body}',
                    ],
                    'logger' => [
                        'stream' => 'php://output',
                    ]
                ]
            ]
        ];
        $factory = new LitResServiceFactory();
        $handlerStack = $factory->createHandlerStack($config['litres_service']['log']);


        $client = new Client([
            'handler' => $handlerStack
        ]);

        return $client;
    }


    protected function createClientWithMockHandler()
    {

        $mock = new MockHandler();
        $responses = [
            new Response(200, [], '<catalit-fb2-books now="2009-01-14 16:39:16" account="158.13" pages="5" records="11" not_read="4">
                    <fb2-book 
                            hub_id="165361" 
                            added="2009-01-14 16:37:59" 
                            base_price="29.63" 
                            price="28.99" 
                            updated="2009-01-14 16:37:59" 
                            chars="701266" 
                            images="1" 
                            zip_size="418054" 
                            has_trial="1" 
                            cover="http://robot.litres.ru/pages/show_cover/?file=132272&amp;type=jpg" 
                            cover_preview="http://robot.litres.ru/pages/show_cover/?file=132272&amp;type=jpg" 
                            url="http://robot.litres.ru/pages/biblio_book/?art=165361" 
                            rating="9" 
                            type="0" 
                            drm="0" 
                            copyright="Эксмо" 
                            trial_id="198020" 
                            in_gifts="1" 
                            items_left="5" 
                            recenses="33" 
                            in_folder="-1">
                    </fb2-book>
                </catalit-fb2-books>'),
        ];

        foreach ($responses as $response) {
            $mock->append($response);
        }

        $client = new Client([
            'handler' => $mock
        ]);
        return $client;
    }



    public function testBrowser()
    {
        $request = new BrowserRequest();
        $request->setSearch('King')
            ->setLang('en')
            ->setLimit(5);

        $result = $this->service->browser($request);

        $this->assertInstanceOf(ResultInterface::class, $result);
        $this->assertArrayHasKey('records', $result->toArray()['@attributes']);
        $this->assertArrayHasKey('fb2-book', $result->toArray());

    }

    public function testGenres()
    {
        $request = new GenresRequest();
        $request->setLang('en');

        $result = $this->service->genres($request);

        $this->assertInstanceOf(ResultInterface::class, $result);
    }

    public function testPersons()
    {
        $request = new PersonsRequest();
        $request->setSearchPerson('King');
        $request->setSearchTypes('0,4'); // ebooks and PDF Books

        $result = $this->service->persons($request);

        $this->assertInstanceOf(ResultInterface::class, $result);
    }

    public function testSearchTypeValidatorWorksWithInvalidValues()
    {
        $validator = new SearchTypeValidator();
        $result = $validator->isValid('15');
        $this->assertEquals(false, $result);
    }


}

