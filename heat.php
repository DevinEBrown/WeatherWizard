
<?php

//Author: BrownD
//Date: 4/20/2020
//Purpose: Create a form to calculate and valiadates weather humidity within one form. 


$page_title = 'Heat Index';
include ('includes/header.html');
?>

<h1>Heat Index</h1>

	<p>In the Summer, when people say "It’s not the heat, it’s the humidity", what do they mean? There are 2 factors that make a hot day feel really hot. The first is the air temperature and the second is relative humidity. After taking measurements for temperature and relative humidity, we can calculate a heat index that is called our “feels like” temperature.</p>
	
	<p>HI means Heat Index (the “Feels Like” Temperature).</p>
	<p>T means the air temperature (This formula works when temperatures are in the range of 80 to 112).</p>
	<p>RH means relative humidity (This formula works when relative humidity is in the range of 13 to 85)</p>

<p></p>
<form name="heat.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset><legend><b>Get the Heat Index</b></legend>
	<!-- input -->
<?php 

//variables
if(isset($_POST['T']) || isset($_POST['RH']))
{
	$T = $_REQUEST['T'];
	$RH = $_REQUEST['RH'];
}


//form validation
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (($T >= 80 && $T <= 112) && ($RH >= 13 && $RH <= 85)  && is_numeric($RH) && is_numeric($T))
	{
		
			$HI = -42.379 + 2.04901523* $T + 10.14333127* $RH - .22475541* $T* $RH - .00683783* $T* $T - .05481717*$RH*$RH + .00122874*$T*$T*$RH + .00085282*$T*$RH*$RH - .00000199*$T*$T*$RH*$RH; 
			echo '<p class="error"><i>The Heat Index is ' .$HI.'.<i></p>';
		} 

		else
		{
			echo '<p class="error">The temperature should be a number between 80 and 112.</p>';
			echo '<p class="error">The humidity should be a number between 13 and 85.</p>';
			echo '<p class="error"> Please try again.</p>';

		}
}//end of form  validation 

//form 
//Make the temp pull-down menu:
echo '<p><label>Temperature:</label>';
echo '<select name="T" value="T" >';
for ($T = 0; $T <= 150; $T++) 
{
	echo "<option value=\"$T\">$T</option>\n";
}
echo '</select></p>';

// Make the hum pull-down menu:
echo '<p><label>Humidity:</label>';
echo '<select name="RH" value="RH">';
for ($RH= 0; $RH <= 150; $RH++) 
{
	echo "<option value=\"$RH\">$RH</option>\n";
}
echo '</select></p>';

?>
<!-- submit -->
<p><input type="submit" name="submit" value="Gimme the Heat Index!" /></p>
</fieldset>
</form>
<p>If you need to take the temperature, but don't have a Thermometer, then see our <a href="">Weather Workshops</a> to find a workshop on How to make a Thermometer.</p>

<p>If you need to measure the relative humidity, but don't have a Hygrometer. Don't worry, we have a <a href="">Weather Workshops</a> that shows you how to make a Hygrometer too!</p>

<?php

include ('includes/footer.html');
?>



