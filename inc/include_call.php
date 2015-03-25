<?php
	if (isset($_GET["section"])){
	
		$sectionName = $_GET["section"];
		include("views/tab_".$sectionName.".php");
		
	} else {
	
		include("views/tab_index.php");
		
	}
?>
