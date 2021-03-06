<!DOCTYPE html>
<html>
	<head>
		<title>Lists, Tables and Forms</title>
		<style type="text/css">
			body {
				font-family: Arial, Verdana, sans-serif;
				font-size: 90%;
				color: #666;
				background-color: #f8f8f8;}
			li {
				line-height: 1.6em;}
			table {
				border-spacing: 0px;}
			th, td {
				padding: 5px 30px 5px 10px;
				border-spacing: 0px;
				font-size: 90%;
				margin: 0px;}
			th, td {
				text-align: left;
				background-color: #e0e9f0;
				border-top: 1px solid #f1f8fe;
				border-bottom: 1px solid #cbd2d8;
				border-right: 1px solid #cbd2d8;}
			tr.head th {
				color: #fff;
				background-color: #90b4d6;
				border-bottom: 2px solid #547ca0;
				border-right: 1px solid #749abe;
				border-top: 1px solid #90b4d6;
				text-align: center;
				text-shadow: -1px -1px 1px #666666;
				letter-spacing: 0.15em;}
			td {
				text-shadow: 1px 1px 1px #ffffff;}
			tr.even td, tr.even th {
				background-color: #e8eff5;}
			tr.head th:first-child {
				-webkit-border-top-left-radius: 5px;
				-moz-border-radius-topleft: 5px;
				border-top-left-radius: 5px;}
			tr.head th:last-child {
				-webkit-border-top-right-radius: 5px;
				-moz-border-radius-topright: 5px;
				border-top-right-radius: 5px;}
			fieldset {
				width: 310px;
				margin-top: 20px;
				border: 1px solid #d6d6d6;
				background-color: #ffffff;
				line-height: 1.6em;}
			legend {
				font-style: italic;
				color: #666666;}
			input[type="text"] {
				width: 120px;
				border: 1px solid #d6d6d6;
				padding: 2px;
				outline: none;}
			input[type="text"]:focus,
			input[type="text"]:hover {
				background-color: #d0e2f0;
				border: 1px solid #999999;}
			input[type="submit"] {
				border: 1px solid #006633;
				background-color: #009966;
				color: #ffffff;
				border-radius: 5px;
				padding: 5px;
				margin-top: 10px;}
			input[type="submit"]:hover {
				border: 1px solid #006633;
				background-color: #00CC33;
				color: #ffffff;
				cursor: pointer;}
			.title {
				float: left;
				width: 160px;
				clear: left;}
			.submit {
				width: 310px;
				text-align: right;}
		</style>
	</head>
	<body>
	<?php
	$page_title = 'Weather Workshops';
	include ('includes/header.html');
	?>
		<h1>Weather Workshops</h1>
		<p>We will be conducting a number of weather workshops throughout the year.</p>
		
		<table>
			<tr class="head">
				<th></th>
				<th>Charleston</th>
				<th>Summerville</th>
				<th>Mt. Pleasant</th>
			</tr>
			<tr>
				<th>Make a Rain Gauge</th>
				<td>Sat, 4 Feb 2012<br />11am - 2pm</td>
				<td>Sat, 3 Mar 2012<br />11am - 2pm</td>
				<td>Sat, 17 Mar 2012<br />11am - 2pm</td>
			</tr>
			<tr class="even">
				<th>Make a Thermometer</th>
				<td>Sat, 7 Apr 2012<br />11am - 1pm</td>
				<td>Sat, 5 May 2012<br />11am - 1pm</td>
				<td>Sat, 19 May 2012<br />11am - 1pm</td>
			</tr>
			<tr>
				<th>Make a Windsock</th>
				<td>Sat, 9 Jun 2012<br />11am - 2pm</td>
				<td>Sat, 7 Jul 2012<br />11am - 2pm</td>
				<td>Sat, 21 Jul 2012<br />11am - 2pm</td>
			</tr>
			<tr>
				<th>Make a Hygrometer</th>
				<td>Sat, 16 Jun 2012<br />11am - 2pm</td>
				<td>Sat, 14 Jul 2012<br />11am - 2pm</td>
				<td>Sat, 28 Jul 2012<br />11am - 2pm</td>
			</tr>
			<tr class="even">
				<th>Make Lightning In Your Mouth</th>
				<td>Sat, 4 Aug 2012<br />11am - 4pm</td>
				<td>Sat, 8 Sep 2012<br />11am - 4pm</td>
				<td>Sat, 15 Sep 2012<br />11am - 4pm</td>
			</tr>
		</table>
		<?php
		include ('includes/footer.html');
		?>
	</body>
</html>