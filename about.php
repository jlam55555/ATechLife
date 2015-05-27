<?php include "part/top.php"; ini("A Tech Life | About",3) ?>
	<H2>About this Project</H2>
	<H6>If you have not filled out the survey (and are from Joel Barlow High School, please fill out the <A href="survey.php">survey</A> so that data can be obtained.)</H6>
	<P>Ever thought about living without the Internet? Without social media? Without smart, ulra-small devices? Although these technologies are very new (within the last few years), they have been well-integrated into society throughout the world. My project is not focused on the world, but on our little modern community of Easton and Redding in the United States, a prime example of this idea. I've created a simple program to (hopefully) display the tight incorporation of some modern technologies into our lives &mdash; and not only in a positive way.</P>
	<P>I've created a short survey of 16 questions to ask about three basic ideas of our current "Digital Age": social media, the Internet, and "smart" devices. To relate to my Lens, these are all new and interconnected technologies with very apparent and important purposes, that allowed them to become as popular and common as they are today.</P>
	<P>
		My thesis for the project goes as follows:
			<BLOCKQUOTE>New technological advances always begin as insignificant desires to improve or make more convenient one small aspect of life, but the technologies quickly assimilate into a community or civilization: they become indispensable and take on a role in society, even if they weren’t in existence only a few years before. They not only become items tightly wrapped into society, difficult to let go of; common technological devices can also become similar to our basic needs of food and shelter in the way that they become a requirement to surviving and thriving in a more complex society.</BLOCKQUOTE>
		Although somewhat obvious, it has been shown in society time and time again.  For further details on the project, here is a link to my full <A href="https://docs.google.com/document/d/1Ue7WS1qCxH6gftlLqwuHSxiR3SFW1qWz1oJ2fsTisY4" target="_blank">Lens paper</A>.
	</P>
	<P>Feel free to share this &mdash; I need more data! So far, I have <?php
		$xml = simplexml_load_file("data/data.xml");
		$x = 0;
		foreach($xml->POINT as $point)
			$x++;
		echo $x;
		?> survey submissions, but I am looking for at least 25. My presentation will be on Tuesday, June 2nd.</P>
	<CANVAS id="survey_num" height="300" width="300">Your browser does not support the &lt;canvas&gt; element. Get a new browser that supports the newest web protocols, such as Google Chrome, Internet Explorer, Safari, or Mozilla Firefox.</CANVAS>
	<SPAN id="cite">Chart script courtesy of <A href="http://www.chartjs.org" target="_blank">Chart.js</A>.</SPAN>
	<SCRIPT>
		// Pie chart script courtesy of Chart.js at http://www.chartjs.org/
		var submitted = <?= $x ?>;
		var total = 25;
		var ctx = document.getElementById("survey_num").getContext("2d");
		var left = (total > submitted) ? total - submitted : 0;
		var labelSubmitted =
			(total > submitted) ? "Submitted" :
			(total == submitted) ? "Reached goal of " :
			submitted + "Goal surpassed! Submitted";
		var labelLeft = "Submissions to go";
		var data = [
			{
				value: submitted,
				color: "#F7464A",
				highlight: "#FF5A5E",
				label: labelSubmitted
			},
			{
				value: left,
				color: "#46BFBD",
				highlight: "#5AD3D1",
				label: labelLeft
			}
		]
		var newChart = new Chart(ctx).Pie(data);
	</SCRIPT>
	<HR />
	<H2>About this Website</H2>
	<P>This is by no means a professional website. I made this from my basic programming knowledge, from the online tutorials common on the Internet.</P>
	<P>This could also relate to the thesis with the idea of the Internet, because it shows how much knowledge there is about web programming nowadays because of its enormous variety of applications, even the newer online styles and coding conventions, thus illustrating the speed of assimilation in relation to their level of productivity.</P>
	<P><SPAN style="font-family: pier_bold;color: red;">Disclaimer:</SPAN> Also, I only had a few hours to write this website this weekend and not much time to think, design, or plan. It is not perfect, I am a novel programmer, and I did not use one of the "build a website tools" (although it would have saved me a lot of time). Please don't attempt to hack the site, or spam the survey. Feel free to leave suggestions (or inform me of vulnerabilities if you see any) in the email provided below.</P>
<?php include "part/bottom.txt" ?>