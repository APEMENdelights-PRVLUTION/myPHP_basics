<!--
Usage
Copy and paste the above code in your webpage.
The function get_server_status used to monitor the status of your server by entering the Domain name or IP address.
Simple php script monitors the status of your server.

-->

<?php
error_reporting(0);
function get_server_status($value)
{
    $check = explode(".", $value);
    $status = "Server Status :";
    if (is_numeric($check[0])) {
        if (!filter_var($value, FILTER_VALIDATE_IP) === false) {
            $socket = @fsockopen($value, 80, $errorNo, $errorStr, 3);
            if (!$socket)
                $output = "<span style='color:#ff0000;font-weight:bold;'>OFFLINE</span>";
            else
                $output = "<span style='color:#00ff00;font-weight:bold;'>ONLINE</span>";
        } else {
            $output = "<span style='color:red;font-weight:bold;'>$value is not a valid IP address</span>";
        }
        return $output;
    } else {
        if (filter_var(gethostbyname($value), FILTER_VALIDATE_IP)) {
            $socket = @fsockopen($value, 80, $errorNo, $errorStr, 3);
            if (!$socket)
                $output = "<span style='color:red;font-weight:bold;'>OFFLINE</span>";
            else
                $output = "<span style='color:green;font-weight:bold;'>ONLINE</span>";
        } else {
            $output = "<span style='color:red;font-weight:bold;'>$value is not a valid Domain</span>";
        }
        return $output;
    }
}

$status = get_server_status("hscripts.com");
echo "<div align=center>Server Status : $status</div>";
?>
<?php
get_server_status();
?>