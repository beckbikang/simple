<?php
class PageTest extends PHPUnit_Framework_TestCase
{

    public static function get_page($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_HEADER, false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $res = curl_exec($ch);
        return $res;
    }

    public function test_get()
    {
        $url = "http://localhost/test_page.php?a=3&b=4";
        $page = self::get_page($url);
        $this->assertTrue(strlen($page) > 10);
    }

    public function test_add()
    {
        //<span id="result">7</span>
        $url = "http://localhost/test_page.php?a=13&b=14";
        $page = self::get_page($url);
        preg_match("/<span id=\"result\">([^<]*)<\/span>/is",$page,$matches);
        $this->assertTrue(intval($matches[1]) == 27);

    }

}

