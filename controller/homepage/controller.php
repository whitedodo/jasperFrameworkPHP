<?php
/*
 * Subject: My Homepage
 * FileName: controller.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 * 2018-08-08 / Jasper / Tree형 카테고리 구현
 * 
 */

class Homepage{
    
    // 페이지 정보
    private $pageInfo;
    
    // Function(기능)
    private $jFunction;
    
    // Directories
    private $rootDir;
    private $userDir;
    private $coreName;
    
    // Array
    private $pageTitleList;
    private $pageUrlList;
    private $subTitleList;
    private $subUrlList;
    private $pageIdList;
    private $pageIdUrl;
    
    // TmpArray(Categories)
    private $tmpArray;
    
    // Footer
    private $footer;
    
    public function __construct( $rootDir, $userDir ){
        
        $this->jFunction = new JasperFunction();
        $this->pageInfo = new PageInfo(-1, -1, -1);
        $this->rootDir = $rootDir;
        $this->userDir = $userDir;
        $this->coreName = 'suite';
        $this->footer = new Footer();
        
        $this->footer->setCopyright("Jasper");
        $this->footer->setPriEmail("rabbit.white@daum.net");
        $this->footer->setSubEmail("rabbit.white@daum.net");
        $this->footer->setPowered("copyright @ Dodo(Jasper)");
        
        $this->pageTitleList = array(
            'index' => '홈페이지(Homepage)',
            'file' => 'Pub(Small File)',
            'error' => '오류(Error)',
            'ready' => '준비(Ready)',
            'profile' => '나(Me)'
        );
        
        $this->pageUrlList = array(
            'index' => 'index',
            'file' => 'file',
            'error' => 'error',
            'ready' => 'ready',
            'profile' => 'profile'
        );
        
        $this->subTitleList['file'] = array(
            'resumecvcl' => 'resumecvcl'
        );
        
        $this->subUrlList['file'] = array(
            'resumecvcl' => 'resumecvcl'
        );
        
        $this->subTitleList['profile'] = array(
            'hobbies' => '취미(Hobbies)'
        );
        
        $this->subUrlList['profile'] = array(
            'hobbies' => 'hobbies'
        );
        
        $this->idTitleList['profile'] = array();
        $this->idUrlList['profile'] = array();
        
        $this->tmpArray = NULL;
    }
    
    public function __destruct(){
    }
    
    public function setPageInfo($pageInfo){
        $uPageInfo = $this->pageInfo;
        $uPageInfo->setPageName( $pageInfo->getPageName() );
        $uPageInfo->setSubName( $pageInfo->getSubName() );
        $uPageInfo->setPageId( $pageInfo->getPageId() );
        
        $this->pageInfo = $uPageInfo;
    }
    
    // 루트 경로
    public function getRootDir(){
        return $this->rootDir;
    }
    
    // 사용자 경로
    public function getUserDir(){
        return $this->userDir;
    }
    
    // 프로그램 이름(코어명)
    public function getCoreName(){
        return $this->coreName;
    }
    
    // Title List 가져오기
    public function getPageTitleList(){
        return $this->pageTitleList;
    }
    
    // URL List 가져오기
    public function getPageUrlList(){
        return $this->pageUrlList;
    }
    
    // Title List 가져오기(Sub)
    public function getSubTitleList(){
        return $this->subTitleList;
    }
    
    // URL List 가져오기(Sub)
    public function getSubUrlList(){
        return $this->subUrlList;
    }
    
    // Title List 가져오기(id)
    public function getPageIdList(){
        return $this->pageIdList;
    }
    
    // URL List 가져오기(id)
    public function getPageIdUrl(){
        return $this->pageIdUrl;
    }
    
    // 임시 배열공간
    public function getTmpArr(){
        return $this->tmpArray;
    }
    
    public function setTmpArr($tmpArray){
        $this->tmpArray = $tmpArray;
    }
    
    // 홈페이지 뷰어
    public function getHomepage( ){
        
        $uPageInfo = $this->pageInfo;
        
        if ( $uPageInfo->isCountable() == 0 ){
            $uPageInfo->setPageName("index");
            $this->pageInfo = $uPageInfo;
            
            $this->loadPage('print');
        }
        else{            
            $this->loadPage('print');
        }
    }
    
    // 페이지
    public function loadPage( $option ){
        
        $uPageInfo = $this->pageInfo;
        $jFunction = $this->jFunction;
        
        // 홈 경로 불러오기
        $coreName = $this->getCoreName();
        $home_dir = $this->getUserDir();
        
        $usr_directories = $jFunction->getDirectories( $this->getRootDir(), $this->getUserDir() );
        
        $skin_dir = $jFunction->getSkinDir( $this->getUserDir() );
        
        //echo $skin_dir . "*";
        $footer = $this->footer;
        
        // 수행시간
        $start = $jFunction->getExecutionTime();  // 수행시간 측정(시작)
        
        // 제목과 URL
        $title = "";
        $url = "";
        
        // 항목 구분
        $currentInfo = $this->getVerifyItems($uPageInfo);
        
        // 제목, 소제목, 페이지ID
        $pageUrlList = $this->getPageUrlList();
        $pageTitleList = $this->getPageTitleList();
        
        $subTitleList = $this->getSubTitleList();
        $subUrlList = $this->getSubUrlList();
        
        $idTitleList = $this->getPageIdList();
        $idUrlList = $this->getPageIdUrl();
        
        // 무결점 상태
        if ( $currentInfo != "" ){
        
            switch( $currentInfo->isCountable() )
            {
                case 1:
                    $pageName = $jFunction->convertToUTF8( $uPageInfo->getPageName() );
                    $pageTitle = $pageTitleList[$pageName];
                    
                    $title = $pageTitle;
                    $url = $usr_directories . "/view/page/" . $pageUrlList[ $pageName ];
                    break;
                    
                case 2:
                    $pageName = $jFunction->convertToUTF8( $uPageInfo->getPageName() );
                    $subName = $jFunction->convertToUTF8( $uPageInfo->getSubName() );
                    $pageTitle = $pageTitleList[$pageName];
                    $subTitle = $subTitleList[$pageName][$subName];
                    $title = $subTitle . ">" . $pageTitle;
                    
                    if ( strcmp( $pageName, 'file') == 0 )
                    {
                        $url = $usr_directories . "/view/fileSystem/fileView";
                        //echo $url;
                    }else{
                        $url = $usr_directories . "/view/page/" . $pageName . "/" . $subName;
                    }
                    
                    break;
                    
                case 3:
                    $pageName = $jFunction->convertToUTF8( $uPageInfo->getPageName() );
                    $subName = $jFunction->convertToUTF8( $uPageInfo->getSubName() );
                    $id = $jFunction->convertToUTF8( $uPageInfo->getPageId() );
                    
                    $pageTitle = $pageTitleList[$pageName];
                    $subTitle = $pageTitleList[$pageName][$subName];
                    $idTitle = $idTitleList[$pageName][$subName][$id];
                    
                    $title = $idTitle . ">" . $subTitle . ">" . $pageTile;
                    $url = $usr_directories . "/view/page/" . $pageUrlList[ $pageName ];
                    break;
            }
        }
        
        // 오류
        if ( $currentInfo == "" ){
            $title = $pageTitleList['error'];
            $url = $usr_directories . "/view/page/" . $pageUrlList['error'];
        }
        
        // 옵션
        if ( strcmp ( $option, 'print' ) == 0 )
        {   
            $file_check = file_exists($url . ".php"); 
            
            require_once ($usr_directories . "/view/common/header.php");
            // 파일 존재 여부
            if ( $file_check ){
            }
            else{
                $title = $pageTitleList['ready'];
                
                //require_once ($usr_directories . "/view/common/header.php");
                $url = $usr_directories . "/view/page/" . $pageUrlList['ready'];
            }
            require_once ($url . ".php");
            
            require_once ($usr_directories . "/view/common/w3cLogo.php");
            require_once ($usr_directories . "/view/common/executionTime.php");
            require_once ($usr_directories . "/view/common/footer.php");
        }
        
    }
    
    public function getVerifyItems($uPageInfo){
        
        $jFunction = new JasperFunction();
        
        // Directories 정보
        $coreName = $this->getCoreName();
        
        // List 불러오기
        $pageUrlList = $this->getPageUrlList();
        $pageTitleList = $this->getPageTitleList();
        
        $subTitleList = $this->getSubTitleList();
        $subUrlList = $this->getSubUrlList();
        
        $idTitleList = $this->getPageIdList();
        $idUrlList = $this->getPageIdUrl();
        
        // 페이지 정보
        $pageName = $uPageInfo->getPageName();
        $subName = $uPageInfo->getSubName();
        $id = $uPageInfo->getPageId();
    
        //     
        $strPageName = "";
        $strSubName = "";
        $strPageId = "";
    
        // 진위 확인
        $index = 0;
        $chk = 1;
        
        // PageName
        foreach ( $pageUrlList as $varPageURL ){
            
            if (strcmp( $jFunction->convertToUTF8( $varPageURL ), $pageName ) == 0){
                $index++;
                //echo "참1";
                break;
            }
            
        }
        
        if ( $index == 0 )
            $chk = -1;
        
        // SubName
        if ( $pageName != '' && $subName != '' ){
            
            // 서브네임 URL 존재유무
            if ( $jFunction->isObject($subUrlList[$pageName]) && 
                isset( $subUrlList[$pageName] ))
            {
                $index = 0;
                //echo "진2";
                
                //echo $subName;
                
                foreach ( $subUrlList[$pageName] as $varSubURL ){
                    
                    if (strcmp( $varSubURL, $subName ) == 0){
                        $index++;
                        //echo "참2";
                        break;
                    }
                }
                
                if ( $index == 0 )
                    $chk = -1;
            }
            else
            {
                $chk = -1;
            }
        }
        
        //echo $idUrlList[$pageName][$subName];
        
        // PageID
        if ( $pageName != '' && $subName != '' && $id != '' ){
            
            // 페이지 ID URL 존재유무
            if (! $jFunction->isObject($idUrlList[$pageName][$subName]) && 
                isset( $idUrlList[$pageName][$subName] )){
                $index = 0;
                //echo "진3";
                
                foreach ( $idUrlList[$pageName][$subName] as $varIdURL ){
                    if (strcmp( $varIdURL, $id ) == 0){
                        $index++;
                        //echo "참3";
                        break;
                    }
                }
                
                if ( $index == 0 )
                    $chk = -1;
            }else{
                $chk = -1;
            }
                    
        }
        
        if ( $chk == -1 ){
            //echo "거";
            return "";
        }
        else {
            //echo "참결";
            return $uPageInfo;
        }
    }
    
    // type = 1(풀타입)
    // type = 2(특정페이지)
    public function getTreeCategories( $id, $type ){
        
        $uPageInfo = $this->pageInfo;
        $index = 1;
        $max = 3;
        
        // 항목 구분
        $currentInfo = $this->getVerifyItems($uPageInfo);
        $count = $currentInfo->isCountable();
        
        $tmpArr = $this->getTmpArr();
        
        // NULL 여부
        if ( $tmpArr != NULL ){
            unset($tmpArr);
        }else{
            $tmpArr = Array();
        }
        
        if ( strcmp($type, 'wide') == 0 && $count > 0){
            
            $this->setTmpArr($tmpArr);
            $this->getTreePrint($index, $max, 'wide');
        }
        else{
            
            array_push($tmpArr, $currentInfo->getPageName());
            array_push($tmpArr, $currentInfo->getSubName());
            array_push($tmpArr, $currentInfo->getPageId());
            
            $this->setTmpArr($tmpArr);
            
            $this->getTreePrint($id, $max, '');
        }
    }
    
    
    private function getTreeList( $id ){
        
        $pageList = new pageList();
        
        // 제목, 소제목, 페이지ID
        $pageUrlList = $this->getPageUrlList();
        $pageTitleList = $this->getPageTitleList();
        
        $subTitleList = $this->getSubTitleList();
        $subUrlList = $this->getSubUrlList();
        
        $idTitleList = $this->getPageIdList();
        $idUrlList = $this->getPageIdUrl();
        
        $titleList;
        $urlList;
        
        switch ( $id ){
            
            case 1:
                $urlList = $pageUrlList;
                $titleList = $pageTitleList;
                break;
                
            case 2:
                $urlList = $subUrlList;
                $titleList = $subTitleList;
                break;
                
            case 3:
                $urlList = $idUrlList;
                $titleList = $idTitleList;
                break;
            
            default:
                $urlList = NULL;
                $titleList = NULL;
                break;
        }
        
        $pageList->setURL($urlList);
        $pageList->setTitle($titleList);
        
        return $pageList;
        
    }
    
    private function getTreeUrl ( $id, $varUrl ){
        
        // 홈 경로 불러오기
        $coreName = $this->getCoreName();
        $home_dir = $this->getUserDir();
        
        $tmpArr = $this->getTmpArr();
        
        
        switch ( $id ){

            case 1:
                if ( $home_dir != ""){
                    
                    // Apache2 사용자디렉터리 유저용
                    if ( strpos( $home_dir, '~') !== false ){
                        echo "/$home_dir/index.php?pageName=$varUrl";
                    }else{
                        echo "/$home_dir/$coreName/$varUrl";
                    }
                }
                else{
                    echo "/$coreName/$varUrl";
                }
                break;
            
            case 2:
                
                if ( $home_dir != ""){
                    
                    // Apache2 사용자디렉터리 유저용
                    if ( strpos( $home_dir, '~') !== false ){
                        echo "/$home_dir/index.php?pageName=$tmpArr[0]&subName=$varUrl";
                    }
                    else{
                        echo "/$home_dir/$coreName/$tmpArr[0]/$varUrl";
                    }
                }
                else{
                    echo "/$coreName/$tmpArr[0]/$varUrl";
                }
                
                break;
                
            case 3:
                
                if ( $home_dir != ""){
                    
                    // Apache2 사용자디렉터리 유저용
                    if ( strpos( $home_dir, '~') !== false ){
                        echo "/$home_dir/index.php?pageName=$tmpArr[0]&subName=$tmpArr[1]&pageId=$varUrl";
                    }
                    else{
                        echo "/$home_dir/$coreName/$tmpArr[0]/$tmpArr[1]/$varUrl";
                    }
                    
                }
                else{
                    echo "/$coreName/$tmpArr[0]/$tmpArr[1]/$varUrl";
                }
                break;
        }
        
        
    }
    
    public function getTreePrint( $id, $max, $type ){
        
        $jFunction = new JasperFunction();
        
        $tmpArr = $this->getTmpArr();
        
        // 페이지 리스트
        $pageList = $this->getTreeList($id);
        $titleList = $urlList = '';
                
        switch ( $id ){
            
            case 1:
                $titleList = $pageList->getTitle();
                $urlList = $pageList->getURL();
                break;
        
            case 2:
                $titleList = $pageList->getTitle();
                $titleList = $titleList[ $tmpArr[0] ];
                $urlList = $pageList->getURL();
                $urlList = $urlList [ $tmpArr[0] ];
                //print_r($tmpArr);
                
                break;
                
            case 3:
                $titleList = $pageList->getTitle();
                $titleList = $titleList [ $tmpArr[0] ][ $tmpArr[1] ];
                $urlList = $pageList->getURL();
                $urlList = $urlList [ $tmpArr[0] ][ $tmpArr[1] ];
                break;
        }
        
        echo "<ul class=\"mylist\">\n";
        
        foreach ( $urlList as $varUrl ){
            
            if ( ( strcmp ( $varUrl, "error" ) * 
                strcmp ( $varUrl, "ready") * 
                strcmp ( $varUrl, "index") *
                strcmp ( $varUrl, "file") ) != 0){
                    
                $strTitle = @$titleList[$varUrl];
                
                if ( $strTitle != "" ){
                    
                    echo "\t\t\t<li>\n";
                    echo "\t\t\t\t<a href=\"";                    
                    $this->getTreeUrl($id, $varUrl);
                    echo "\">";
                    echo $strTitle;
                    echo "</a>\n\t\t\t ";
                    echo "</li>\n";
                    
                    // 넓게 펼치기
                    if ( strcmp ( $type, 'wide') == 0 )
                    {   
                        $s_pageList = '';
                        $s_urlList = '';
                        
                        //echo ($id ); 
                        // 범위 여부
                        if ( ($id + 1) < $max ){
                            // 페이지 리스트
                            $s_pageList = $this->getTreeList( $id + 1 );
                            $s_urlList = $s_pageList->getURL();
                            
                            //print_r($s_pageList);
                            
                        }
                        
                        if ( @$jFunction->isObject($s_urlList[$varUrl]) )
                        {
                            //echo "참";
                            if ( isset($s_urlList[$varUrl] ) )
                            {
                                // 데이터 존재여부
                                array_push($tmpArr, $varUrl);
                                $this->setTmpArr($tmpArr);
                                echo "\t\t<li>\n";
                                $this->getTreePrint( $id + 1, $max, $type);
                                echo "\t\t</li>\n";
                                array_pop($tmpArr);
                            }
                        }
                        
                        
                    }
                    
                    $index++;
                }
            }
        }
        echo "\t\t\t</ul>\n";
     
    }
    
}
?>