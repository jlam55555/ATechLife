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
	div {
		background-color: #F0F0F0;
		padding: 25px;
		margin: 25px; 
		position: relative;
	}
	button {
		border: none;
		padding: 10px;
		font-size: 20px;
		width: 60px;
		height: 60px;
		text-align: center;
		position: absolute;
		background-color: #3E4651;
		color: #F0F0F0;
		top: 20px;
		right: 20px;
	}
</STYLE>
<SCRIPT>
	function del(name) {
                if(!confirm("Are you sure?")) return;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","delete.php?name=" + name.replace(" ", "%20"),true);
		xmlhttp.send();
		
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
				if(xmlhttp.responseText == "true")
					document.body.removeChild(document.getElementById(name));
				else
					alert(xmlhttp.responseText);
		}
	}
</SCRIPT>

<?php
	$data = simplexml_load_file("../data.xml");
	foreach($data->POINT as $datapoint) {
		echo "<DIV id='" . base64_decode($datapoint["name"]) . "'><H1>" . base64_decode($datapoint["name"]) . "</H1><H3>" . $datapoint["gender"] . "</H3><H3>" . date("m/d/y g:i:s a", intval($datapoint["time"])) . "</H3>";
                foreach($datapoint->children() as $dat => $val) {
			echo "$dat: $val<BR />";
		}
		echo "<BUTTON onclick='del(\"" . $datapoint["name"] . "\")'>X</BUTTON></DIV>";
	}
	} else
		echo "You are not authorized to view this file.<BR />";
?>