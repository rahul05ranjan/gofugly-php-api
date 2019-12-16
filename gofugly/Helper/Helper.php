<?php
namespace Gofugly\Helper;
use Gofugly\Gofugly;

class Helper
{
    /**
     * @param $categoryId
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function categoryExist($categoryId){
        $gofugly = new Gofugly();
        $array = json_decode($gofugly->getCategories());
        foreach($array->result as $item){
            if ($categoryId == $item->id)
                return true;
        }
        return false;
    }


}