<?php

var_dump("number vs string");
var_dump(1 == "1");
var_dump(1 === "1");
var_dump(1 === (int) "1");
var_dump((string) 1 !== (int) "1");


var_dump("number vs float");
var_dump(1 == 1.0);
var_dump(1 === 1.0);
var_dump((float) 1 === 1.0);
var_dump((float) 1 !== (int) 1.0);


var_dump("number vs boolean");
var_dump(1 == true);
var_dump(1 === true);
var_dump((boolean) 1 === true);
var_dump((boolean) 1 !== (integer) true);


var_dump("string vs boolean");
var_dump("1" == true);
var_dump("1" === true);
var_dump("1" === (string) true);
var_dump("" == false);
var_dump("" === false);
var_dump((boolean) "" === false);


var_dump("string vs float");
var_dump(1 == 1.0);
var_dump(1 === 1.0);
var_dump((float) 1 === 1.0);
var_dump((float) 1 !== (int) 1.0);


var_dump("array vs number");
$arr[] = 1;
$arr[] = 2.0;
var_dump($arr[0] == 1);
var_dump($arr[0] === 1);


var_dump("array vs string");
$str = "abc";
var_dump($str["0"] == "a");
var_dump($str["0"] === "a");

var_dump("null / empty array");
var_dump(null == []);
var_dump(null === []);
var_dump((array) null === []);
//var_dump(null === (null)[]);