<?php

include('data/dom.php');

/**
 * @author Moe Poi <moepoi@protonmail.com>
 * @license MIT
 */

class WaifuGenerator {
    public $image;
    public $name;
    public $page;
    public $url;
    public $req;
    public function type($type) {
        $this->image = array();
        $this->name = array();
        $this->page = strval(rand(1,11));
        $this->url = sprintf('http://jurnalotaku.com/tag/waifu-wednesday/page/%s/', $this->page);
        $this->req = file_get_html($this->url);
        foreach($this->req->find('div[class=article-wrapper article-tb m-tb]') as $x)
            foreach($x->find('div') as $y)
                foreach($y->find('div') as $z)
                    foreach($z->find('img') as $s)
                        array_push($this->image, $s->src) && array_push($this->name, $s->alt);
        $num = rand(0,count($this->image));
        if ($type == "name"){
            return str_replace("[Waifu Wednesday] ","",$this->name[$num]);
        }elseif ($type == "image"){
            return $this->image[$num];
        }else{
            return "name/image";
        }
    }
}

?>