<?php
/*
 * Subject: My Homepage
 * FileName: index.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description: 
 * 
 */

header("Content-Type: text/html; charset=UTF-8");
header('X-Frame-Options: DENY');  // 'X-Frame-Options'

require_once 'function.php';

$function = new JasperFunction();

$pageName = $function->convertToUTF8( $_GET['pageName'] );
$subName = $function->convertToUTF8( $_GET['subName'] );
$id = $_GET['id'];

$root = "/usr7/student/s20101215/www_home";
$directories = '~s20101215';
$rootDir = $function->getDirectories($root, $directories);

require_once $rootDir . "/model/homepage/pageList.php";
require_once $rootDir . "/model/homepage/pageInfo.php";
require_once $rootDir . "/controller/homepage/controller.php";
require_once $rootDir . "/controller/homepage/footer.php";

$pageInfo = new PageInfo($pageName, $subName, $id );

$myHome = new Homepage( $root, $directories );
$myHome->setPageInfo($pageInfo);
$myHome->getHomepage( );

?>