<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['userdata']))
	{
		header("location:../");
	}
	$userdata = $_SESSION['userdata'];
	$groupsdata= $_SESSION['groupsdata'];
	if($_SESSION['userdata']['status']==0)
	{
		$status='<b style="color:red"> Not Received</b>';
	}
	else
	{
		$status='<b style="color:green">Received</b>';
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="../css/style.css">
	<title>Blood bank dashboard</title>
</head>
<body>
<style>
	body {
            background-image: url('blood.png'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
	#backbtn{
	padding: 10px;
	border-radius: 5px;
	width:20%;
	background-color: maroon;
	color: white;
	float:left;
	margin: 10px;
}
#logoutbtn{
float:right;
	padding: 10px;
	border-radius: 5px;
	width:20%;
	background-color: maroon;
	color: white;
	margin:10px;

}
#profile{
background-color:white;
width:30%;
padding:20px;
float:left;
}
#group{
background-color:white;
width:60%;
padding:20px;
float:right;
}
#votebtn{
padding: 10px;
	font-size:15px;
	border-radius: 5px;
	
	background-color: lightpink;
	color: white;
}
#mainpanel{
padding: 10px;

}
#voted{
padding: 10px;
	font-size:15px;
	border-radius: 5px;
	background-color: darkred;
	color: white;
}
 h1 {
            font-size: 48px;
            color: #800000; /* Dark red */
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
  h3 {
            font-size: 24px;
            color: #333; /* Dark grey */
            letter-spacing: 1px;
}

</style>

	<div id="mainsection">
<center>
	<div id="headersection">
	<a href="../"> <button id="backbtn">Back</button></a>
	<a href="logout.php"><button id="logoutbtn">Logout</button></a>
	<h1> BloodBond</h1>
	<h3> Blood Bank System </h3>
	</div>
</center>
	<hr>
	<div id="mainpanel">
	<div id="profile">
		<center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"></center><br><br>
		<b> Name: </b> <?php echo $userdata['name']?><br><br> 
		<b> Contact Number: </b> <?php echo $userdata['phone']?><br><br>
		<b> Address: </b><?php echo $userdata['address']?><br><br>
		<b> Status: </b><?php echo $status?><br><br>

	</div>
	<div id="group">
		<?php
			if($_SESSION['groupsdata'])
			{
				for($i=0;$i<count($groupsdata);$i++)
				{
					?>
				<div>
				<img style="float:right;" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100"><br><br> 
			<b> Donor Name: </b> <?php echo $groupsdata[$i]['name']?><br><br> 
			<b> Donations </b> <?php echo $groupsdata[$i]['votes']?><br><br>
			<b> Phone Number: </b> <?php echo $groupsdata[$i]['phone']?><br><br>
			<form action="../api/vote.php" method="POST">
				<input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
				<input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
				<?php 
					if($_SESSION['userdata']['status']==0)
					{
					
					?>
				<button type="submit" name="votebtn" value="vote" id="votebtn">Recieve</button>
				<?php		
				
	
				}	
				else
				{
				
				?>
				<button disabled type="button" name="votebtn" value="vote" id="voted">Donated</button>
				<?php
				}
				?>
				
			</form>
			</div>

			<hr>
			<?php

				}
				echo '
				<script>
					alert("Please contact the donor for blood details!");
				</script>
					';	
			}
			else
			{
				
			}
?>
	</div>
	</div>
	</div>	
	
</body>
</html>