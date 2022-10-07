<?php

// This has been tested on a macOS host to work.
// This will not work on a Windows host.

exec("netstat -nr | grep default", $ip_output);
$ip_output = implode("\n", $ip_output);
preg_match_all('/(\d{1,3}.){3}\d{1,3}/', $ip_output, $matches);
$ip_adress = $matches[0][0];

exec("netstat -nr | grep $ip_adress", $mac_output);
$mac_output = implode("\n", $mac_output);
preg_match_all('/..:..:..:..:..:../', $mac_output, $matches);

$macAddress = $matches[0][0];

echo "IP:\t$ip_adress\nMAC:\t$macAddress\n";
