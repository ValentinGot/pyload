<?php

namespace PyLoad;

class CURL {

    /**
     * Execute a cURL request
     *
     * @param string $url URL
     * @param array $opts Array of cURL options
     * @return mixed cURL response
     * @throws \Exception
     */
    public static function exec($url, array $opts = array()) {
        return self::curl($url, $opts);
    }

    /**
     * Execute a logged cURL request
     *
     * @param string $url URL
     * @param array $opts Array of cURL options
     * @return mixed cURL response
     * @throws \Exception
     */
    public static function logged_exec($url, array $opts = array()) {
        $opts[CURLOPT_POST] = true;
        $opts[CURLOPT_POSTFIELDS] = array(
            'session' => PyLoad::getInstance()->getSession()
        );
        $opts[CURLOPT_HTTPHEADER] = array('Content-Type: multipart/form-data');

        return self::curl($url, $opts);
    }

    private static function curl($url, array $opts = array()) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, PyLoad::getBaseURL() . $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt_array($ch, $opts);

        if (!($resp = curl_exec($ch)))
            throw new \Exception(curl_error($ch));
        curl_close($ch);

        return $resp;
    }
}