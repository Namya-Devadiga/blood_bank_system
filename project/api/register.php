<?php
	include("connect.php");
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$address=$_POST['address'];
	
	$role=$_POST['role'];

	if (isset($_FILES['photo'])) {
        // File uploaded successfully
        $img_path = "../uploads/" . basename($_FILES['photo']['name']);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $img_path)) {
            // echo "File uploaded successfully.";
        } else {
            // echo "Failed to upload file.";
        }
    } else {
        // 'q_pic' file was not uploaded
        $img_path = ""; // Set default or handle accordingly
    }

	if($password==$cpassword){

		$insert= mysqli_query($connect,"INSERT INTO user (name,phone,address,password,photo,role,status,votes) VALUES('$name','$phone','$address','$password','$img_path','$role',0,0)");
	
		if($insert){
			echo '
			<script>
				alert("Registration successfull!");
				window.location="../";
			</script>
			';
		}
		else
		{
			echo '
			<script>
				alert("Some error occured!");
				window.location="../route/register.html";
			</script>
		';
		}

	}

	else {
		echo '
		<script>
			alert("Passwords do not match!");
			window.location="../route/register.html";
		</script>
		';
	}
?>
