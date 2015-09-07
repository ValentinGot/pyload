<?php

namespace PyLoad;

class Server extends Base {

    /**
     * Get pyLoad Core version
     *
     * @return string pyLoad Core version
     * @throws \Exception
     */
    public function getVersion() {
        return $this->logged_exec('getServerVersion');
    }
}