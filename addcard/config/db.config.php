<?php
require_once "meekrodb.php";

// Meekro db provides db connection steing
// we have created this file so that our API can use this connection string to talk to db via meekrodb with mysql db


DB::$user = "webuser"; // Please give db username hete
DB::$password = "eVRCgImIzewzMOdb"; // please give password hete
//$sqlList = "CALL'getcard'();";
DB::$dbName = "donation"; // please give db name here



