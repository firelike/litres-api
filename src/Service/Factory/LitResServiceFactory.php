<?php
namespace Firelike\LitRes\Service\Factory;


use Firelike\LitRes\Service\LitResService;
use Firelike\LitRes\Validator\LitResServiceRequestValidator;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Zend\Log\Logger;
use Zend\Log\PsrLoggerAdapter;
use Zend\Log\Writer\Stream as StreamWriter;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use GuzzleHttp\Client;


class LitResServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {

        $config = $sm->get('Config');

        if (!isset($config['litres_service'])) {
            throw  new \Exception('Required configuration node - litres_service is missing');
        }

        if (!isset($config['litres_service']['description'])) {
            throw  new \Exception('Required litres_service configuration parameters are missing is missing');
        }

        $handlerStack = $this->createHandlerStack($config);
        $client = new Client([
            'handler' => $handlerStack
        ]);


        $description = new Description($config['litres_service']['description']);

        $service = new LitResService($client, $description);

        $service->setRequestValidator($sm->get(LitResServiceRequestValidator::class));

        return $service;

    }


    public function createHandlerStack(array $config)
    {
        $handlerStack = HandlerStack::create();

        // append log middleware if enabled
        if (isset($config['litres_service']['log'])) {

            $logConfig = $config['litres_service']['log'];

            if (isset($logConfig['enable'])) {

                if ($logConfig['enable'] == true) {

                    $logger = new Logger();

                    $stream = 'php://output';
                    if (isset($logConfig['logger'])) {
                        if (isset($logConfig['logger']['stream'])) {
                            $stream = $logConfig['logger']['stream'];
                        }
                    }
                    $writer = new StreamWriter($stream);
                    $logger->addWriter($writer);

                    $psrLogger = new PsrLoggerAdapter($logger);

                    $messageFormats = [];
                    if (isset($logConfig['message_formats'])) {
                        $messageFormats = $logConfig['message_formats'];
                    }
                    foreach ($messageFormats as $messageFormat) {
                        $handlerStack->unshift(
                            Middleware::log($psrLogger, new MessageFormatter($messageFormat))
                        );
                    }

                }
            }
        }

        return $handlerStack;
    }

}