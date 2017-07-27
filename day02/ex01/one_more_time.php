#!/usr/bin/php
<?php
	if ($argc != 2)
		return (0);
	$day_regex = "([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)";
	$day_nb_regex = "([0-9]{1,2})";
	$month_regex = "([Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre)";
	$year_regex = "([0-9]{4})";
	$time_regex = "([0-9]{2}):([0-9]{2}):([0-9]{2})";
	$regex = "/^$day_regex $day_nb_regex $month_regex $year_regex $time_regex$/";
	$days = array(
		"lundi" => "Monday",
		"mardi" => "Tuesday",
		"mercredi" => "Wednesday",
		"jeudi" => "Thursday",
		"vendredi" => "Friday",
		"samedi" => "Saturday",
		"dimanche" => "Sunday");
	$months = array(
		"janvier" => "January",
		"fevrier" => "February",
		"mars" => "March",
		"avril" => "April",
		"mai" => "May",
		"juin" => "June",
		"juillet" => "July",
		"aout" => "August",
		"septembre" => "September",
		"octobre" => "October",
		"novembre" => "November",
		"decembre" => "December");
	if (preg_match($regex, $argv[1], $toks))
	{
		$date = "CET ".$days[strtolower($toks[1])]." ".$toks[2]." ".$months[strtolower($toks[3])]." ".$toks[4]." ".$toks[5]." ".$toks[6]." ".$toks[7]."";
		$time = date_create_from_format("e l d F Y H i s", $date);
		echo date_format($time, 'U')."\n";
	}
	else
		echo "Wrong Format\n";
?>
