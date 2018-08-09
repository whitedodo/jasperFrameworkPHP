<?php
/*
 * Subject: My Homepage
 * FileName: function.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 * 2018-08-09 / Jasper / csvToViewer($file) 기능 추가
 */

class JasperFunction{
    
    private $bookMin = 17;
    private $bookMax = 20;
    
    // CSV To Viewer(School)
    function csvToSchoolPay($file){
        
        ini_set("allow_url_fopen", 0);
        
        $row = 1;
        
        if (($handle = fopen("$file", "r")) !== FALSE) {
            
            echo "<table class=\"tg_general\">";
            
            $index = 0;
            $arrHeader = array();
            $arrTitle = array();
            $arrData = array();
            $arrCount = -1;
            
            while (($data = fgetcsv($handle, 4096, ",")) !== FALSE) {
                
                $num = count($data);
                
                // Title 출력
                if ( $index > 1 ){
                    
                    echo "\t<tr>\n";
                    foreach ( $arrHeader as $arrVal ){
                        
                        echo "<th>";
                        echo "<b>$arrVal</b>";
                        echo "</th>";
                    }
                    echo "\t</tr>\n";
                }
                
                echo "\t<tr>\n";
                
                for ($row = 0; $row < $num; $row++) {
                    
                    if ( ( $row + 1) != $num ){
                        $col_data = explode(' ', $data[$row]);
                    }else{
                        $col_data = explode(';', $data[$row]);
                    }
                    
                    $col_count = count($col_data);
                    
                    if ( $row >= $this->bookMin && 
                         $row <= $this->bookMax
                        ){
                        
                    }else{
                        
                        if ( $index == 0 ){
                            echo "\t\t<th>\n";
                        }
                        else{
                            echo "\t\t<td>\n";
                        }
                    }
                    // Column Read
                    for ($col = 0; $col <= $col_count; $col++){
                        
                        $strValue = $this->convertToUTF8( $col_data[$col] );
                        
                        if ( $row >= $this->bookMin &&
                            $row <= $this->bookMax
                            ){
                                if ( $index != 0 && $strValue != ''){
                                    array_push($arrData, $strValue);
                                }
                                if ($index == 0 && $strValue != ''){
                                    array_push($arrTitle, $strValue);
                                }
                        }else{
                            
                            if ($index == 0)
                            {
                                echo "<b>";
                                echo $strValue;
                                echo "</b>";
                                
                                if ($strValue != ''){
                                    array_push($arrHeader, $strValue);
                                }
                            }
                            else{
                                
                                    echo $strValue . "&nbsp";
                            }
                        }
                        
                    }
                    
                    
                    if ( $row >= $this->bookMin &&
                        $row <= $this->bookMax
                        )
                    {}
                        else{
                        
                        if ( $index == 0 ){
                            echo "\t\t</th>\n";
                        }
                        else{
                                echo "\t\t</td>\n";
                        }
                    }
                    
                }
                echo "\t</tr>\n";
                
                $arrCount = sizeof($arrData);
                
                // 예상 시뮬레이션 출력
                if ( $arrCount == ( $this->bookMax - $this->bookMin ) ){
                    
                    echo "\t<tr>\n";
                    foreach ( $arrTitle as $arrVal ){
                    
                        echo "<th colspan=\"6\">";
                        echo "<b>$arrVal</b";
                        echo "</th>";
                    }
                    echo "\t</tr>\n";
                    
                    
                    echo "\t<tr>\n";
                    
                    foreach ( $arrData as $arrVal ){
                                                
                        echo "<td colspan=\"6\">";
                        echo $arrVal;
                        echo "</td>";
                        array_pop($arrData);
                    }
                    
                    echo "\t</tr>\n";
                }
                
                $index++;
            }
            echo "</table>\n";
            
            fclose($handle);
        }
        
    }
    
    // CSV To Viewer
    public function csvToViewer($file){
        
        ini_set("allow_url_fopen", 0);
        
        $row = 1;
        
        if (($handle = fopen("$file", "r")) !== FALSE) {
            
            echo "<table class=\"tg_general\">";
            
            $index = 0;
            
            while (($data = fgetcsv($handle, 4096, ",")) !== FALSE) {
                
                $num = count($data);
                
                echo "\t<tr>\n";
                for ($row = 0; $row < $num; $row++) {
                    
                    if ( ( $row + 1) != $num ){
                        $col_data = explode(' ', $data[$row]);
                    }else{
                        $col_data = explode(';', $data[$row]);
                    }
                    
                    $col_count = count($col_data);
                    
                    if ( $index == 0 ){
                        echo "\t\t<th>\n";
                    }
                    else{
                        echo "\t\t<td>\n";
                    }
                    // Column Read
                    for ($col = 0; $col <= $col_count; $col++){
                        
                        $strValue = $this->convertToUTF8( $col_data[$col] );
                        if (strpos( $col_data[$col], "://" ) != false){
                            echo "<a href=\"$strValue\" target=\"_blank\">";
                            echo $strValue;
                            echo "</a>";
                        }
                        else if (strpos( $col_data[$col], "pub/" ) != false){
                            echo "<a href=\"$strValue\" target=\"_blank\">";
                            echo $strValue;
                            echo "</a>";
                        }
                        else{
                            if ($index == 0)
                            {
                                echo "<b>";
                                echo $strValue;
                                echo "</b>";
                            }
                            else{
                                echo $strValue . "&nbsp";
                            }
                            
                        }
                        
                    }
                    if ( $index == 0 ){
                        echo "\t\t</th>\n";
                    }
                    else{
                        echo "\t\t</td>\n";
                    }
                    
                }
                echo "\t</tr>\n";
                $index++;
            }
            echo "</table>\n";
            
            fclose($handle);
        }
        
    }
    
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