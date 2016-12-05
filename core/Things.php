<?php
/**
 * 
 * User: gui.zheng@husor.com
 * Date: 16/12/5 下午7:11
 */
require 'config/config.php';

class Things {

    protected $config;

    protected $persistent;

    public function __construct() {
        $config = array();
        require 'config/config.php';
        $this->config = $config;
    }

    public function start() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://' . $this->config['start_url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        preg_match_all('/<a.*\shref="(.*?)"/', $output, $result);
        $urls = array_unique($result[1]);

        echo $output;
    }
}