<?php
require_once "Response.php";

//$resp1 = new Response(404, "application/json");
$resp1 = new Response(403, "application/xml");
$resp1->setHeaderAndCode();
