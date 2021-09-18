<?php

namespace BABA\JSON\API\Client;

class RestApiClient implements IApiClient
{
    /** @var IDataProvider */
    private $dataProviderClient;

    /**
     * JsonRestApiClient constructor.
     * @param IDataProvider $dataProviderClient
     */
    public function __construct(IDataProvider $dataProviderClient)
    {
        $this->dataProviderClient = $dataProviderClient;
    }

    public function get($url, $returnAsArray = false, $headers = [])
    {
        return $this->dataProviderClient->request(IDataProvider::METHOD_GET, $url, '', $headers);

    }

    public function head($url, $returnAsArray = false, $headers = [])
    {
        throw new \Exception("Not supported yet");
    }

    public function delete($url, $data = '', $returnAsArray = false, $headers = [])
    {
        return $this->dataProviderClient->request(IDataProvider::METHOD_DELETE, $url, $data, $headers);

    }

    public function put($url, $data = '', $returnAsArray = false, $headers = [])
    {
        return $this->dataProviderClient->request(IDataProvider::METHOD_PUT, $url, $data, $headers);
    }

    public function post($url, $data = '', $returnAsArray = false, $headers = [])
    {
        return $this->dataProviderClient->request(IDataProvider::METHOD_POST, $url, $data, $headers);
    }
}