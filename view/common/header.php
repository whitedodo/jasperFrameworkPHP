<!DOCTYPE html>
<html lang="ko">
<head>
<title><?php echo $title;?> - Jasper's Homepage</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="title" content="Jasper's Homepage">
<meta name="description" content="Meta 입력">
<meta name="keywords" content="키워드 입력">
<meta name="author" content="저자 입력" > 
<meta property="og:type" content="website" > 
<meta property="og:title" content="제목 입력" > 
<meta property="og:description" content="설명 입력" >

<link rel="stylesheet" type="text/css" href="<?php echo $skin_dir; ?>/css/mystyle.css">
<script src="<?php echo $skin_dir; ?>/script/myscripts.js"></script>

</head>
<body>

<?php if ( $pageName != 'index' ){ ?>
	<p style="font-size:12px;font-weight:bold;"><a href="<?php echo "/" . $this->getUserDir(); ?>">Home(홈)</a></p>

<?php } ?>