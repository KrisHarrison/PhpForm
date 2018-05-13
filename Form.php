<!DOCTYPE html>
<?php
$firstNameError = $lastNameError = $ageError = $addressError = $postalCodeError = $provinceError = "";
$firstName = $lastName = $age = $address = $postalCode = $province = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
 if(empty($_POST["firstName"])){
 $firstNameError = "You must enter your first name!";
 }
 else{
	$firstName = check_info($_POST["firstName"]);

	if(!preg_match("/[A-Za-z]{2,}/",$firstName)){
	 $firstNameError="You must enter at least two characters!";
 }
	 }


 if(empty($_POST["lastName"])){
	 $lastNameError= "You must enter your last name!";
 }
 else{
	$lastName= check_info($_POST["lastName"]);

 if(!preg_match("/[A-Za-z]{2,}/",$lastName)){
	 $lastNameError="You must enter at least two characters!";

 }
}



 if(empty($_POST["age"])){
	 $ageError= "You must enter an age!";
 }
 else{
	 $age= check_info($_POST["age"]);
	 if(!preg_match("/^[1-9]\d*$/",$age)){
		 $ageError = "Your age must be greater the 0";

 }
}



 if(empty($_POST["address"])){
	 $addressError= "You must enter an address!";
 }
 else{
	$address= check_info($_POST["address"]);
	if(!preg_match("/[[0-9]+[ X][a-zA-Z]+/",$address)){
		$addressError= "Your adress must enter a valid adreess. e.g. 123 fakestreet.";

 }
}


 if(empty($_POST["postalCode"])){
	 $postalCodeError = "You must enter an address!";
 }
 else{
	$postalCode = check_info($_POST["postalCode"]);
	if(!preg_match("/[a-zA-Z][0-9][a-zA-Z][ X][0-9][a-zA-Z][0-9]/",$postalCode)){
		$postalCodeError= "Please enter a valid postal code. e.g. A1A 1A1.";
	}
 }


 if(empty($_POST["province"])){
	$provinceError = "You must select a province!";
	}
 else{
	 $province = check_info($_POST["province"]);
	 if(isset($_REQUEST["province"]) && $_REQUEST['province'] == '0') {
    $provinceError= "Please select a province!";
  }
 }
}
function check_info($info){
 $info = trim($info);
 $info = stripslashes($info);
 $info = htmlspecialchars($info);
 return $info;
}?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="Form.css"/>
		<title>PhpForm</title>
	</head>
	<body>
	<form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <table>
	   <tr>
				 <td>First Name:<input id="firstName"type="text" name="firstName" value="<?php echo $firstName; ?>">
				 <span class="error"> <?php echo $firstNameError;?></span>
		</td>
		</tr>
		<tr>
	     <td>Last Name:<input id="lastName" type="text" name="lastName" value="<?php echo $lastName; ?>">
			 <span class="error"> <?php echo $lastNameError;?></span>
			 </td>
	   </tr>
		 <tr>
			 <td>Age:<input id="age" type="text" name="age" value="<?php echo $age; ?>">
				 <span class="error"><?php echo $ageError;?></span>
			 </td>
		 </tr>
		 <tr>
	  	<td>Address:<input id="address" type="text" name="address" value="<?php echo $address; ?>">
			<span class="error"><?php echo $addressError;?></span>
			</td>
		</tr>
		<tr>
			<td>Postal Code:<input id="postalCode" type="text" name="postalCode" value="<?php echo $postalCode; ?>">
			<span class="error"> <?php echo $postalCodeError;?></span>
			</td>
	   </tr>
		 <tr>
	   <td>
		 <select id="province" name="province" value="<?php echo $province; ?>">
			 <option value="0"></option>
			 <option value="Alberta">Alberta</option>
			 <option value="British Columbia">British Columbia</option>
			 <option value="Manitoba">Manitoba</option>
			 <option value="New Brunswick">New Brunswick</option>
			 <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
			 <option value="Nova Scotia">Nova Scotia</option>
			 <option value="Ontario">Ontario</option>
			 <option value="Prince Edward Island">Prince Edward Island</option>
			 <option value="Quebec">Quebec</option>
			 <option value="Saskatchewan">Saskatchewan</option>
		  </select>
			<span class="error"><?php echo $provinceError;?></span>
		  </td>
		</tr>
		<tr>
			<td><input type="submit" id="submit"></td>
		 </tr>
    </table>
   </form>
	 <?php echo "<h1>User Info Ouput<h1>";
		 echo "<p>" . $firstName . "</p>";
		 echo "<p>" . $lastName . "</p>";
	   echo "<p>" . $age . "</p>";
	   echo "<p>" . $address . "</p>";
	   echo "<p>" . $postalCode . "</p>";
	   echo "<p>" . $province . "</p>";?>
  </body>
</html>
