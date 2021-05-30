 <?php 

//Author: BrownD
//Date: 4/20/2020
//Purpose: Create a HTML registration form that validates and processed by PHP sticky form script.
 

$page_title = 'Weather Wizards Registration';
include ('includes/header.html');

?>
<body>
<?php 

	//variables
	$workshops[] = "";
	if(isset($_POST['childName']) || isset($_POST['email']) || isset($_POST['parName'])|| isset($_POST['phone']) ||  isset($_POST['locations']))
	{
		$childName = $_REQUEST['childName'];
		$email = $_REQUEST['email'];
		$parName = $_REQUEST['parName'];
		$phone = $_REQUEST['phone'];
		
		if(isset($_POST['memStatus']))
		 {
			$memStatus = $_REQUEST['memStatus'];
		}
		$locations = $_REQUEST['locations'];
	} 

	//Form Validation
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

	//Child	
    if (!empty($_REQUEST['childName'])) 
    {
    	$childName = $_REQUEST['childName']; 
    }

    else
    {
    	$childName = NULL; 
		echo "<p class=\"error\">You forgot to enter your name.</p>";

    }

    //Parent
    if (!empty($_REQUEST['parName']))
	{
		$parName = $_REQUEST['parName'];
	}
	else
	{
		$parName = NULL; 
		echo "<p class=\"error\">You forgot to enter your Parent/Guardian's name</p>";
	}

	//Email
	if (!empty($_REQUEST['email']))
	{
		$email = $_REQUEST['email'];
	}

	else
	{	
		$email = NULL; 
		echo "<p class=\"error\">You forgot to enter your Parent/Guardian's email.</p>";
	}

	//Phone
	if (!empty($_REQUEST['phone'])) 
	{
		$phone = $_REQUEST['phone'];
	}

	else
	{	
		$phone = NULL; 
		echo "<p class=\"error\">You forgot to enter your Parent/Guardian's phone.</p>";
	}

	//Membership
	if (!empty($_REQUEST['memStatus'])) 
	{
		$memStatus = $_REQUEST['memStatus'];
	}

	else
	{
		$memStatus = NULL;
		echo "<p class=\"error\">You forgot to enter your membership status.</p>";
	}


	//Conformation Validation
	if (!empty($_POST['childName']) && (!empty($_POST['parName'])) &&(!empty($_POST['email'])) && (!empty($_POST['email'])) &&(!empty($_POST['phone'])) &&(!empty($_POST['memStatus']))) 
	{
	
	//Location Conformation
		if ($locations == 'Charleston')
	{
		echo "<p>You are nearest to our Charleston, SC location, the Holy City! Go River Dogs!</p>";
	}

	else if ($locations == 'Summerville')
	{
		echo "<p>You are nearest to our Summerville, SC location, the Birthplace of Sweet Tea! Refreshing!</p>";
	}

	else
	{
		echo "<p>You are nearest to our Mt. Pleasant, SC location that has a historical and beachy vibe!</p>";
	}

	//Membership Conformation
	if ($memStatus == 'Yes') 
	{
		echo "<p>Welcome back, $childName! Thank you for being a member of Weather Wizards.</p>";
	}

	else if ($memStatus == 'No') 
	{
		echo "<p>Hi $childName , we hope you'll join Weather Wizards. We have more fun than a jar full of lightning bugs!</p>";
	}
	else
	{
		echo "<p>Hi, $childName! Welcome to Weather Wizards where the forecast is always a 99% chance of fun!</p>";
	}

	//Workshop Conformation
		if(isset($_POST['workshops']))
		{
			echo "<p>You have selected the following workshops:</p>";
			foreach ($_POST['workshops'] as $value) 
			{
				
				echo "<p>".$value."</p>";
			}
		}
		else
		{
			echo "<p>You have selected the following workshops:</p>";
			echo "<p>You have not chosen a workshop, but we add new workshops all the time. We'll keep you updated by e-mail.</p>";
		}
	}
	else
	{
			echo "<p>At Weather Wizard, we need your name and your parent/guardian's name, email, phone and your membership status to send information about our workshops.</p>";
	}

}//End of Validation 

?>

	<h1>Weather Wizards Workshop</h1>
	<p>We host weather wizards workshops throughout the year for kids from 6-12.</p>
	<p>Please note the the following workshops are free to members:</p>
	<ul>
		<li>Make a Rain Gauge</li>
		<li>Make a Thermometer</li>
	</ul>
	<p></p>

	<form action="register.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend><b>Register Your Interests</b></legend>
		
		<!-- checkboxes -->
		<p><input type="checkbox"  name="workshops[]" value="Make a Rain Gauge" <?php if (in_array('Make a Rain Gauge', $workshops)) echo(' CHECKED '); ?>>Make a Rain Gauge</p>
		<p><input type="checkbox"  name="workshops[]" value="Make a Thermometer" <?php if (in_array('Make a Thermometer', $workshops)) echo(' CHECKED '); ?>>Make a Thermometer</p>
		<p><input type="checkbox"  name="workshops[]" value="Make a Windsock" <?php if (in_array('Make a Windsock', $workshops)); ?>>Make a Windsock</p>
		<p><input type="checkbox"  name="workshops[]" value="Make Lighting In Your Mouth" <?php if (in_array('Make Lighting In Your Mouth', $workshops)) echo(' CHECKED '); ?>>Make Lighting In Your Mouth</p>
		<p><input type="checkbox"  name="workshops[]" value="Make a Hygrometer" <?php if (in_array('Make a Hygrometer', $workshops)) echo(' CHECKED '); ?>>Make a Hygrometer</p>
		


		<!-- input -->
		<p><label>Your Name:</label></p>
		<input type="text" name="childName" size="60" maxlength="60" value="<?php if (isset($_POST['childName'])) echo $_POST['childName']; ?>">
		<p><label>Your parent or guardian's name:</label></p>
		<input type="text" name="parName" size="60" maxlength="60" value="<?php if (isset($_POST['parName'])) echo $_POST['parName']; ?>">
		<p><label>Your parent or guardian's email:</label></p>
		<input type="text" name="email" size="60" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
		<p><label>Your parent or guardian's phone:</label></p>
		<input type="text" name="phone" size="60" maxlength="60" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
		

		<!-- drop down menu -->
		<p><label>Your Closets Center:</label>
		<select name="locations">
	  	<option value="Charleston" <?php if (isset($_POST['locations']) && ($_POST['locations'] == 'Charleston')) echo 'selected = "selected"'; ?>>Charleston</option>
	  	<option value="Summerville" <?php if (isset($_POST['locations']) && ($_POST['locations'] == 'Summerville')) echo 'selected = "selected"'; ?>>Summerville</option>
  		<option value="Mt.Pleasant" <?php if (isset($_POST['locations']) && ($_POST['locations'] == 'Mt.Pleasant')) echo 'selected = "selected"'; ?>>Mt.Pleasant</option>
		</select></p>

		<p><label>Are you a member:</label>
		<input type="radio" name="memStatus" value="Yes" <?php if (isset($_POST['memStatus']) && ($_POST['memStatus'] == 'Yes')) echo 'checked="checked"'; ?>/>Yes
		<input type="radio" name="memStatus" value="No" <?php if (isset($_POST['memStatus']) && ($_POST['memStatus'] == 'No')) echo 'checked="checked"'; ?>>No
		<input type="radio" name="memStatus"  value="new" <?php if (isset($_POST['memStatus']) && ($_POST['memStatus'] == 'new')) echo 'checked="checked"'; ?>>Sign Me Up!
		</p>
		<p></p>
		
		<!-- submit -->
			<input type="submit" name="submit" value="Register">
			<input type="reset" name="reset" value="Reset Form">		
	</fieldset>	
</form>

	
<?php

include ('includes/footer.html');
?>