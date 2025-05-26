<?php #SQL to create empty eoi table if it doesn't exist
$create_eoi_table = "
CREATE TABLE IF NOT EXISTS `eoi` (
`EOInumber` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`Job Reference Number` set('Select','10000','10001') NOT NULL DEFAULT 'Select',
`First Name` varchar(20) NOT NULL,
`Last Name` varchar(20) NOT NULL,
`Street Address` varchar(40) NOT NULL,
`Suburb/town` varchar(40) NOT NULL,
`State` set('Select','VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL DEFAULT 'Select',
`Postcode` int(11) NOT NULL,
`Email Address` varchar(100) NOT NULL,
`Phone number` int(11) NOT NULL,
`Python experience` tinyint(1) NOT NULL,
`SQL experience` tinyint(1) NOT NULL,
`C/C++ experience` tinyint(1) NOT NULL,
`PowerShell experience` tinyint(1) NOT NULL,
`Other skills` text NOT NULL,
`Status` set('New','Current','Final') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

#Query to create table if it doesn't exist
mysqli_query($conn, $create_eoi_table);
?>