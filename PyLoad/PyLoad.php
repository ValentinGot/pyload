<?php

namespace PyLoad;

class PyLoad {
    private $base_url = null;
    private $session = null;

    private static $_instance = null;

    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance))
            self::$_instance = new PyLoad();

        return self::$_instance;
    }

    /**
     * Get API base URL
     *
     * @return String Base URL
     */
    public static function getBaseURL() {
        return rtrim(self::getInstance()->base_url, '/') . '/api/';
    }

    /**
     * Set API base URL
     *
     * @param String $url Base URL
     */
    public static function baseURL($url) {
        self::getInstance()->base_url = $url;
    }

    public function getSession() {
        return $this->session;
    }

    public function setSession($session) {
        $this->session = $session;
    }
}