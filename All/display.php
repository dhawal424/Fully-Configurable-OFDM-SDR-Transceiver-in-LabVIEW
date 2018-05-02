<?php
//this connects to the database
require_once('dbconfigpdo.php');
require_once('navbar.php');
//require "includes/config.php";


?>
<!DOCTYPE html> 
<html lang=en>
	<head>
		<title> Booking</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Minified JS library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Minified Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<script src="js/bootstrap-datetimepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/table.css"  />
	</head>
	<body>
	
		<div class="row">			
				<div class="col-md-6" align="center">
					<div class="model-content" align= "center">
						<img src = "img/parkingimg.jpg" class="img-responsive" alt="Parking Description" align= ""/>
					</div>
			
				</div>
				<div class="col-md-6" align="center">
					<div class="model-content" align= "center">
						<form method="post" action="payment.php">
							<div class="col-md-3" align="center">
								Booking Start Date & Time: <input size="16" type="text" name="event_datetime_start" class="form-control" id="form_datetime" readonly required>
							</div>
							<div class="col-md-3" align="center">
							Booking End Date & Time: <input size="16" type="text" name="event_datetime_end" class="form-control" id="form_datetime1" readonly required>
							</div>
							</div>
<script type="text/javascript">
$(function () {
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;
    $("#form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        startDate: dateTime
    });
});
$(function () {
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;
    $("#form_datetime1").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        startDate: dateTime
    });
});
</script>
						  


		<?php
			//we create a table
			echo "<table>";
			// create table th 
			echo "<tr >
			 <th> Parking Slot No </th> 
			 <th> Status </th>";
			$sql=" SELECT ParkingSlotNo,Status FROM fleming_dwing  ";
			$st=$conn->prepare($sql);
			$st->execute();
			$total=$st->rowCount();//get the number of rows returned
			if($total < 1 )
			{//if no row was returned
				echo "<tr> <td style> No Data: DataBase Empty </td> ";//print out error message
				echo "<td> No Data: DataBase Empty </td> ";//print out error message
			}
			else
			{
				while($res = $st->fetchObject()){//loop through the returned rows
				echo "<tr>";
				if($res->ParkingSlotNo and $res->Status=='OCCUPIED')
				{
					echo "<td> $res->ParkingSlotNo </td> ";
					echo "<td>   <img src = 'img/occupied.png' alt = 'Occupied'/></td>";
					echo"<td><a href=''> </a> </td>";
				} 
				elseif($res->ParkingSlotNo and $res->Status=='RESERVED')
				{
					echo "<td> $res->ParkingSlotNo </td> ";
					echo "<td>   <img src='img/registered.png' alt = 'Reserved'/> </td>";
					echo"<td><a href=''> </a> </td>";
				}
				else
				{
					echo "<td> $res->ParkingSlotNo </td> ";
					echo "<td> <img src='img/vacant.png' alt = 'Vacant'/> </td>";
					echo"<td><input name='parkingslot' type='checkbox' value='$res->ParkingSlotNo'></td>";
				}
		
				echo"</tr>";
	
			}
	}
	

	?>
	</table>
	  <input type="submit" name="submit" class="btn button btn-success" value="SUBMIT" />
</form>
 
	</div>
	</div>
	</body>
	</html>
