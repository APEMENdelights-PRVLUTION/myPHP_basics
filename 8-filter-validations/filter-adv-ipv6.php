<!DOCTYPE html>
<html>
<body>

<?php

/*
 * Validate IPv6 Address
The following example uses the filter_var() function to check if the variable $ip is a valid IPv6 address:
 */
// Variable to check
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

// Validate ip as IPv6
if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
    echo("$ip is a valid IPv6 address");
} else {
    echo("$ip is not a valid IPv6 address");
}
?>

</body>
</html>
