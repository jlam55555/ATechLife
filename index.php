<?php include "part/top.php"; ini("A Tech Life | Home",1) ?>
	<?php
		if(isset($_GET["msg"]))
			if($_GET["msg"] == "success")
				echo "<SPAN style='font-family: pier_bold; color: red;'>Your submission was a success. It will be monitored later to check for spamming.</SPAN>";
	?>
	<H2>Diagrams</H2>
	<H6>If you have not filled out the survey (and are from Joel Barlow High School, please fill out the <A href="survey.php">survey</A> so that data can be obtained.)</H6>
	<HR />
	<DIV id="container">
	<DIV id="cover">
		LOADING...
	</DIV>
	<?php
		$data = simplexml_load_file("data/data.xml");
	?>
	<H2>Social Media</H2><!--
	--><DIV id="sm_1_div" class="chart_div">
		<H3>Use Social Media</H3>
		<CANVAS id="sm_1" height="300" width="300"></CANVAS>
		<BR />
		<SELECT onchange="change_sm_1(this.value)">
			<OPTION value="all">All</OPTION>
			<OPTION value="fb">Facebook</OPTION>
			<OPTION value="tw">Twitter</OPTION>
			<OPTION value="in">Instagram</OPTION>
		</SELECT>
		<SCRIPT>
			Chart.defaults.global.animationEasing = "easeInOutQuint";
			Chart.defaults.Pie.animationEasing = "easeInOutQuint";
			Chart.defaults.PolarArea.animationEasing = "easeInOutQuint";
			var myPieChart;
			function change_sm_1(sm_site) {
				var sm_1_on;
				var sm_1_off;
				switch(sm_site) {
					case "all":
						<?php
							$sm_1_on = 0;
							$sm_1_off = 0;
							foreach($data->POINT as $datapoint)
								($datapoint->SM_1 == "on") ? $sm_1_on++: $sm_1_off++;
						?>
						sm_1_on = <?= $sm_1_on ?>;
						sm_1_off = <?= $sm_1_off ?>;
						sm_name = "All";
						break;
					case "fb":
						<?php
							$sm_1_on = 0;
							$sm_1_off = 0;
							foreach($data->POINT as $datapoint)
								($datapoint->SM_3_FB == "on") ? $sm_1_on++: $sm_1_off++;
						?>
						sm_1_on = <?= $sm_1_on ?>;
						sm_1_off = <?= $sm_1_off ?>;
						sm_name = "Facebook";
						break;
					case "tw":
						<?php
							$sm_1_on = 0;
							$sm_1_off = 0;
							foreach($data->POINT as $datapoint)
								($datapoint->SM_3_TW == "on") ? $sm_1_on++: $sm_1_off++;
						?>
						sm_1_on = <?= $sm_1_on ?>;
						sm_1_off = <?= $sm_1_off ?>;
						sm_name = "Twitter";
						break;
					case "in":
						<?php
							$sm_1_on = 0;
							$sm_1_off = 0;
							foreach($data->POINT as $datapoint)
								($datapoint->SM_3_IN == "on") ? $sm_1_on++: $sm_1_off++;
						?>
						sm_1_on = <?= $sm_1_on ?>;
						sm_1_off = <?= $sm_1_off ?>;
						sm_name = "Instagram";
						break;
				}
				var data = [
					{
						value: sm_1_on,
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "Use " + sm_name
					},
					{
						value: sm_1_off,
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "Don't use " + sm_name
					}
				]
				var ctx = document.getElementById("sm_1").getContext("2d");
				ctx.clearRect(0, 0, ctx.width, ctx.height);
				myPieChart = new Chart(ctx).Pie(data);
			}
			change_sm_1("all");
		</SCRIPT>
	</DIV><!--
	--><DIV id="sm_2_div" class="chart_div">
		<H3># Social Media Sites Used</H3>
		<CANVAS id="sm_2" height="300" width="300"></CANVAS>
		<SCRIPT>
			<?php
				$sm_2_array;
				foreach($data->POINT as $datapoint)
					$sm_2_array[] = intval($datapoint->SM_2);
				sort($sm_2_array);
				$max = $sm_2_array[count($sm_2_array)-1];
				$sm_2_labels = "";
				$sm_2_data = "";
				for($i = 0; $i <= $max; $i++) {
					$sm_2_labels .= "$i, ";
					$num_in_i = 0;
					foreach($sm_2_array as $val)
						if($i == intval($val))
							$num_in_i++;
					$sm_2_data .= "$num_in_i, ";
				}
				$sm_2_labels = substr($sm_2_labels, 0, count($sm_2_labels)-3);
				$sm_2_data = substr($sm_2_data, 0, count($sm_2_data)-3);
			?>
			var data = {
				labels: [<?= $sm_2_labels ?>],
				datasets: [
					{
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "#00B5B5",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "#00B5B5",
						data: [<?= $sm_2_data ?>]
					}
				]
			};
			var ctx = document.getElementById("sm_2").getContext("2d");
			var myPieChart = new Chart(ctx).Bar(data);
		</SCRIPT>
	</DIV><!--
	--><DIV id="sm_4_div" class="chart_div">
		<H3>Numbers Using Social Media (Years)</H3>
		<CANVAS id="sm_4" width="750" height="500"></CANVAS>
		<BR />
		<SELECT onchange="draw_sm_4(this.value)">
			<OPTION value="total">Total</OPTION>
			<OPTION value="growth">Growth</OPTION>
		</SELECT>
		<SCRIPT>
			function draw_sm_4(display_type) {
				<?php
					$sm_4_array;
					foreach($data->POINT as $datapoint)
						if($datapoint->SM_1 != "off")
							$sm_4_array[] = intval($datapoint->SM_4);
					sort($sm_4_array);
					$min = $sm_4_array[0];
					$max = $sm_4_array[count($sm_4_array)-1];
					$sm_4_labels = "";
					$sm_4_data = "";
					$sm_4_data_growth = "";
					$total = 0;
					$last = 0;
					for($i = $min; $i <= $max; $i++) {
						$sm_4_labels .= "$i, ";
						foreach($sm_4_array as $val)
							if($i == intval($val))
								$total++;
						$sm_4_data .= "$total, ";
						$sm_4_data_growth .= ($total-$last) . ", ";
						$last = $total;
					}
					$sm_4_labels = substr($sm_4_labels, 0, count($sm_4_labels)-3);
					$sm_4_data = substr($sm_4_data, 0, count($sm_4_data)-3);
					$sm_4_data_growth = substr($sm_4_data_growth, 0, count($sm_4_data_growth)-3);
				?>
				var data_list = (display_type == "total") ? [<?= $sm_4_data ?>] : [<?= $sm_4_data_growth ?>];
				var data = {
					labels: [<?= $sm_4_labels ?>],
					datasets: [
						{
							fillColor: "rgba(220,220,220,0.5)",
							strokeColor: "#00B5B5",
							pointColor: "#009393",
							pointStrokeColor: "#fff",
							pointHighlightFill: "#fff",
							pointHighlightStroke: "#00B5B5",
							data: data_list
						}
					]
				};
				var ctx = document.getElementById("sm_4").getContext("2d");
				var myPieChart = new Chart(ctx).Line(data, {
					bezierCurve: false
				});
			}
			draw_sm_4("total");
		</SCRIPT>
	</DIV><!--
	--><HR />
	<H2>Internet</H2><!--
	--><DIV id="in_4_div" class="chart_div">
		<H3>The Internet as a Necessity</H3>
		<CANVAS id="in_4" width="300" height="300"></CANVAS>
		<SCRIPT>
			<?php
				$in_4_array;
				$in_4_on = 0;
				$in_4_off = 0;
				foreach($data->POINT as $datapoint)
					($datapoint->IN_4 == "on") ? $in_4_on++ : $in_4_off++;
			?>
			var data = [
				{
					value: <?= $in_4_on ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "I agree"
				},
				{
					value: <?= $in_4_off ?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "I disagree"
				},
			]
			var ctx = document.getElementById("in_4").getContext("2d");
			var myPieChart = new Chart(ctx).Pie(data);
		</SCRIPT>
	</DIV><!--
	--><DIV id="in_2_div" class="chart_div short">
		<H3>Time Spent on the Internet*</H3>
		<?php
			$in_2_array;
			foreach($data->POINT as $datapoint)
				$in_2_array[] = intval($datapoint->IN_2);
			sort($in_2_array);
			$length = count($in_2_array);
			$in_2_mean = round(array_sum($in_2_array)/$length);
			$in_2_median = ($length % 2 == 0) ?
				($in_2_array[$length/2] + $in_2_array[$length/2-1]) / 2 :
				$in_2_array[$length/2-1];
			$in_2_max = $in_2_array[$length-1];
			$in_2_up;
			foreach($in_2_array as $key => $val)
				if($val >= 120) {
					$in_2_up = $length - $key;
					break;
				}
		?>
		<H4>Average time: <?= $in_2_mean ?> minutes</H4>
		<H4>Median time: <?= $in_2_median ?> minutes</H4>
		<H4>Maximum time: <?= $in_2_max ?> minutes</H4>
		<H4>% over 120 minutes: <?= $in_2_up ?> people</H4>
	</DIV><!--
	--><DIV id="in_3_div" class="chart_div">
		<H3>Numbers Using Internet (Years)</H3>
		<CANVAS id="in_3" width="300" height="300"></CANVAS>
		<BR />
		<SELECT onchange="draw_in_3(this.value)">
			<OPTION value="total">Total</OPTION>
			<OPTION value="growth">Growth</OPTION>
		</SELECT>
		<SCRIPT>
			function draw_in_3(display_type) {
				<?php
					$in_3_array;
					foreach($data->POINT as $datapoint)
						$in_3_array[] = intval($datapoint->IN_3);
					sort($in_3_array);
					$min = $in_3_array[0];
					$max = $in_3_array[count($in_3_array)-1];
					$in_3_labels = "";
					$in_3_data = "";
					$in_3_data_growth = "";
					$total = 0;
					$last = 0;
					for($i = $min; $i <= $max; $i++) {
						$in_3_labels .= "$i, ";
						foreach($in_3_array as $val)
							if($i == intval($val))
								$total++;
						$in_3_data .= "$total, ";
						$in_3_data_growth .= ($total-$last) . ", ";
						$last = $total;
					}
					$in_3_labels = substr($in_3_labels, 0, count($in_3_labels)-3);
					$in_3_data = substr($in_3_data, 0, count($in_3_data)-3);
					$in_3_data_growth = substr($in_3_data_growth, 0, count($in_3_data_growth)-3);
				?>
				var data_list = (display_type == "total") ? [<?= $in_3_data ?>] : [<?= $in_3_data_growth ?>];
				var data = {
					labels: [<?= $in_3_labels ?>],
					datasets: [
						{
							fillColor: "rgba(220,220,220,0.5)",
							strokeColor: "#00B5B5",
							pointColor: "#009393",
							pointStrokeColor: "#fff",
							pointHighlightFill: "#fff",
							pointHighlightStroke: "#00B5B5",
							data: data_list
						}
					]
				};
				var ctx = document.getElementById("in_3").getContext("2d");
				var myPieChart = new Chart(ctx).Line(data, {
					bezierCurve: false
				});
			}
			draw_in_3("total");
		</SCRIPT>
	</DIV><!--
	--><HR />
	<H2>Digital Devices and "Smart" Technology</H2><!--
	--><DIV id="st_1_div" class="chart_div short">
		<H3># of Owned Electronic Devices</H3>
		<SCRIPT>
			<?php
				$st_1_ho_array;
				$st_1_yo_array;
				foreach($data->POINT as $datapoint) {
					$st_1_ho_array[] = intval($datapoint->ST_1_HO);
					$st_1_yo_array[] = intval($datapoint->ST_1_YO);
				}
				$length = count($st_1_ho_array);
				$st_1_ho_mean = round(array_sum($st_1_ho_array)/$length);
				$length = count($st_1_yo_array);
				$st_1_yo_mean = round(array_sum($st_1_yo_array)/$length);
			?>
		</SCRIPT>
		<H4>Average # of devices per household: <?= $st_1_ho_mean ?> devices<H4>
		<H4>Average # of devices per person: <?= $st_1_yo_mean ?> devices</H4>
	</DIV><!--
	--><DIV id="st_2_div" class="chart_div">
		<H3>Ownership of Different Types of Smart Devices (%)</H3>
		<CANVAS id="st_2" width="300" height="300"></CANVAS>
		<SCRIPT>
			<?php
				$st_2_sm = $st_2_ta = $st_2_la = $st_2_de = $st_2_ot = $count = 0;
				foreach($data->POINT as $datapoint) {
					$count++;
					if($datapoint->ST_2_SM == "on") $st_2_sm++;
					if($datapoint->ST_2_TA == "on") $st_2_ta++;
					if($datapoint->ST_2_LA == "on") $st_2_la++;
					if($datapoint->ST_2_DE == "on") $st_2_de++;
					if($datapoint->ST_2_OT == "on") $st_2_ot++;
				}
			?>
			var data = [
				{
					value: <?= round(100*($st_2_sm/$count)) ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Smartphone"
				},
				{
					value: <?= round(100*($st_2_ta/$count)) ?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Tablet"
				},
				{
					value: <?= round(100*($st_2_la/$count)) ?>,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Laptop"
				},
				{
					value: <?= round(100*($st_2_de/$count)) ?>,
					color: "#FEDC44",
					highlight: "#A8B3C5",
					label: "Desktop Computer"
				},
				{
					value: <?= round(100*($st_2_ot/$count)) ?>,
					color: "#38F760",
					highlight: "#616774",
					label: "Other Devices"
				}

			];
			var ctx = document.getElementById("st_2").getContext("2d");
			var myPolarAreaChart = new Chart(ctx).PolarArea(data);
		</SCRIPT>
	</DIV><!--
	--><DIV id="st_4_div" class="chart_div">
		<H3>Usage of Smart Devices (%)</H3>
		<CANVAS id="st_4" width="300" height="300"></CANVAS>
		<SCRIPT>
			<?php
				$st_4_in = $st_4_me = $st_4_ga = $st_4_sc = $st_4_sm = $st_4_oc = $st_4_ot = 0;
				foreach($data->POINT as $datapoint) {
					if($datapoint->ST_4_IN == "on") $st_4_in++;
					if($datapoint->ST_4_ME == "on") $st_4_me++;
					if($datapoint->ST_4_GA == "on") $st_4_ga++;
					if($datapoint->ST_4_SC == "on") $st_4_sc++;
					if($datapoint->ST_4_SM == "on") $st_4_sm++;
					if($datapoint->ST_4_OC == "on") $st_4_oc++;
					if($datapoint->ST_4_OT == "on") $st_4_ot++;
				}
			?>
			var data = [
				{
					value: <?= round(100*($st_4_in/$count)) ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Searching for Information"
				},
				{
					value: <?= round(100*($st_4_me/$count)) ?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Searching for Media"
				},
				{
					value: <?= round(100*($st_4_ga/$count)) ?>,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Playing Games"
				},
				{
					value: <?= round(100*($st_4_sc/$count)) ?>,
					color: "#FEDC44",
					highlight: "#A8B3C5",
					label: "Schoolwork"
				},
				{
					value: <?= round(100*($st_4_sm/$count)) ?>,
					color: "#4D5360",
					highlight: "#616774",
					label: "Social Media"
				},
				{
					value: <?= round(100*($st_4_oc/$count)) ?>,
					color: "#A942F6",
					highlight: "#A8B3C5",
					label: "Other Communication"
				},
				{
					value: <?= round(100*($st_4_ot/$count)) ?>,
					color: "#38F760",
					highlight: "#A8B3C5",
					label: "Other Uses"
				}

			];
			var ctx = document.getElementById("st_4").getContext("2d");
			var myPolarAreaChart = new Chart(ctx).PolarArea(data);
		</SCRIPT>
	</DIV><!--
	--><DIV id="st_3_div" class="chart_div short">
		<H3>Time Spent Looking at Screens (of electronic devices)</H3>
		<SCRIPT>
			<?php
				$st_3_array;
				foreach($data->POINT as $datapoint)
					$st_3_array[] = intval($datapoint->ST_3);
				$length = count($st_3_array);
				$st_3_mean = round(array_sum($st_3_array)/$length);
			?>
		</SCRIPT>
		<H4>Average time spent looking at screens: <?= $st_3_mean ?> minutes<H4>
	</DIV><!--
	--><HR />
	<H2>Summary</H2><!--
	--><DIV id="ge_12_div" class="chart_div short">
		<H3>Overall Impact of Digital Technology on Life</H3>
		<?php
			$ge_1 = 0;
			$ge_2 = 0;
			foreach($data->POINT as $datapoint) {
				if($datapoint->GE_1 == "on") $ge_1++;
				if($datapoint->GE_2 == "on") $ge_2++;
			}
			$ge_1 = round(100*($ge_1/$count));
			$ge_2 = round(100*($ge_2/$count));
		?>
		<H4><?= $ge_1 ?>% of people found that these technologies greatly improve life.</H4>
		<H4><?= $ge_2 ?>% of people can be easily distracted by these technologies.</H4>
	</DIV><!--
	--><DIV id="ge_4_div" class="chart_div">
		<H3>Thoughts on the Future of these Technologies</H3>
		<P>Given the following options, people chose that technology would...
			<OL>
				<LI>harm people because they make life too convenient.</LI>
				<LI>harm people because artificial intelligence may take over.**</LI>
				<LI>harm people because of both of the above (1&2).</LI>
				<LI>never harm people more than help them.</LI>
			</OL>
		</P>
		<CANVAS id="ge_4" width="300" height="300"></CANVAS>
		<SCRIPT>
			<?php
				$ge_4_harmgood = $ge_4_harmevil = $ge_4_harmboth = $ge_4_help = 0;
				foreach($data->POINT as $datapoint)
					switch($datapoint->GE_4) {
						case "harmgood":
							$ge_4_harmgood++;
							break;
						case "harmevil":
							$ge_4_harmevil++;
							break;
						case "harmboth":
							$ge_4_harmboth++;
							break;
						case "help":
							$ge_4_help++;
					}
			?>
			var data = [
				{
					value: <?= $ge_4_help ?>,
					color:"#C744AA",
					highlight: "#EB66CC",
					label: "Option 1"
				},
				{
					value: <?= $ge_4_harmgood ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Option 2"
				},
				{
					value: <?= $ge_4_harmevil ?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Option 3"
				},
				{
					value: <?= $ge_4_harmboth ?>,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Option 4"
				}
			]
			var ctx = document.getElementById("ge_4").getContext("2d");
			var myDoughnutChart = new Chart(ctx).Doughnut(data);
		</SCRIPT>
	</DIV><!--
	--><HR />
	<H2>Notes</H2>
	<P>* Or Internet applications</P>
	<P>** Apparently, judging by the results of the graph, we have watched too many post-apocalyptic movies and are too worried about artificial intelligence. I personally am not so worried about this.</P>
	</DIV>
	<SCRIPT>
		function removeCover() {
			var opacity = 90;
			var cover = document.getElementById("cover");
			var container = document.getElementById("container");
			var t = setInterval(function() {
				opacity -= 5;
				opacity_string = (opacity >= 10) ? opacity : "0" + opacity;
				cover.style.backgroundColor = "rgba(220, 220, 220, 0." + opacity_string + ")";
				cover.style.color = "rgba(0, 0, 0, 0." + opacity_string + ")";
				neg_opacity_string = (opacity <= 80) ? "0." + (90-opacity) : "0.0" + (90-opacity);
				container.style.color = "rgba(0, 0, 0, " + neg_opacity_string + ")";
				if(opacity == 0) {
					clearInterval(t);
					container.style.color = "black";
				}
			}, 50);
			cover.style.zIndex = "-1";
		}
		document.body.onload = setTimeout(removeCover, 1000);
	</SCRIPT>
<?php include "part/bottom.txt" ?>