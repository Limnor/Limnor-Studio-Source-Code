<?php

/*
	Web Application 
	Copyright Longflow Enterprises Ltd
	2011

*/

class WebApp
{
	public $PhpPhysicalFolder;
	function __construct()
	{
		$this->PhpPhysicalFolder = dirname(realpath(__FILE__));
	}
	public function GetSessionVariable($name)
	{
		if(isset($_COOKIE[$name]))
		{
			return $_COOKIE[$name];
		}
		return null;
	}
	public function SetSessionVariable($name, $value)
	{
		setrawcookie($name, $value, time()+60*20);
	}
}
function startsWith($haystack,$needle,$case=true)
{
	if($case)
		return strpos($haystack, $needle, 0) === 0;
	return stripos($haystack, $needle, 0) === 0;
}
function endsWith($haystack,$needle,$case=true)
{
	$expectedPosition = strlen($haystack) - strlen($needle);
	if($case)
		return strrpos($haystack, $needle, 0) === $expectedPosition;
	return strripos($haystack, $needle, 0) === $expectedPosition;
}
function contains($haystack,$needle,$case=true)
{
	$r;
	if($case)
		$r = strpos($haystack, $needle, 0);
	else
		$r = stripos($haystack, $needle, 0);
	return ($r === 0) || $r > 0;
}
function removeStringArrayElement(&$strArray, $value, $case, $compare)
{
	$i = 0;
	$r = 0;
	foreach($strArray as $v)
	{
		if($compare == 0) //starts
		{
			if(startsWith($v, $value, $case))
			{
				unset($strArray[$i]);
				$r++;
			}
		}
		else if($compare == 1) //ends
		{
			if(endsWith($v, $value, $case))
			{
				unset($strArray[$i]);
				$r++;
			}
		}
		else if($compare == 2) //contains
		{
			if(contains($v, $value, $case))
			{
				unset($strArray[$i]);
				$r++;
			}
		}
		else //equal
		{
			if($case)
			{
				if($v == $value)
				{
					unset($strArray[$i]);
					$r++;
				}
			}
			else
			{
				if(strlen($v) == strlen($value))
				{
					if(stripos($v, $value, 0) === 0)
					{
						unset($strArray[$i]);
						$r++;
					}
				}
			}
		}
		$i++;
	}
	return $r;
}
function randomString($length = 10)
{
	$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$string = "";
	for ($p = 0; $p < $length; $p++) {
		$string .= $characters[mt_rand(0, strlen($characters))];
	}
	return $string;
}

?> 