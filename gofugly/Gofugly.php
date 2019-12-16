<?php
namespace Gofugly;
use GuzzleHttp\Client;

class Gofugly
{
    private $apiUrl;
    private $client;
    public $categoryId;
    private $helper;

    /**
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCategories(){
         return $this->client->request('GET', 'categories')->getBody()->getContents();
    }

    /**
     * @param $categoryId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSubCategories($categoryId){
        if ($this->helper->categoryExist($categoryId))
            return $this->client->request('GET', 'sub_categories/'.$categoryId)->getBody()->getContents();
        else
            throw new \Exception('Not a valid category id');

    }

    /**
     * @param $subCategoryId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getContent($subCategoryId){
        return $this->client->request('GET', 'content/'.$subCategoryId)->getBody()->getContents();

    }

    /**
     * Gofugly constructor.
     */
    public function __construct()
    {
        $this->client = new Client([ 'base_uri' => 'http://www.gofugly.in/api/', 'timeout'  => 2.0]);
        $this->helper = new Helper\Helper();
    }
}
