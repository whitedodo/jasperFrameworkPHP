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
      <span>
      안녕하세요, 재스퍼 홈페이지에 오신 것을 환영합니다.<br>
      <br>
      안녕하세요. 저는 제스퍼입니다.<br>
      나는 나에게 물어봅니다. 훌륭한 엔지니어가 될 것이냐 혹은 실사구시 엔지니어가 될 것이냐를 물어봅니다.<br>
      내가 생각하는 엔지니어라는 것은 구현도 중요하고 설계도 중요하나 경제성이 있어야 한다고 봅니다.<br>
      아무리 좋은 기법도 경제적 가치가 없다면, 의미가 없게 됩니다.<br>
      나는 공학적인 지식을 풍부하게 갖추고자 많은 노력을 하고 있습니다.<br>
      나의 자세한 이력 등은 CV와 Resume에서 찾아보실 수 있습니다.
      <br><br>
      </span>
      <h4>English(영어)</h4>
      <span>
      Hello, Welcome to Jasper's Homepage.<br>
      Hello. My name is Jasper.<br>
      I ask myself. Whether it will be a good engineer or a real engineer.<br>
      I think that the engineer that I think is important for the implementation,<br>
      the design is important, but it should be economical.<br>
      If no good technique is economically valuable, it becomes meaningless.<br>
      I have a lot of effort to enrich my engineering knowledge.<br>
      My detailed history can be found in CV and Resume.
      <br><br>
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
      (Korean)/(한글)<br>
      1. 저작권을 표시했습니다.
      <br>- 카피 레프트, 저작권 등이 표시됩니다.<br>
      </span>
      <br>
      (English)/(영어)<br>
      <span>
      1. I have marked the copyright.<br>
      &nbsp;&nbsp;&nbsp;- Copyleft, Copyright, etc. are displayed.<br>
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
      <span><a href="mailto:rabbit.white@daum.net">rabbit.white at daum dot net</a>
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
        <span><a href="http://gokit.kumoh.ac.kr/~s20101215">Links(Gokit) - (Not Operating 2018-08-01)</a></span><br>
        <span><a href="../board/list.php?name=story" target="_blank">Links(Board)</a></span><br>
      </div>
    </td>
  </tr>
</table>