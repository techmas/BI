<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

echo "gapi";
require 'gapi.class.php';

echo "next";


$ga = new gapi("667531573047-t1dg7n8l808ab4rqm81e8q5rvi7eudqe@developer.gserviceaccount.com", "integrateGA-6727fbd5be3b.p12");


$ga->requestAccountData();

foreach($ga->getAccounts() as $result)
{
  echo $result . ' ' . $result->getId() . ' (' . $result->getProfileId() . ")<br />";
}
