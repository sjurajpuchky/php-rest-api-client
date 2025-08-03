<?php


namespace BABA\REST\API\Client;


interface IApiClient
{
    public function get($url, $returnAsArray = false, $headers = [], $timeout = null);

    public function head($url, $returnAsArray = false, $headers = [], $timeout = null);

    public function delete($url, $data = '', $returnAsArray = false, $headers = [], $timeout = null);

    public function put($url, $data = '', $returnAsArray = false, $headers = [], $timeout = null);

    public function post($url, $data = '', $returnAsArray = false, $headers = [], $timeout = null);
}
