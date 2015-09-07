<?php

namespace PyLoad;

class Package extends Base {

    public function add($name, array $links = array()) {
        $links = $this->addQuotesToArray($links);
        $resp = $this->logged_exec('addPackage?name="' . $name . '"&links=[' . implode(',', $links) . ']');

        return json_decode($resp);
    }

    /**
     * Add links
     *
     * @param array $links Links
     * @return mixed List of package ids
     */
    public function addLinks(array $links = array()) {
        $links = $this->addQuotesToArray($links);
        $resp = $this->logged_exec('generateAndAddPackages?links=[' . implode(',', $links) . ']');

        return json_decode($resp);
    }

    public function getData($id) {

    }

    public function getInfo($id) {

    }

    public function getOrder($id) {

    }

    public function move($destination, $id) {

    }

    public function order($id, $position) {

    }

    public function delete(array $ids = array()) {

    }
}