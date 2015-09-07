<?php

namespace PyLoad;

class User extends Base {

    /**
     * Login into pyLoad
     *
     * @param string $username Username
     * @param string $password Password
     * @return string Session ID
     * @throws \Exception
     */
    public function login($username, $password) {
        if(!is_null(PyLoad::getInstance()->getSession()))
            return PyLoad::getInstance()->getSession();

        $curl_opts[CURLOPT_POST] = true;
        $curl_opts[CURLOPT_POSTFIELDS] = array(
            'username' => $username,
            'password' => $password
        );
        $curl_opts[CURLOPT_HTTPHEADER] = array('Content-Type: multipart/form-data');

        $session = CURL::exec('login', $curl_opts);
        $session = str_replace('"', '', $session);

        PyLoad::getInstance()->setSession($session);

        return $session;
    }
}