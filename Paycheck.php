<!DOCTYPE HTML>
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>Process Payroll Data</title>
</head>
<body>
	<h2 style="text-align:center">Payroll Summary</h2>
	<?php
		$NumErrors = 0;
		$reg_hours = $_POST["hours"];
		$wage = $_POST["wage"];
		$ot_wage = 0;
		
		//Check hours field for an empty string or a zero value
		if(is_numeric($reg_hours)){
			if($reg_hours > 0){
				 if($reg_hours > 40 && $wage > 0){
					 $ot_hours = $reg_hours - 40;
					 $ot_wage  = $ot_hours * $wage * 1.5;
				 }
				 else{
					 $wage = $_POST["wage"];
				 }
			}
			else{
				++$NumErrors;
				echo "<p>Hours worked must be greater than 0</p>\n";
			}
		}
		else{
			++$NumErrors;
			echo "<p>Error: Hours worked must contain a numeric value</p>\n";
		}
		
		//Check hourly wage field for an empty string or a non-numeric value
		if(is_numeric($wage)){
			if($wage > 0){
				$wage = round($wage, 2);
			}
			else{
				++$NumErrors;
				echo "<p>Error: Hourly wage amount must be greater than 0</p>\n";
			}
		}
		else{
			++$NumErrors;
			echo "<p>Error: Hourly wage must contain a numeric value</p>\n";
		}
		
	
		//Select statement for the end result of writing to page
		if($NumErrors == 0){
			echo "Based on the employee working $reg_hours hours at a rate of \$$wage per hour.";
			echo "<br/>The employee's gross income will be: \$" . ($reg_hours * $wage);
			echo "<br/>The overtime wage for this employee is \$$ot_wage \n";
		}
		
	?>
	<p><a href="Paycheck.html">Calculate another paycheck</a></p>
</body>
</html>