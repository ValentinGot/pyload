<?php

namespace PyLoad;

class File extends Base {

    /**
     * Initiates online status check
     *
     * @param array $urls URLs
     * @return mixed Initial set of data as OnlineCheck instance containing the result id
     */
    public function checkOnlineStatus(array $urls = array()) {
        $urls = $this->addQuotesToArray($urls);
        $resp = $this->logged_exec('checkOnlineStatus?urls=[' . implode(',', $urls) . ']');

        return json_decode($resp);
    }
}