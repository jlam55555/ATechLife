<?php include "part/top.php"; ini("A Tech Life | Home",1) ?>
	<?php
		if(isset($_GET["msg"]))
			if($_GET["msg"] == "success")
				echo "<SPAN style='font-family: pier_bold; color: red;'>Your submission was a success. It will be monitored later to check for spamming.</SPAN>";
	?>
	<H2>Diagrams</H2>
	<H6>If you have not filled out the survey (and are from Joel Barlow High School, please fill out the <A href="survey.php">survey</A> so that data can be obtained.)</H6>
	<H2 style="color: red;">This page is still a work in progress. Hopefully it will be done by Wednesday or Thursday. For now, please complete the survey.</H2>
<?php include "part/bottom.txt" ?>