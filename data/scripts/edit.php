<?php
	if(!isset($_POST["user"])) {
?>
	<FORM action="" method="post">
		<INPUT type="text" name="user" />
		<INPUT type="password" name="pass" />
		<BUTTON>Enter</BUTTON>
	</FORM>
	<?php
		} else if(password_verify($_POST["user"], '$2y$10$fP3uEuXlWQSqiw3Ipx6xWu8sPQmxebCDYuQg/GP/i7uPVVyWr5XL.') && password_verify($_POST["pass"], '$2y$10$qQJoPkqSqVg.GeWA1f1UIuDCcyi5iZQUqx51mYpvD/mh1KA5Oj4Ee')) {
	?>
	<STYLE>
		.off {
			background-color: red;
		}
		.on {
			background-color: green;
		}
		table {
			border-collapse: collapse;
		}
		th, td {
			margin: 0;
			padding: 0 10px;
		}
		tr:nth-child(odd) {
			background-color: #F0F0F0;
		}
	</STYLE>
	<SCRIPT>
		function del(id, name) {
			if(!confirm("Are you sure you want do delete this user?")) return;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","delete.php?name=" + name.replace(" ", "%20"),true);
			xmlhttp.send();
			
			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
					if(xmlhttp.responseText == "true")
						document.getElementsByTagName("TBODY")[0].removeChild(document.getElementById(id.toString()));
					else
						alert(xmlhttp.responseText);
			}
		}
	</SCRIPT>
	<TABLE>
	<?php
		$data = simplexml_load_file("../data.xml");
		$id = 0;
	?>
		<THEAD>
			<TR>
				<TH>Name</TH>
				<TH>DEL</TH>
				<TH>Gender</TH>
				<TH>Time</TH>
				<?php
					foreach($data->POINT[0]->children() as $dat => $val) {
						echo "<TH>$dat</TH>";
					}
				?>
			</TR>
		</THEAD>
		<TBODY>
	<?php
		foreach($data->POINT as $datapoint) {
	?>
			<TR id="<?= $id ?>">
				<TH><?= base64_decode($datapoint["name"]) ?></TH>
				<TD><BUTTON onclick="del(<?= $id ?>, '<?= $datapoint["name"] ?>')">X</BUTTON></TD>
				<TD><?= $datapoint["gender"] ?></TD>
				<TD><?= date("m/d/y G:i:s", intval($datapoint["time"])) ?></TD>
				<?php
					foreach($datapoint->children() as $dat => $val) {
						if($val == "on")
							echo "<TD class='on'><BR /></TD>";
						else if($val == "off")
							echo "<TD class='off'></TD>";
						else
							echo "<TD>$val</TD>";
					}
				?>
			</TR>
	<?php
			$id++;
		}
		echo "</TBODY></TABLE>";
	} else
		echo "You are not authorized to view this file.<BR />";
?>