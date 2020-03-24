<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Information</title>
</head>

<body>
  <form action="contactForm.php" method="post">

    <fieldset>
      <legend>Please fill in your Contact Details</legend>
      <p><label for="first_name">First Name</label> <input required type="text" name="first_name" placeholder="Enter Your First Name" /> </p>
      <p><label for="last_name"></label>Last Name</label> <input required type="text" name="last_name" placeholder="Enter Your Last Name" /> </p>
      <p><label for="phone_number">Phone Number</label> <input type="tel" name="phone_number" placeholder="+234-XXXXXXXXXX">
      </p>
      <p><label for="email">Email</label> <input required type="email" name="email" placeholder="Enter Your Email" />
      </p>
      <p><label for="age_range">Age Range</label> <select required name="age_range">
          <option value="---">Select</option>
          <option value="13-19">Teenage (13-19)</option>
          <option value="20-35">Young Adult (20-35)</option>
          <option value="36-59">Adult (36-59)</option>
          <option value="60+">Senior Citizen (60+)</option>
        </select>
      </p>
      <p>
        <label for="gender">Gender</label> <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female">Female
      </p>
      <p>
        <label for="address">Address</label>
        <textarea name="address" placeholder="Enter your address" cols="20" rows="2"></textarea>
      </p>
      <p>
        <input type="submit" name="submit" value="Submit Form">
      </p>
    </fieldset>

  </form>
</body>

</html>

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
    echo "<h3><font color='red'>File already exists with name : " . $fname . "_" . $lname . ".txt</font></h3>";
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

    print("<h3>Your contact information has been saved in the file:" . $fname . "_" . $lname . ".txt</h3>");
    print("<p>The contents of that file are displayed below</p>");
    $openFile = fopen($file, "r");

    $contents = fread($openFile, filesize($file));

    echo ('<textarea name="address" placeholder="Enter your address" cols="50" rows="10" disabled>' . $contents . '</textarea>');
  }
}
