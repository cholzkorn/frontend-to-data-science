<?php

$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$occupation = filter_input(INPUT_POST, 'occupation');
$salary = filter_input(INPUT_POST, 'salary');
$satisfaction = filter_input(INPUT_POST, 'satisfaction');

if (!empty($firstname)){

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "labor_stats";

  // Create connection
  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

  // error handling
  if(mysqli_connect_error()){
    die('Connect error (' . mysqli_connect_errno() . ')'
    . mysqli_connect_error());
  }

  else{
    // Insert data into table
    $sql = "INSERT INTO
    users (firstname, lastname, occupation, salary, satisfaction)
    values ('$firstname', '$lastname', '$occupation', '$salary', '$satisfaction')";

    if ($conn->query($sql)){
      echo "New record is inserted successfully. <br>";
      echo "<a href='index.html'>Enter a new one.</a>";
    }

    else{
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection

    $conn->close();

  }


}
else {
  echo "First name is missing!";
  die();
}

?>
