<!-- TITLE -->
<?php $title = "TAHITI - Stéphane Ho Sik Chuen";?>
<!-- CONTENT -->
<?php ob_start();?>

    <!-- Board -->
        <div class="container">
		<ul class="ul_board">
			<li class="li_board"><a class="a_board" href=./board_bchevallier>Baptiste Chevallier</a></li>
			<li class="li_board"><a class="a_board_active" href=./board_shosik>Stéphane Ho Sik Chuen</a></li>
			<li class="li_board"><a class="a_board" href=./board_tgoward>Thomas Goward</a></li>
			<li class="li_board"><a class="a_board" href=./board_mpetit>Mikaël Petit</a></li>
			<li class="li_board"><a class="a_board" href=.board_gpomme>Gaël Pommé</a></li>
		</ul>
	</div>
	<!-- /Board-->

	<!-- Stéphane -->
	<div class="container">
		<h2 class="text-center top-space">Stéphane Ho Sik Chuen</h2>
		<h3 class="text-center top-space">开发人员</h3>
        <a href="./board_shosik"><img src="assets/img/shosik.jpg" alt="Stéphane Ho Sik Chuen" title="Stéphane Ho Sik Chuen" class="float_img" /></a> <br>
		<p class="text-muted">
			<h2>大学课程</h2><br>
			- 图尔大学硕士2大数据管理与分析[图尔（41）]<br>
			-  INSA中心Val de Loire的工程师学生[布洛瓦（41）]<br>
			- LycéeHonorédeBalzac物理化学预备班[巴黎（75）]<br>
			<br>
			<h2>技能和兴趣</h2><br>
			- 编程：<i>Python, C, HTML, JavaScript</i><br>
			- 体育活动<br>
			<br>
			<h2>项目</h2><br>
			<i>已完成</i><br>
			- 机器人俱乐部成员[INSA CVL]<br>
			- 技术中心管理员[INSA CVL]<br>
			<br>
			<i>来吧</i><br>
			- 美国软件工程专业
			<br>
		</p>
		<h2><a href="https://www.linkedin.com/in/st%C3%A9phane-ho-sik-chuen-908b97130/"><i class="fa fa-linkedin"></i></a></h2>
	</div>


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>	