<?php
/*
 * Subject: My Homepage
 * FileName: index.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 *
 */
?>

<h2>Welcome to My Jasper(MVC)</h2>
<hr>
<table class="tg_general">
  <tr>
    <th style="width:20%;">
    	<span style="font-weight:bold;">메뉴(Menu)</span>
    </th>
    <th>
    	<span style="font-weight:bold;">제스퍼(Jasper)</span>
    </th>
  </tr>
  <tr>
  	<td>
        <?php 
            $this->getTreeCategories( NULL, 'wide' );
        ?>
  	</td>
  	<td>
  		
        <table class="tg_general" style="width:40%;">
          <tr>
            <td class="tg-031e" style="font-size:14px; color:#333;">
                <img src="<?php echo $skin_dir;?>/images/jasper_home.png" alt="Jasper's Home" />
            </td>
          </tr>
          <tr>
            <td class="tg-031e" style="background-color:#e2e2e2;">
                <span style="font-weight:bold;">작품명: 나무 / 제스퍼</span>
                <br>
                <span style="font-weight:bold;">Tree / Jasper </span>
            </td>
          </tr>
    	</table>
  	</td>
  </tr>
</table>