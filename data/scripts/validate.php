<?php
	// Check to see if recently submitted
	if(isset($_COOKIE["used"]))
		header("Location: ../../survey.php?err=wait");
	$checkboxes = array("sm_1"=>"off","sm_3_fb"=>"off","sm_3_tw"=>"off","sm_3_in"=>"off","in_1"=>"off","in_4"=>"off","st_2_sm"=>"off","st_2_ta"=>"off","st_2_la"=>"off","st_2_de"=>"off","st_2_ot"=>"off","st_4_in"=>"off","st_4_me"=>"off","st_4_ga"=>"off","st_4_sc"=>"off","st_4_sm"=>"off","st_4_oc"=>"off","st_4_ot"=>"off","ge_1"=>"off","ge_2"=>"off");
	foreach($checkboxes as $key => $val) {
		if(isset($_POST[$key]))
			unset($checkboxes[$key]);
	}
	// Turn into sorted array
		// Merge checkboxes and answers
		$answers = array_merge($_POST,$checkboxes);
		// Turn $answers into variables (keys will be destroyed during sort())
		extract($answers);
		// Answer validation
		// Give values to keys
		foreach($answers as $key => $val) {
			if($val == "" || (is_numeric($val) && ($val < 0 || $val % 1 != 0)))
				header("Location: ../../survey.php?err=invalid");
			$answers[$key] = $key;
		}
		// Remove "name" and "gender" data- will be used as attributes instead
		unset($answers["name"]);
		unset($answers["gender"]);
		sort($answers);
	// Check if name was taken
	$data = simplexml_load_file("../data.xml");
	foreach($data->POINT as $val)
		if($val["name"] == $name) {
			header("Location: ../../survey.php?err=exists");
			exit();
		}
	// Enter all data into XML
	$point = $data->addChild("POINT");
	$point->addAttribute("name", $name);
	$point->addAttribute("gender", $gender);
	foreach($answers as $val)
		$point->addChild(strtoupper($val), $$val);
	// Format output
	$dom = new DOMDocument('1.0');
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($data->asXML());
	file_put_contents("../data.xml", $dom->saveXML());
	/*setcookie("used","used",300);
	$xml = simplexml_load_file("../data.xml");
	if(isset($xml->$name))	// Fix this
		header("Location: ../../survey.php?err=exists");
	$new = $xml->addChild("point");
	foreach($_POST as $key => $val)
		if($val == "")
			header("Location: ../../survey.php?err=blank");
		else
			$new->addChild(strtoupper($key), $val);
	foreach($checkboxes as $val) {
		if(!isset($$val))
			$new->addChild(strtoupper($val), "off");
	}
	file_put_contents("../data.xml",$xml->asXml());
	header("Location: ../../index.php?msg=success");*/
?>
