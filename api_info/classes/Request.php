<?php


class Request
{

public $curl;
public $results;

    public function __construct($info)
    {
        $this->curlInit();
        $this->setCurlOptions();
        $this->setCurlSource($info);
        $this->curlExec();
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    protected function curlInit()
    {
        // Create a new cURL resource
        $this->curl = curl_init();

        if (!$this->curl) {
            //Couldn't initialize a cURL handle
            return false;
        }
        return true;
    }
    protected function setCurlSource($source)
    {
        curl_setopt($this->curl, CURLOPT_URL, implode($source));
    }
    protected function setCurlOptions()
    {
        // Follow redirects, if any
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);

        // Fail the cURL request if response code = 400 (like 404 errors)
        curl_setopt($this->curl, CURLOPT_FAILONERROR, true);

        // Return the actual result of the curl result instead of success code
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        // Wait for 10 seconds to connect, set 0 to wait indefinitely
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 10);

        // Execute the cURL request for a maximum of 50 seconds
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 50);

        // Do not check the SSL certificates
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
    }

    public function curlExec()
    {
        $this->results = curl_exec($this->curl);
    }

    public function fetchResults()
    {
        return json_decode($this->results, true);
    }
}