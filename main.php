<?php

	$html = file_get_contents('examTask.html');
	$htmlSplit = explode('<!-- ==xXx== -->', $html);
	echo "$htmlSplit[0]";
	
	$user = 'root';
	$password = '';
	$db = 'finalexam';
	$connect = new mysqli('localhost', $user, $password, $db) or die('MySQL Connection error');
	
	$sql = 'SELECT * FROM guestbookpost';
	$result = mysqli_query($connect, $sql);	
	
	if(isset($_POST['submit'])){
		
		$nameVar = $_POST['name'];
		$msgVar = $_POST['message'];
		$timeVar = date('Y-m-d H:i:s', time());
		
		$stmt = mysqli_prepare($connect, "INSERT INTO guestbookpost VALUES(NULL,?,?,?)");
		mysqli_stmt_bind_param($stmt,'sss',$timeVar,$nameVar,$msgVar);
		mysqli_stmt_execute($stmt);
				
	}
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$toId = $row['messid'];
			$toTime = $row['time'];
			$toName = $row['name'];
			$toMsg = $row['message'];
			
			$htmlPosts = $htmlSplit[1];
			$htmlTemp = $htmlPosts;
			
			$htmlPosts = str_replace('---id---', $toId, $htmlTemp);
			$htmlTemp2 = str_replace('---time---', $toTime, $htmlPosts);
			$htmlTemp3 = str_replace('---name---', $toName, $htmlTemp2);
			$htmlTemp4 = str_replace('---message---', $toMsg, $htmlTemp3);
			
			echo "$htmlTemp4";			
		}
	}else{
		echo "<br><br><br><br>Det har inte gjorts några inlägg ännu";
	}
	
	
	
	echo "$htmlSplit[2]";
	
	mysqli_close($connect);

?>