<?php

namespace PyLoad;

class Base {

    protected function exec($url, array $opts = array()) {
        $this->checkBaseURL();
        $this->checkAuthentication();

        return CURL::exec($url, $opts);
    }

    protected function logged_exec($url, array $opts = array()) {
        $this->checkBaseURL();
        $this->checkAuthentication();

        return CURL::logged_exec($url, $opts);
    }

    /**
     * Check that base URL is present
     *
     * @throws \Exception
     */
    protected function checkBaseURL() {
        if(is_null(PyLoad::getBaseURL()) || PyLoad::getBaseURL() === '')
            throw new \Exception('API base URL is required. Please set it.');
    }

    /**
     * Check that user is authenticated
     *
     * @throws \Exception
     */
    protected function checkAuthentication() {
        if(is_null(PyLoad::getInstance()->getSession()))
            throw new \Exception('You must be authenticated to access this URL');
    }

    /**
     * Add quotes to each element of the array
     *
     * @param array $array Array
     * @return array Transformed array
     */
    protected function addQuotesToArray(array $array = array()) {
        return array_map(function($value) {
            return '"' . $value . '"';
        }, $array);
    }
}