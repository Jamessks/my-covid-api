<?php


class APIcalls
{
    private $baseURL = "https://disease.sh/v2/";
    private $request;
    private $passArray = ['urlSource' => '','urlParameters' => ''];
    private $url;
    private $parameters;
    private $default;
    
    public function __construct()
    {
                    if(empty($_GET)){
                        $this->default = 'greece'; //new Country();
                        $this->prepareSingleCountryStats($this->default); //$this->default->country;
                        $this->request = new Request($this->passArray);
                    }
                    if (isset($_GET['country'])) {
                        // initialize data to send request with
                        $this->prepareSingleCountryStats();
                        // create request
                        $this->request = new Request($this->passArray);
                    }
    }
    //fetch results
    public function showResults()
    {
           return $this->request->fetchResults();
    }

    //available api calls
    public function prepareSingleCountryStats($default = null)
    {
        $this->setUrlSource('countries/');
        if($default == null){
            $this->setParameters($_GET['country']);
        } else {
            $this->setParameters($default);
        }

        $this->passArray['urlSource'] = $this->baseURL.$this->getUrlSource();
        $this->passArray['urlParameters'] = $this->getParameters();
    }

    //essential functions
    public function setUrlSource($url)
    {
        $this->url = $url;
    }

    public function getUrlSource()
    {
        return $this->url;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

}
