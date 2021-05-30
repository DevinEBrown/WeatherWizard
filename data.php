<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php 

//Author: BrownD
//Date: 4/20/2020
//Purpose: Create a form to calculate and valiadates weather humidity within one form. 


$page_title = 'Climate Data For All Cities';
include ('includes/header.html');

?>
<h1>Climate Data For All Cities</h1>

<?php 

 require('mysqli_connect.php');
 // Number of records to show per page:
$display = 15;


// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p']))
 { 
	$pages = $_GET['p'];
 } 

else 
{ 

	// Count the number of records:
	$q = "SELECT COUNT(city) FROM city_stats";
	$r = @mysqli_query ($dbc, $q);
	$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
	$records = $row[0];

	// Calculate the number of pages...
	if ($records > $display) 
	{ // More than 1 page.
		$pages = ceil ($records/$display);
	} 
	else 
	{
		$pages = 1;
	}
	
} // End of p IF/Else.


// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) 
{
	$start = $_GET['s'];
} 
else 
{
	$start = 0;
}

//set default sort by city name
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'city';

// Determine the sorting order:
switch ($sort) 
{
	case 'st':
		$order_by = 'state ASC';
		break;
	case 'rh':
		$order_by = 'record_high ASC';
		break;
	case 'rl':
		$order_by = 'record_low ASC';
		break;
	case 'dc':
		$order_by = 'days_clear ASC';
		break;
	case 'cd':
		$order_by = 'days_cloudy ASC';
		break;
	case 'dp':
		$order_by = 'days_with_precip ASC';
		break;
	case 'ds':
		$order_by = 'days_with_snow ASC';
		break;
	case 'city':
		$order_by = 'city ASC';
		break;
	default:
		$order_by = 'city ASC';
		$sort = 'city';
		break;
}


//define query
$q = "SELECT city, state, record_high, record_low, days_clear, days_cloudy, days_with_precip, days_with_snow
 	FROM city_stats
 	ORDER BY city ASC LIMIT $start, $display";
 $r = @mysqli_query($dbc, $q);

 // Count the number of returned rows:
 $num = mysqli_num_rows($r);

  if ($num > 0) 
{ 
 	echo "<p>There are currently $num cities displayed.</p>\n";


// Table header
echo '<table width="100%" cellspacing="5" cellpadding="5">
	<thead>
	<tr>
	<th align="left"><a href="data.php?sort=city">City</a></th>
	<th align="left"><a href="data.php?sort=st">State</a></th>
	<th align="left"><a href="data.php?sort=rh">High</a></th>
	<th align="right"><a href="data.php?sort=rl">Low</a></th>
	<th align="right"><a href="data.php?sort=dc">Days Clear</a></th>
	<th align="right"><a href="data.php?sort=cd">Days Cloudy</a></th>
 	<th align="right"><a href="data.php?sort=dp">Days with Percip</a></th>
	<th align="right"><a href="data.php?sort=ds">Days with Snow</a></th>
</tr>
</thead>
<tbody>';

// Fetch and print all the records....
$bg = '#eeeeee'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) 
{

	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); 
	
	echo '<tr bgcolor="' . $bg . '">
	<td align="left">'. $row['city'] . '</td><td align="left">' . $row['state'] . '</td><td align="right">' . $row['record_high'] . '</td><td  align="right">' . $row['record_low'] . '</td><td  align="right">' . $row['days_clear'] . '</td><td align="right">' . $row['days_cloudy'] . '</td><td  align="right">' . $row['days_with_precip'] . '</td><td align="right">' . $row['days_with_precip'].'</td></tr>';
}//end of while

echo '</table>';
mysqli_free_result ($r);
mysqli_close($dbc);
}//end of num if 

else
{
	echo '<p class="error">There are currently no cities in the database.</p>';
}

// Make the links to other pages, if necessary.
if ($pages > 1) 
{
	
	echo '<br /><p>';
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) 
	{
		echo '<a href="data.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}
	
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) 
	{
		if ($i != $current_page) 
		{
			echo '<a href="data.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		} 
		else 
		{
			echo $i . ' ';
		}
	} // End of FOR loop.
	
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) 
	{
		echo '<a href="data.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}
	
	echo '</p>'; // Close the paragraph.
	
} // End of links section.

?>

<?php
include ('includes/footer.html');
?>

</body>
</html>

