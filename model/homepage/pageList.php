<?php
/*
 * Subject: My Homepage
 * FileName: pageList.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 *
 */

class pageList{
    
    private $url;
    private $title;
    
    public function __construct(){
        $this->url = '';
        $this->title = '';
    }
    
    public function __destruct(){
    }
    
    public function getURL(){
        return $this->url;
    }
    
    public function getTitle(){
        return  $this->title;
    }
    
    public function setURL($url){
        $this->url = $url;
    }
    
    public function setTitle($title){
        $this->title = $title;
    }
    
}

?>