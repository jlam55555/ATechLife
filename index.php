<?php include "part/top.php"; ini("A Tech Life | Home",1) ?>
	<?php
		if(isset($_GET["msg"]))
			if($_GET["msg"] == "success")
				echo "<SPAN style='font-family: pier_bold; color: red;'>Your submission was a success. It will be monitored later to check for spamming.</SPAN>";
	?>
	<H2>Diagrams</H2>
	<H6>If you have not filled out the survey (and are from Joel Barlow High School, please fill out the <A href="survey.php">survey</A> so that data can be obtained.)</H6>
	<HR />
	<H3 style="color: red; width: 100%; text-align: center;">This page is still a work in progress.<BR />More charts coming soon.</H3>
	<CANVAS id="completed" height="300" width="300">Your browser does not support the &lt;canvas&gt; element. Get a new browser that supports the newest web protocols, such as Google Chrome, Internet Explorer, Safari, or Mozilla Firefox.</CANVAS>
	<SPAN id="cite">Chart script courtesy of <A href="http://www.chartjs.org" target="_blank">Chart.js</A>.</SPAN>
	<SCRIPT>
		// Pie chart script courtesy of Chart.js at http://www.chartjs.org/
		var ctx = document.getElementById("completed").getContext("2d");
		var data = [
			{
				value: 95,
				color: "#F7464A",
				highlight: "#FF5A5E",
				label: "Percent Not Completed"
			},
			{
				value: 5,
				color: "#46BFBD",
				highlight: "#5AD3D1",
				label: "Percentage Completed"
			}
		]
		var newChart = new Chart(ctx).Pie(data);
	</SCRIPT>
<?php include "part/bottom.txt" ?>