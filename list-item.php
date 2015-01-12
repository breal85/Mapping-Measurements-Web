<?php
	include('includes/session.php');
	//get passed id from link in view.php 
	//$ministryInfoId = $_GET['mid'];

	//check if get array is empty
     $get = (!empty($_GET)) ? true : false;

     //if get array is not empty execute  
  	if($get) {
        //create GET array to collect data from view.php URL

        //confirm first whether the data has been set before assigning it a variable
        //and use filter input to remove malicious characters
         if(isset($_GET['mid'])) {
         	$ministryInfoId = filter_input(INPUT_GET, 'mid', FILTER_SANITIZE_STRING);
         }
    }


	// Start XML file, create parent node
	// $dom = new DOMDocument("1.0");
	// $node = $dom->createElement("markers");
	// $parnode = $dom->appendChild($node);

    //a query for selecting data from ministry info table
    $query = "SELECT ministry_info.Description,category.CategoryName, ministry_info.Latitude, ministry_info.Longitude,users.First_Name, users.Last_Name FROM ministry_info, users, category WHERE ministry_info.mid = '$ministryInfoId' AND ministry_info.category_cid = category.cid AND ministry_info.users_uid = users.uid";

    //store query in a variable
    $result = mysql_query($query);
?>
<?php include('header.php');?>
<div class="row">
	<div class="col-lg-12 col-xs-12">
		<div id="map-item"></div>	
		<p id="map-error"></p>
 <?php
	if ($result) {
    	//get number of rows
		$num_rows = mysql_num_rows($result);

		if($num_rows == 1) {
			while ($row = @mysql_fetch_assoc($result)){  ?>
				<input type="hidden" id="latitude" name="latitude"/>
				<input type="hidden" id="longitude" name="latitude"/>
				<input type="hidden" id="latActivity" name="latitude" value="<?php echo "{$row['Latitude']}"?>" />
				<input type="hidden" id="longActivity" name="latitude" value="<?php echo "{$row['Longitude']}"?>" />
				<script type="text/javascript">
					var map;
					var latDB = document.getElementById("latActivity").value;
					var longDB = document.getElementById("longActivity").value;        
					var center = new google.maps.LatLng(latDB, longDB);
					
					function init() {
					     
					    var mapOptions = {
					        zoom: 13,
					        center: center,
					        mapTypeId: google.maps.MapTypeId.ROADMAP
					    }
					     
					    map = new google.maps.Map(document.getElementById("map-item"), mapOptions);
					     
					    var marker = new google.maps.Marker({
					        map: map, 
					        position: center,
					});

				}

				window.onload = init;
				</script>

				<div class="ministry-worker">
					<p><strong>Ministry Worker:</strong></p>
					<p><?php echo "{$row['First_Name']}".' '."{$row['Last_Name']}"?></p>
				</div>

				<div class="ministry-category">
					<p><strong>Category:</strong></p>
					<p><?php echo "{$row['CategoryName']}"?></p>
				</div>

				<div class="view-description">
					<p><strong>Description:</strong></p>
					<div class="description-item">
						<p><?php echo "{$row['Description']}"?></p>
					</div>
				</div>
			<?php 
				} 
		}
    }else {
		echo "<p>No Result</p>";
	}
?>	
	</div>
</div>
<?php
	include('footer.php');
?>