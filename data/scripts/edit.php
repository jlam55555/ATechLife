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
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","delete.php?name=" + name.replace(" ", "%20"),true);
		xmlhttp.send();
		
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
				if(xmlhttp.responseText == "true")
					document.body.removeChild(document.getElementById(name.replace(" ", "%20")));
				else
					alert(xmlhttp.responseText);
		}
	}
</SCRIPT>

<?php
	$data = simplexml_load_file("../data.xml");
	foreach($data->POINT as $datapoint) {
		echo "<DIV id='" . str_replace(" ", "%20", $datapoint["name"]) . "'><H1>" . $datapoint["name"] . "</H1><H3>" . $datapoint["gender"] . "</H3><H3>" . date("m/d/y g:i:s a", intval($datapoint["time"])) . "</H3>";
		foreach($datapoint->children() as $dat => $val) {
			echo "$dat: $val<BR />";
		}
		echo "<BUTTON onclick='del(\"" . $datapoint["name"] . "\")'>X</BUTTON></DIV>";
	}
?>