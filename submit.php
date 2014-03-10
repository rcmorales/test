<?php
	require("postmark.php");
	
	// getting data through json endode, then decoding it to save in the db
	$data = json_decode(json_encode($_POST), true);
	$fname = $data['fname'];
	$lname = $data['lname'];
	$email = $data['email'];
	
	// db credential
	$username = "root";
	$password = "";
	$database = "test";
	
	//db connect
		try {
		    $conn = new PDO("mysql:host=localhost;dbname=$database", "$username", "$password");
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    echo "ERROR: Problem in connecting to database";
		}
	
	//db insert in table
	try {
		//add user in test table
		$stmt = $conn->prepare("INSERT INTO tbl_personal (fname,lname,email) VALUES (:fname,:lname,:email)");				
		$stmt->execute(array(':fname'=>$fname,':lname'=>$lname,':email'=>$email));
 
       } catch(PDOException $e) {
			echo "ERROR: Problem in database:add user";
			echo $e;
	   }
	
    
	//sending mail through postmark
	
		$postmark = new Postmark("c76ed0b3-1ebc-4ea1-901f-442c2c99d87f","info@bitgolo.com","optional-reply-to-address");
		$data = "firstname: ". $fname.";lastname: ".$lname.";email: ".$email;
	
		$result = $postmark->to("rcipre@gmail.com")
						   ->subject("Your Data")
                           ->plain_message($data)
                           ->send();

						   if($result === true)
                           echo "Message sent";

	
	
    //checking for data displayed 	
	//echo "firstname: ". $fname.'<br>'."lastname: ".$lname.'<br>'."email: ".$email;
?>