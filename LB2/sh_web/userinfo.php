<!DOCTYPE html>
<html>
	<head>
		<title>php file - show mysql table</title>
	</head>
	<body>
		<table>
			<tr>
				<th>userID</th>
				<th>name</th>
				<th>lastname</th>
				<th>age</th>
			</tr>
			<?php
			if(isset($_POST['submit']))
				{
					# save data from from in variables
					$name = $_POST['name'];
					$lastname = $_POST['lastname'];
					$age = $_POST['age'];
					
					# database infos
					$host = "192.168.1.50";
					$username = "trj";
					$password = "Qawsedrft123";
					$dbname = "UserDB";

					# variable for connection
					$con = mysqli_connect($host, $username, $password, $dbname);
					
					# check if connection failed
					if (!$con)
					{
						die("Connection failed!" . mysqli_connect_error());
					}

					# variable for insert into table
					$sql = "INSERT INTO user (userID, name, lastname, age) VALUES ('0', '$name', '$lastname', '$age')";
				
					# put everything together into mysql query
					$rs = mysqli_query($con, $sql);
					if($rs)
					{
						echo "Successfully saved";
					}
				
					# SELECT statement in query variable
					$sqlsel = "SELECT userID, name, lastname, age from benutzer";
					$result = $con-> query($sqlsel);

					# If rows are more than 0 --> if there is a database
					if ($result-> num_rows > 0) {
						while ($row = $result-> fetch_assoc()) {
							# does the table
							echo "<br/><br><tr><td>". $row["userID"] ."</td><td>". $row["name"] ."</td><td>". $row["lastname"] ."</td><td>". $row["age"] ."</td></tr>";
						}
						echo "</table>";
					}
					else {
						echo "nothing in table";
					}

					# close mysql connection 
					mysqli_close($con);
				}
			?>
		</table>
		<br/>
		<a href="http://localhost:11930">
			<input type="submit" value="go back to main"/>
		</a>		
	</body>
</html>