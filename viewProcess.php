<?php
	//check if get array is empty
    $get = (!empty($_GET)) ? true : false;

    //if get array is not empty execute  
  	if($get) {
        //create GET array to collect data from view.php URL

        //confirm first whether the data has been set before assigning it a variable
        //and use filter input to remove malicious characters
         if(isset($_GET['mid'])) {
         	$ministryInfoId = filter_input(INPUT_POST, 'mid', FILTER_SANITIZE_STRING);
         }
    }

     //a query for selecting data from ministry info table
    $query = "SELECT ministry_info.Description,category.CategoryName, ministry_info.Latitude, ministry_info.Longitude,users.First_Name, users.Last_Name FROM ministry_info, users, category WHERE ministry_info.mid = '$ministryInfoId' AND ministry_info.category_cid = category.cid AND ministry_info.users_uid = users.uid";

    //store query in a variable
    $result = mysql_query($query);

    if ($result) {
    	//get number of rows
		$num_rows = mysql_num_rows($result);

		if($num_rows == 1) {
			while ($row = @mysql_fetch_assoc($result)){  
			  // ADD TO XML DOCUMENT NODE  
			  $node = $dom->createElement("marker");
			  $newnode = $parnode->appendChild($node);
			  $newnode->setAttribute("latitude", $row['Latitude']);
			  $newnode->setAttribute("longitude", $row['Longitude']);
			} 
			echo $dom->saveXML();
		}
    }
    else {
		echo "<p>No Result</p>";
	}
