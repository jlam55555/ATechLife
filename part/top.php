<?php
	function ini($title, $number) {
?>
	<!DOCTYPE html>
	<HTML>
		<HEAD>
			<TITLE><?= $title ?></TITLE>
			<META charset="utf-8" />
			<META name="description" content="Jonathan Lam's Lens project: Show the quick assimilation of technologies into society using data from a survey." />
			<META name="keywords" content="Jonathan Lam, lens, project, technology, assimilation, incorporation, integration" />
			<META name="author" content="Jonathan Lam" />
			<LINK rel="stylesheet" type="style/css" href="res/style.css" />
			<SCRIPT src="res/script.js"></SCRIPT>
		</HEAD>
		<BODY>
			<DIV id="header">
				<A href="index.php" style="text-decoration: none;"><H1>A Tech Life</H1></A>
				<H3>A Lens Artifact Project By Jonathan Lam</H3>
				<NAV>
					<?php
						echo ($number == 1) ? '<SPAN id="this_page_link">Home</SPAN>' : '<A href="index.php">Home</A>';
						echo ($number == 2) ? '<SPAN id="this_page_link">Survey</SPAN>' : '<A href="survey.php">Survey</A>';
						echo ($number == 3) ? '<SPAN id="this_page_link">About</SPAN>' : '<A href="about.php">About</A>';
					?>
				</NAV>
			</DIV>
<?php
	}
?>