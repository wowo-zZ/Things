<?php
/**
 *
 * User: gui.zheng@husor.com
 * Date: 16/12/5 下午7:25
 */
#待爬取的域名
$config['domain'] = 'www.zngirls.com';

#开始爬取的page
$config['start_url'] = 'g/21231';

#默认尝试爬取的page
$config['try_index'] = 'index,index.php,index.html';

#爬取url总数目,达到这个数目,爬虫将会停止爬取
$config['max_url_num'] = 100;

#爬取方式,广度优先(wide) | 深度优先(deep)
$config['traverse_method'] = 'wide';

#下载存储的目录
$config['download_dir'] = '/Users/zhenggui/Downloads/pictures/';

#图片大小过滤,0表示不过滤
$config['pic_size'] = 50000;
