<?php
/*
 * Subject: My Homepage
 * FileName: profile.php
 * Created by 2018-08-07
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 *
 */
?>
<h2>Jasper's Homepage</h2>
<hr>
<!-- 소개-->
<table class="tg_introduce">
  <tr>
  	<th class="tg-nknw" style="text-align:center">	
  		<b>메뉴(Menu)</b>
  	</th>
    <th class="tg-nknw" colspan="2" style="text-align:center">
    	<b>소개(My Introduce)</b>
    </th>
  </tr>
  
  <tr>
    <td class="tg-031e" style="width:15%;vertical-align:middle;">
        <?php 
            $this->getTreeCategories( 2, 2 );
        ?>
    </td>
    <td class="tg-031e" style="width:15%;vertical-align:middle;">
      <img src="<?php echo $skin_dir;?>/images/180624-jaspers.png" alt="Jasper's">
    </td>
    <td class="tg-031e" style="vertical-align:middle;">
      <div style="text-align:left">
      <h4>Korean(한국어)</h4>
      </span>
      </div>
    </td>
  </tr>  
  <tr>
    <td class="tg-031e" style="background-color:#e2e2e2;">
      <span style="font-size:12px">
      <b>
      사이트의 특징<br>
      (Features of the site)</b>
      </span>
    </td>
    <td class="tg-031e" colspan="2">
      <div style="text-align:left">
      <span>
      </span>
      </div>
    </td>
  </tr>  
  <tr>
    <td class="tg-031e" style="background-color:#e2e2e2;">
      <span style="font-size:12px">
      <b>
      특이사항<br>
      (Description)</b>
      </span>
    </td>
    <td class="tg-031e" colspan="2">
      <div style="text-align:left">
        <span></span>
      </div>
    </td>
  </tr>  
  <tr>
    <td class="tg-031e" style="background-color:#e2e2e2;">
      <span style="font-size:12px">
      <b>
      이메일<br>
      (E-mail)</b>
      </span>
    </td>
    <td class="tg-031e" colspan="2">
      <div style="text-align:left">
      <span><a href="mailto:"></a>
      </span>
      </div>
    </td>
  </tr>
  <tr>
    <td class="tg-031e" style="background-color:#e2e2e2;">
      <span style="font-size:12px">
      <b>
      내 사이트 소개<br>
      (My Website)</b>
      </span>
    </td>
    <td class="tg-031e" colspan="2">
      <div style="text-align:left">
        <span></span><br>
        <span></span><br>
      </div>
    </td>
  </tr>
</table>
