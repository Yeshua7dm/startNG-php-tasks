<?php
//check if form was submitted before working
if (isset($_POST['submit'])) {
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email = $_POST['email'];
  $pnumber = $_POST['phone_number'];
  $a_range = $_POST['age_range'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];

  //create a txt file with the filename as the first_name
  $file = $fname . "_" . $lname . '.txt';
  //check if file already exists
  if (file_exists($file)) { //if file exists, send an error message
    echo "<font color='red'>File already exists</font>";
  } else {
    //open the file and write the data into it
    $openFile = fopen($file, "w");
    fwrite($openFile, "Your Contact Information as supplied is given below: \n\n");
    fwrite($openFile, "First Name: " . $fname . "\n");
    fwrite($openFile, "Last Name: " . $lname . "\n");
    fwrite($openFile, "Email Address: " . $email . "\n");
    fwrite($openFile, "Phone Number: " . $pnumber . "\n");
    fwrite($openFile, "Age Range: " . $a_range . "\n");
    fwrite($openFile, "Gender: " . $gender . "\n");
    fwrite($openFile, "Address: " . $address . "\n");

    print("<h1>Your Contact Information</h1>
      <p>Your contact information has been saved in the file:" . $fname . "_" . $lname . ".txt</p>");
    print("<p>The contents of that file are displayed below</p>");
    $openFile = fopen($file, "r");

    $contents = fread($openFile, filesize($file));

    echo ('<textarea name="address" placeholder="Enter your address" cols="50" rows="10" disabled>' . $contents . '</textarea>');
  }
}
