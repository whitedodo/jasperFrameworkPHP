<?php
/*
 * Subject: My Homepage
 * FileName: function.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 *
 */

class JasperFunction{
    
    // 한글 지원
    public function convertToUTF8($strTxt)
    {
        if(iconv("utf-8", "utf-8", $strTxt) == $strTxt){
            return $strTxt;
        }
        else
        {
            return iconv("euc-kr", "utf-8", $strTxt );
        }
    }
 
    // 객체, 배열 존재여부
    public function isObject($obj)
    {
        if (is_array($values) || is_object($values))
        {
            return $obj;
        }
        else
        {
            return true;
        }
    }
    
    public function getSkinDir($userDir){
        
        // 버그 개선
        //echo $userDir;
        
        if ($userDir == ''){
            //echo "참1";
            return $userDir;
        }else if( $userDir == '.'){
            //echo "참2";
            return $userDir;
        }else if ( strpos ($userDir, "~") == 0){
            //echo "참3";
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
            $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            
            return $protocol . $_SERVER["SERVER_NAME"] . "/" . $userDir;
        }
        else{
            //echo "참4";
            return "/" . $userDir;
        }
        
    }
    
    // 실제 경로 가져오기
    public function getDirectories($rootDir, $userDir){
        
        $strDir = $_SERVER["SCRIPT_FILENAME"];
        $strDir = str_replace($strDir, "index.php", "");
        
        if ($strDir == ''){
            $strDir = $rootDir;
        }
        
        if ( $userDir != '' )
        {
            // ~ 포함 여부
            if ( strpos( $userDir, '~') !== false ){
                //echo "참";
                return $strDir;
            }else{
                return $strDir. "/" . $userDir;
            }
            
        }else{
            return $strDir;
        }
    }
    
    // 수행시간 측정
    public function getExecutionTime() {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    
}

?>