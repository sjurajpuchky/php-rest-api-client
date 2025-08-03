<?php


namespace BABA\REST\API\Client\DataProvider;

use BABA\REST\API\Client\IDataProvider;

class CURL implements IDataProvider
{
    private $ignoreSSL;

    /**
     * CURL constructor.
     * @param bool $ignoreSSL
     */
    public function __construct(bool $ignoreSSL = true)
    {
        $this->ignoreSSL = $ignoreSSL;
    }

    public function request($method, $url, $data = '', $headers = [], $timeout = null): string
    {
        $ch = curl_init($url);

        switch ($method) {
            case self::METHOD_POST:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                break;
            case self::METHOD_GET:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                break;
            case self::METHOD_PUT:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_PUT, true);
                break;
            case self::METHOD_DELETE:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
            case self::METHOD_HEAD:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "HEAD");
                curl_setopt($ch, CURLOPT_HEADER, true);
                break;
            default:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        }
        if($timeout) {
            // Connection timeout (seconds)
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

            // Overall timeout (seconds)
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        }
        if($this->ignoreSSL) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        } else {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        }

        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
