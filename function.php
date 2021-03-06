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
    
    private $fontMin = 1;
    private $fontMax = 1;
    
    private $univMin = 18;
    private $univMax = 21;
    
    private $houseMin = 14;
    private $houseMax = 16;
    
    // CSV To Viewer(House)
    function csvToHousePay($file){
        
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
                    
                    if ( $row >= $this->houseMin &&
                        $row <= $this->houseMax
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
                        
                        if ( $row >= $this->houseMin &&
                            $row <= $this->houseMax
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
                                
                                echo $strValue . "&nbsp;";
                            }
                        }
                        
                    }
                    
                    
                    if ( $row >= $this->houseMin &&
                        $row <= $this->houseMax
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
                if ( $arrCount == ( $this->houseMax - $this->houseMin ) ){
                    
                    echo "\t<tr>\n";
                    foreach ( $arrTitle as $arrVal ){
                        
                        echo "<th colspan=\"7\">";
                        echo "<b>$arrVal</b>";
                        echo "</th>";
                    }
                    echo "\t</tr>\n";
                    
                    echo "\t<tr>\n";
                    
                    foreach ( $arrData as $arrVal ){
                        
                        echo "<td colspan=\"7\">";
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
                    
                    if ( $row >= $this->univMin && 
                         $row <= $this->univMax
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
                        
                        if ( $row >= $this->univMin &&
                            $row <= $this->univMax
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
                                
                                    echo $strValue . "&nbsp;";
                            }
                        }
                        
                    }
                    
                    
                    if ( $row >= $this->univMin &&
                        $row <= $this->univMax
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
                if ( $arrCount == ( $this->univMax - $this->univMin ) ){
                    
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
                            
                            $targetURL = $_SERVER["PHP_SELF"];
                            
                            // 사용자 디렉토리 호스트 사용자
                            if ( strpos ( $targetURL, "~") != false &&
                                $col_data[$col] != ''){
                                
                                $targetURL = explode("/", $targetURL);
                                $targetVal = explode("/", $strValue);
                                
                                $strLink = ''; // 초기화
                                
                                $tId = 0;
                                foreach ( $targetURL as $tarURL ){
                                    if ($tId == 0){}else{
                                        $strLink = $$strLink . $tarURL . "/";
                                    }
                                    $tId++;
                                }
                                
                                $strLink = $strLink . "?pageName=file&subName=" . $targetVal[2];
                                
                                echo "<a href=\"$strLink\" target=\"_blank\">";
                                echo $strValue;
                                echo "</a>";
                                
                            }
                            // 일반 사용자
                            else{
                                
                                $targetURL = $_SERVER["PHP_SELF"];
                                $targetURL = explode("/", $targetURL);
                                $strLink = ''; 
                                
                                $tId = 0;
                                foreach ( $targetURL as $tarURL ){
                                    
                                    if ( ($tId + 1) != count($targetURL) ){
                                        $strLink = $strLink . $tarURL;
                                    }
                                        
                                    $tId++;
                                }
                                
                                if ( count($targetURL) > 2 ){
                                    $strLink = "/". $strLink . $strValue;
                                }else{
                                    $strLink = $strLink . $strValue;
                                }
                                
                                
                                echo "<a href=\"$strLink\" target=\"_blank\">";
                                echo $strValue;
                                echo "</a>";
                            }
                        }
                        else{
                            if ($index == 0)
                            {
                                echo "<b>";
                                echo $strValue;
                                echo "</b>";
                            }
                            else{
                                echo $strValue . "&nbsp;";
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
    
    // 스킨 경로 가져오기
    public function getSkinDir($userDir, $port){
        
        // 버그 개선
        //echo $userDir;
        
        if ($userDir == ''){
            //echo "참1";
            return $userDir;
            
        }else if( $userDir == '.'){
            //echo "참2";
            return $userDir;
            
        }else if ( strpos ($userDir, "~") == 0){
            
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
            $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            
            if ( $port == 80 || $port == 443 ){
                return $protocol . $_SERVER["SERVER_NAME"] . "/" . $userDir;
            }else{
                return $protocol . $_SERVER["SERVER_NAME"] . $port . "/" . $userDir;
            }
        }
        else{
            
            return "/" . $userDir;
        }
        
    }
    
    // URL 루트경로 가져오기
    public function getURLDir($skin_dir, $user_dir){
        
        $strDir = $_SERVER["SCRIPT_FILENAME"];
        
        $root_dir = str_replace($user_dir, "", $skin_dir);
        
        if ( strpos( $root_dir, '/') == true ){            
            $root_dir = str_replace("://", ":**", $root_dir);
            $root_dir = str_replace("/", "", $root_dir);
            $root_dir = str_replace(":**", "://", $root_dir);
        }
        
        if ( strpos( $user_dir, '~') !== false ){
            $root_dir = $root_dir . "/" . $user_dir;
        }
        
        return $root_dir;
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