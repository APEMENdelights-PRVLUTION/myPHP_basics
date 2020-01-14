<?php

function getByte($bytes)
{
    $symbol = "Bytes";
    if ($bytes > 1024) {
        $symbol = "KiB";
        $bytes /= 1024;
    }
    if ($bytes > 1024) {
        $symbol = "MiB";
        $bytes /= 1024;
    }
    if ($bytes > 1024) {
        $symbol = "GiB";
        $bytes /= 1024;
    }
    $bytes = round($bytes, 2);
    return $bytes . $symbol;
}

function getFreespace($path)
{
    if (preg_match("#^(https?|ftps?)://#si", $path)) {
        return false;
    }

    $freeBytes = disk_free_space($path);
    $totalBytes = disk_total_space($path);
    $usedBytes = $totalBytes - $freeBytes;

    $percentFree = 100 / $totalBytes * $freeBytes;
    $percentUsed = 100 / $totalBytes * $usedBytes;

    echo "Speichertotal: " . getByte($totalBytes) . "<br />";
    echo "Belegter Speicher: " . getByte($usedBytes);
    printf(" (%01.2f%%)", $percentUsed);
    echo "<br />";
    echo "Freier Speicher: " . getByte($freeBytes);
    printf(" (%01.2f%%)", $percentFree);
}

//Usage
getFreespace(".");
