<?php
	$name = $_GET["name"];
	$data = simplexml_load_file("../data.xml");
	foreach($data->POINT as $datapoint) {
		if($datapoint["name"] == $name) {
			$dom = dom_import_simplexml($datapoint);
			$dom->parentNode->removeChild($dom);
		}
	}
	file_put_contents("../data.xml", $data->asXML());
	echo "true";
?>