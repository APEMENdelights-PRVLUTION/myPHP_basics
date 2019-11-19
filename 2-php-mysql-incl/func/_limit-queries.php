<?php

//Assume we wish to select all records from 1 - 30 (inclusive) from a table called "Orders".
//
// The SQL query would then look like this:
$sql = "SELECT * FROM Orders LIMIT 30";
//When the SQL query above is run, it will return the first 30 records.
//
//What if we want to select records 16 - 25 (inclusive)?
//
//Mysql also provides a way to handle this: by using OFFSET.
//
//The SQL query below says "return only 10 records, start on record 16 (OFFSET 15)":

$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
// You could also use a shorter syntax to achieve the same result:

$sql = "SELECT * FROM Orders LIMIT 15, 10";
// Notice that the numbers are reversed when you use a comma.