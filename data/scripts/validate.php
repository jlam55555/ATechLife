<?php
	// Check to see if recently submitted
	if(isset($_COOKIE["used"])) {
		header("Location: ../../survey.php?err=wait");
		exit();
	}
	if(!isset($_POST["name"]) {
		header("Location: ../../survey.php");
		exit;
	}
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
			$val = trim($val);
			if($val == "" || preg_match("/[^0-9A-Za-z\'\s]/", $val) || (is_numeric($val) && ($val < 0 || $val % 1 != 0))) {
				header("Location: ../../survey.php?err=invalid");
				exit();
			}
			$answers[$key] = $key;
		}
		// Remove "name" and "gender" data- will be used as attributes instead
		unset($answers["name"]);
		unset($answers["gender"]);
		sort($answers);
	// Check if name was taken
	$data = simplexml_load_file("../data.xml");
	foreach($data->POINT as $val)
		if($val["name"] == base64_encode($name)) {
			header("Location: ../../survey.php?err=exists");
			exit();
		}
	// Set cookie
	$bool = setcookie("used","used",time()+300);
	// Enter all data into XML
	$point = $data->addChild("POINT");
	$point->addAttribute("name", base64_encode($name));
	$point->addAttribute("gender", $gender);
	$point->addAttribute("time", time());
	foreach($answers as $val)
		$point->addChild(strtoupper($val), $$val);
	// Format output
	$dom = new DOMDocument('1.0');
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($data->asXML());
	file_put_contents("../data.xml", $dom->saveXML());
	header("Location: ../../index.php?msg=success");
?>
