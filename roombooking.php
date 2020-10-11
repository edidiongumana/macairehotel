<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$number = $_POST['number'];
$arrivaldate = $_POST['arrivaldate'];
$departuredate = $_POST['departuredate'];
$chooseadults = $_POST['chooseadults'];
$choosechildren = $_POST['choosechildren'];
$chooseroom = $_POST['chooseroom'];
$message = $_POST['message'];


//Database Connection
$conn = new mysqli('localhost', 'root','','testresort');
if($conn->connect_error){
    die('Connection Failed  :  '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into testbookings(firstname, lastname, email, number, arrivaldate, departuredate, chooseadults, choosechildren, chooseroom, message)
    values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissssss",$firstname, $lastname, $email, $number, $arrivaldate, $departuredate, $chooseadults, $choosechildren, $chooseroom, $message);
    $stmt->execute();
    
// PHP program to pop an alert 
// message box on the screen 
  
// Function defnition 
function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
  
  
// Function call 
function_alert("Reservation Successfull"); 
  

   // echo "Reservation Successful...";
    $stmt->close();
    $conn->close();
}


?>