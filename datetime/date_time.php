<?php 
 date_default_timezone_set("Asia/Dhaka");


// Current date in "Year-Month-Day" format
// echo date("d-m-Y"); // e.g., 2024-11-06

// // Current time in "Hour:Minute:Second" format
//  echo date("H:i:s"); // e.g., 14:30:59

// // Full date and time
//  echo date("Y-m-d H:i:s"); // e.g., 2024-11-06 14:30:59

// // Day of the week, month, and year
//  echo date("l, F j, Y"); // e.g., Tuesday, November 6, 2024



// // // Current date and time
// $date = new DateTime();
// echo $date->format('Y-m-d H:i:s');

// Specific date and time
// $date = new DateTime('2024-11-06 14:30:00');
// echo $date->format('d-m-Y h:i:s a');


$date = new DateTime();
// $date->add(new DateInterval('P10D')); // Add 10 days
// echo $date->format('Y-m-d'); // 10 days later

// $date->sub(new DateInterval('P1M')); // Subtract 1 month
// echo $date->format('Y-m-d'); // 1 month earlier


// $date = new DateTime('now', new DateTimeZone('America/New_York'));
// echo $date->format('Y-m-d H:i:s '); // Time in New York

// // Changing the timezone
// $date->setTimezone(new DateTimeZone('Europe/London'));
// echo $date->format('Y-m-d H:i:s'); // Time in London

// ==============================
//  Add Time
// ==============================
$now = new DateTime();
// echo "<h3>Add Time</h3>";
// $addDays = (clone $now)->modify("+5 days");
// echo "After 5 Days: " . $addDays->format("Y-m-d H:i:s") . "<br>";

// $addHours = (clone $now)->modify("+3 hours");
// echo "After 3 Hours: " . $addHours->format("Y-m-d H:i:s") . "<br>";

// $addMonths = (clone $now)->modify("+2 months");
// echo "After 2 Months: " . $addMonths->format("Y-m-d H:i:s") . "<br>";

// $addYears = (clone $now)->modify("+1 year");
// echo "After 1 Year: " . $addYears->format("Y-m-d H:i:s") . "<br>";

// ==============================
// Subtract Time
// ==============================
// echo "<h3>Subtract Time</h3>";
// $subDays = (clone $now)->modify("-7 days");
// echo "7 Days Ago: " . $subDays->format("Y-m-d H:i:s") . "<br>";

// $subHours = (clone $now)->modify("-4 hours");
// echo "4 Hours Ago: " . $subHours->format("Y-m-d H:i:s") . "<br>";

// $subMonths = (clone $now)->modify("-3 months");
// echo "3 Months Ago: " . $subMonths->format("Y-m-d H:i:s") . "<br>";

// $subYears = (clone $now)->modify("-2 years");
// echo "2 Years Ago: " . $subYears->format("Y-m-d H:i:s") . "<br>";



// echo "<h3>6. Date Difference</h3>";
// $today = new DateTime();
// $event = new DateTime("2025-12-31 ");
// $diff = $today->diff($event);

// echo "Today: " . $today->format("Y-m-d H:i:s a") . "<br>";
// echo "Event Date: " . $event->format("Y-m-d H:i:s a") . "<br>";
// echo "Difference: " . $diff->days . " days left<br>";
// echo "Exact: " . $diff->y . " years, " . $diff->m . " months, " . $diff->d . " days<br>";




//  echo time(); // e.g., 1730681400

// $timestamp = 1730681400;
// echo date("Y-m-d H:i:s", $timestamp); // e.g., 2024-11-06 14:30:00

// echo date("Y-m-d H:i:s"); // Outputs current date and time in "YYYY-MM-DD HH:MM:SS" format

// echo date("l, F j, Y"); // e.g., "Tuesday, November 6, 2024"
// echo date("Y-m-d\TH:i:sP"); // e.g., "2024-11-06T14:30:59+01:00"
// echo date("H:i:s A"); // e.g., "06/11/2024 14:30:59 PM"


// echo date("Y-m-d", strtotime("+5 days")); // Adds 5 days to the current date

// echo date("Y-m-d", strtotime("+3 months")); // Adds 3 months to the current date
// echo date("Y-m-d", strtotime("+2 years")); // Adds 2 years to the current date
// echo date("Y-m-d H:i:s", strtotime("+2 hours +30 minutes +45 seconds")); // Adds 2 hours, 30 minutes, and 45 seconds
// $start_date = "2024-11-06";
// echo date("Y-m-d", strtotime($start_date . " +10 days")); // Adds 10 days to the specified date

// echo date("Y-m-d", strtotime("-7 days")); // Subtracts 7 days from the current date
// echo date("Y-m-d", strtotime("-1 month")); // Subtracts 1 month from the current date


// // Adding 1 week to the current date
// echo date("Y-m-d", strtotime("+1 week")); // e.g., 2024-11-13

// // Adding 6 hours to the current time
// echo date("Y-m-d H:i:s", strtotime("+6 hours")); // e.g., 2024-11-06 20:30:59

// // Subtracting 30 minutes from a specific date and time
// $specific_datetime = "2024-11-06 14:30:00";
// echo date("Y-m-d H:i:s", strtotime($specific_datetime . " -30 minutes")); // e.g., 2024-11-06 14:00:00




// ========================================
// 7. Age Calculator (Extra Useful Example)
// ========================================
echo "<h3>7. Age Calculator</h3>";
$dob = new DateTime("1995-08-15");
$age = $dob->diff(new DateTime());
echo "Date of Birth: " . $dob->format("Y-m-d") . "<br>";
echo "Current Age: " . $age->y . " years, " . $age->m . " months, " . $age->d . " days<br>";

?>