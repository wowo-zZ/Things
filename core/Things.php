<?php
/**
 * 
 * User: gui.zheng@husor.com
 * Date: 16/12/5 下午7:11
 */

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
        $visit_url = 'http://' . $this->config['domain'];
        curl_setopt($ch, CURLOPT_URL, $visit_url);
        $check_domain = curl_exec($ch);
        if (!$check_domain) {
            foreach (explode(',', $this->config['try_index']) as $index) {
                $visit_url = rtrim($this->config['domain'], '/') . '/' . $index;
                curl_setopt($ch, CURLOPT_URL, $visit_url);
                $check_domain = curl_exec($ch);
                if ($check_domain) {
                    continue;
                }
            }
        }
        if (!$check_domain) {
            error_log('domain can not be things');
            exit(1);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        preg_match_all('/<a.*\shref="(.*?)"/', $output, $result);
        $urls = $this->filter_got_url(array_unique($result[1]));

        $this->set_visited_url($visit_url);
    }

    /**
     * 过滤掉已记录过的url
     */
    public function filter_got_url() {

    }

    /**
     * 记录已访问的url
     */
    public function set_visited_url() {

    }

    /**
     * 随机获取一个记录过且未被访问的url
     */
    public function get_random_got_url() {

    }

}