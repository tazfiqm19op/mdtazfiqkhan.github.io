<?php
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Database connection
	$conn = new mysqli('localhost','root','','portfolio website');
	if($conn->connect_error){
        echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $stmt = $conn->prepare("insert into form(fullName, email, number, subject, message) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $fullName, $email, $number, $subject, $message);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration successfully...";
        $stmt->close();
        $conn->close();
    }

?>