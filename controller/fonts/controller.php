<?php

/*
 * Subject: My Homepage
 * FileName: controller.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 * 2018-08-15 / Jasper / Font 기능 개선
 *
 */

class Fonts{
    
    private $typeMin = 1;
    private $typeMax = 2;
    
    private $fontList;
    private $url;
    private $port;
    
    public function __construct($url, $port){
        
        $this->setURL($url);
        $this->setPort($port);
        $this->fontList = array(
            'Nanum Gothic' => 'Nanum Gothic');
        
    }
    
    public function getURL(){
        return $this->url;
    }
    
    public function getPort(){
        return $this->port;
    }
    
    public function setURL($url){
        $this->url = $url;
    }
    
    public function setPort($port){
        $this->port = $port;
    }
    
    public function createFont($directories){
        
        $index = $this->fontMin;
        $max = $this->fontMax;
        
        $type = 2;  // 자바스크립트, CSS
        $iUrl = $this->getURL();
        $iPort = $this->getPort();
        
        while ($index <= $max ){
            
            $j = 1;
            
            while ( $j <= $type ){
                
                switch($j){
                    
                    // CSS
                    case 1:
                        
                        $lstFont = $this->fontList;
                        
                        foreach ( $lstFont as $varFont ){
                            
                            $fontName = strtolower($varFont);
                            $fontName = str_replace(" ", "", $fontName);
                            
                            $myfile = fopen( "$directories/fonts/earlyaccess/$fontName.css", "w") or die("Unable to open file!");
                            $txt = $this->getStyles($varFont, $iUrl, $iPort);
                            fwrite($myfile, $txt);
                            fclose($myfile);
                        }
                        
                        break;
                        
                    case 2:
                        
                        $lstFont = $this->fontList;
                        
                        $myfile = fopen( "$directories/fonts/scripts.js", "w") or die("Unable to open file!");
                        $txt = $this->getScripts($lstFont, $iUrl, $iPort);
                        fwrite($myfile, $txt);
                        
                        fclose($myfile);
                        
                        break;
                        
                }
                
                $j++;
            }
            
            $index++;
        }
    }
    
    public function getStyles($fontName, $url, $port){
        
        $font = "";
        
        // 나눔고딕 폰트 여부
        if ( strcmp($fontName, "Nanum Gothic") == 0 ){
            
            $font = "@font-face {\n";
            $font = $font . "font-family: 'Nanum Gothic';\n";
            $font = $font . "font-style: normal;\n";
            $font = $font . "font-weight: 400;\n";
            
            if ( $port == 80){
                $font = $font . "src: local('NanumGothic'), url('http://$url/fonts/nanumgothic/v9/PN_3Rfi-oW3hYwmKDpxS7F_D-djY.woff') format('woff');\n";
            }else if ( $port == 443 ){
                $font = $font . "src: local('NanumGothic'), url('https://$url/fonts/nanumgothic/v9/PN_3Rfi-oW3hYwmKDpxS7F_D-djY.woff') format('woff');\n";
            }
            else{
                $font = $font . "src: local('NanumGothic'), url('http://$url:$port/fonts/nanumgothic/v9/PN_3Rfi-oW3hYwmKDpxS7F_D-djY.woff') format('woff');\n";
            }
                
            $font = $font . " }\n\n";
            
            $font = $font . "@font-face {\n";
            $font = $font . "font-family: 'Nanum Gothic';\n";
            $font = $font . "font-style: normal;\n";
            $font = $font . "font-weight: 700;\n";
            
            if ( $port == 80){
                $font = $font . "src: local('NanumGothic Bold'), local('NanumGothic-Bold'), url('http://$url/fonts/nanumgothic/v9/PN_oRfi-oW3hYwmKDpxS7F_LQv3LyVsg.woff') format('woff');\n";
            }else if ( $port == 443 ){
                $font = $font . "src: local('NanumGothic Bold'), local('NanumGothic-Bold'), url('https://$url/fonts/nanumgothic/v9/PN_oRfi-oW3hYwmKDpxS7F_LQv3LyVsg.woff') format('woff');\n";
            }else{
                $font = $font . "src: local('NanumGothic Bold'), local('NanumGothic-Bold'), url('http://$url:$port/fonts/nanumgothic/v9/PN_oRfi-oW3hYwmKDpxS7F_LQv3LyVsg.woff') format('woff');\n";
            }
            
            $font = $font . "}\n";
            
            $font = $font . "@font-face {\n";
            $font = $font . "font-family: 'Nanum Gothic';\n";
            $font = $font . "font-style: normal;\n";
            $font = $font . "font-weight: 800;\n";
            
            if ( $port == 80 ){
                $font = $font . "src: local('NanumGothic ExtraBold'), local('NanumGothic-ExtraBold'), url('http://$url/fonts/nanumgothic/v9/PN_oRfi-oW3hYwmKDpxS7F_LXv7LyVsg.woff') format('woff');\n";
            }else if ( $port == 443){
                $font = $font . "src: local('NanumGothic ExtraBold'), local('NanumGothic-ExtraBold'), url('https://$url/fonts/nanumgothic/v9/PN_oRfi-oW3hYwmKDpxS7F_LXv7LyVsg.woff') format('woff');\n";
            }else{
                $font = $font . "src: local('NanumGothic ExtraBold'), local('NanumGothic-ExtraBold'), url('http://$url:$port/fonts/nanumgothic/v9/PN_oRfi-oW3hYwmKDpxS7F_LXv7LyVsg.woff') format('woff');\n";
            }
            
            $font = $font . "}\n";
        }
        
        return $font;
    }
    
    public function getScripts($lstFont, $url, $port){
        
        $font = "WebFontConfig = {\n";
        // 폰트 반복
        $font = $font . "custom: {\n";
        
        $count = count($lstFont); 
        $index = 1;
        
        // 폰트 생성
        foreach ($lstFont as $varFont){
            
            $fontName = strtolower($varFont);
            $fontName = str_replace(" ", "", $fontName);
            
            $font = $font . "families: ['$varFont'],\n";
            if ( $port == 80 ){
                $font = $font . "urls: ['http://$url/fonts/earlyaccess/$fontName.css']\n";
            }
            else if ( $port == 443 ){
                $font = $font . "urls: ['https://$url/fonts/earlyaccess/$fontName.css']\n";
            }
            else{
                $font = $font . "urls: ['http://$url:$port/fonts/earlyaccess/$fontName.css']\n";
            }
            
            $font = $font . "\t\t";
            $font = $font . "}";
            
            if ( $index != $count ){
                $font = $font . ",";
            }
            
            $index++;
        }
            
        $font = $font . "\n";
        
        $font = $font . "};";
        $font = $font . "\n";
        $font = $font . "(function() {";
        $font = $font . "\n";
        $font = $font . "\t\tvar wf = document.createElement('script');";
        $font = $font . "\n";
        $font = $font . "\t";
        $font = $font . "wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + \n";
        if ( $port == 80 ){
            $font = $font . "    '://$url/fonts/earlyaccess/webfont/1.4.10/webfont.js';";
        }else if ( $port == 443 ){
            $font = $font . "    '://$url/fonts/earlyaccess/webfont/1.4.10/webfont.js';";
        }else{
            $font = $font . "    '://$url:$port/fonts/earlyaccess/webfont/1.4.10/webfont.js';";
        }
        
        $font = $font . "\n";
        $font = $font . "    wf.type = 'text/javascript';";
        $font = $font . "\n";
        $font = $font . "    wf.async = 'true';";
        $font = $font . "\n";
        $font = $font . "    var s = document.getElementsByTagName('script')[0];";
        $font = $font . "\n";
        $font = $font . "    s.parentNode.insertBefore(wf, s);";
        $font = $font . "\n";
        $font = $font . "\t\t";
        $font = $font . "})();";
        
        return $font;
        
    }
    
}


?>