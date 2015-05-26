<?php
	if(isset($_COOKIE["used"]))
		header("Location: ../../survey.php?err=wait");
	extract($_POST);
	$checkboxes = array("sm_1","sm_3_fb","sm_3_tw","sm_3_in","in_1","in_4","st_2_sm","st_2_ta","st_2_la","st_2_de","st_2_ot","st_4_in","st_4_me","st_4_ga","st_4_sc","st_4_sm","st_4_oc","st_4_ot","ge_1","ge_2");
	setcookie("used","used",300);
	$xml = simplexml_load_file("..\data.xml");
	if(isset($xml->$name))	// Fix this
		header("Location: ../../survey.php?err=exists");
	$new = $xml->addChild("point");
	foreach($_POST as $key => $val)
		if($val == "")
			header("Location: ../../survey.php?err=blank");
		else
			$new->addChild($key, $val);
	foreach($checkboxes as $val) {
		if(!isset($$val))
			$new->addChild($val, "off");
	}
	file_put_contents("../data.xml",$xml->asXml());
	header("Location: ../../index.php?msg=success");
?>