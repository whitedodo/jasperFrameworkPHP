<?php
/*
 * Subject: My Homepage
 * FileName: index.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description: 
 * 2018-08-15 / Jasper / Server Port 기능 추가
 * 2018-08-15 / Jasper / 폰트 생성 기능
 */

header("Content-Type: text/html; charset=UTF-8");
header('X-Frame-Options: DENY');  // 'X-Frame-Options'

require_once 'function.php';

$function = new JasperFunction();

$pageName = $function->convertToUTF8( $_GET['pageName'] );
$subName = $function->convertToUTF8( $_GET['subName'] );
$id = $_GET['id'];

$root = ""; // 실제 경로 입력
$directories = '';    // 사용자 디렉토리일 떄 입력

$rootDir = $function->getDirectories($root, $directories);
$serverURL = $_SERVER["SERVER_NAME"];
$serverPort = $_SERVER["SERVER_PORT"];

require_once $rootDir . "/model/homepage/pageList.php";
require_once $rootDir . "/model/homepage/pageInfo.php";
require_once $rootDir . "/model/homepage/footer.php";
require_once $rootDir . "/controller/homepage/controller.php";
require_once $rootDir . "/controller/fonts/controller.php";

$pageInfo = new PageInfo($pageName, $subName, $id );

$font = new Fonts($serverURL, $serverPort);
$font->createFont($root);

$myHome = new Homepage( $root, $directories, $serverPort );
$myHome->setPageInfo($pageInfo);
$myHome->getHomepage( );


?>