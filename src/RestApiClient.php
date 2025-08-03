<?php

namespace BABA\REST\API\Client;

class RestApiClient implements IApiClient
{
    /** @var IDataProvider */
    private $dataProviderClient;

    /**
     * RESTRestApiClient constructor.
     * @param IDataProvider $dataProviderClient
     */
    public function __construct(IDataProvider $dataProviderClient)
    {
        $this->dataProviderClient = $dataProviderClient;
    }

    public function get($url, $returnAsArray = false, $headers = [], $timeout = null)
    {
        return $this->dataProviderClient->request(IDataProvider::METHOD_GET, $url, '', $headers, $timeout);

    }

    public function head($url, $returnAsArray = false, $headers = [], $timeout = null)
    {
        throw new \Exception("Not supported yet");
    }

    public function delete($url, $data = '', $returnAsArray = false, $headers = [], $timeout = null)
    {
        return $this->dataProviderClient->request(IDataProvider::METHOD_DELETE, $url, $data, $headers, $timeout);

    }

    public function put($url, $data = '', $returnAsArray = false, $headers = [], $timeout = null)
    {
        return $this->dataProviderClient->request(IDataProvider::METHOD_PUT, $url, $data, $headers, $timeout);
    }

    public function post($url, $data = '', $returnAsArray = false, $headers = [], $timeout = null)
    {
        return $this->dataProviderClient->request(IDataProvider::METHOD_POST, $url, $data, $headers, $timeout);
    }
}
