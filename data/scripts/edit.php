<?php
	$data = simplexml_load_file("../data.xml");
	foreach($data->POINT as $datapoint) {
		echo "<H1>" . $datapoint["name"] . "</H1><H3>" . $datapoint["gender"] . "</H3><H3>" . date("m/d/y g:i:s a", intval($datapoint["time"])) . "</H3>";
		foreach($datapoint->children() as $dat => $val) {
			echo "$dat: $val<BR />";
		}
	}
?>