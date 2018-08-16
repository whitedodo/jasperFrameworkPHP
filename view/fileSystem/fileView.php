<?php 

/*
 * Subject: My Homepage
 * FileName: controller.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 * 2018-08-16 / Jasper / 기능개선 $DIR_PATH 보완
 *
 */

?>
<?php
  $index = 1;
  $DIR_PATH =  "$root_dir/pub/$subName";
?>
<?php
  function formatSize($bytes, $decimals = 2) {
    $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
  }
?>

<h2><?php echo $title;?> - Filelist</h2>
<hr>
<table class="tg_general">
  <tr>
      <td style="width:7%;">번호(Num)
      </td>
      <td style="width:7%;">유형(Type)
      </td>
      <td style="width:30%;">파일명
	  </td>
      <td style="width:15%;">파일크기(By Date)
      </td>
	  <td style="width:15%;">작성일자(By Date)
      </td>
	  <td>비고(Description)
	  </td>
    </tr>
<?php

if(is_dir($DIR_PATH)) {

	if($dh = opendir($DIR_PATH)) {
		while(($file = readdir($dh)) !== false) {

			if ($file == "." || $file == "..") {
				continue;
			}
			
			$file = $jFunction->convertToUTF8($file);
			$_file = $DIR_PATH. "/" . $file;
						
            $_filename = $file;
            
			if( is_file($_file) ) {
                $_link = str_replace("index.php", "javascript:history.go(-1);", $_filename);
                $_filename = str_replace("index.php", "..", $_filename);
                $_filename = $jFunction->convertToUTF8($_filename);
?>
    <tr>
      <td><?php echo $index++; ?>
      </td>
      <td>
        <?php echo "<img src=\"$skin_dir/images/folder.png\" width=\"15\" height=\"15\" alt=\"Icon\">"; ?>
      </td>
      <td>
		<?php echo "<a href ='" . $_link . "'>".$_filename."</a>"; ?>
	  </td>
      <td>
       	<?php echo formatSize(filesize($_file)); ?>
      </td>
	  <td>
		<?php echo date ("F d Y H:i:s.", filemtime($_file)); ?>
	  </td>
	   <td>
	   </td>
    </tr>
<?php
			}

		}

		closedir($dh);

	}

}
?>
</table>