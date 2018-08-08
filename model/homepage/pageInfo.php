<?php
/*
 * Subject: My Homepage
 * FileName: pageInfo.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 *
 */

class PageInfo{
    
    private $pageName;
    private $subName;
    private $pageId;
    
    public function __construct($pageName = -1, $subName = -1, $pageID = -1){
        $this->pageName = $pageName;
        $this->subName = $subName;
        $this->pageId = $pageID;
    }
    
    public function __destruct(){
        
    }
    
    public function getPageName(){
        return $this->pageName;
    }
    
    public function getSubName(){
        return $this->subName;
    }
    
    public function getPageId(){
        return $this->pageId;
    }
    
    public function isEmpty(){
        
        if ( $this->pageName == -1 ||
            $this->subName == -1 ||
            $this->pageId == -1 ){
            return true;
        }
        else if ( $this->pageName == '' ||
            $this->subName == '' ||
            $this->pageId == '' ){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function isCountable(){
        
        $count = 0;
        
        if ( $this->pageName != '' ){
            $count++;
        }
        if ( $this->subName != '' ){
            $count++;
        }
        if ( $this->pageId != '' ){
            $count++;
        }
        
        return $count;
    }
    
    public function setPageName($pageName){
        $this->pageName = $pageName;
    }
    
    public function setSubName($subName){
        $this->subName = $subName;
    }
    
    public function setPageId($id){
        $this->pageId = $id;
    }
}

?>