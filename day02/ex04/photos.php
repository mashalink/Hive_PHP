#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		if (preg_match('/^http:\/\//', $argv[1]))
			$folder = str_replace('http://', '', $argv[1]);
		if (preg_match('/^https:\/\//', $argv[1]))
			$folder = str_replace('https://', '', $argv[1]);
		$web = curl_init();
		$url = "https://".$folder;
	 	curl_setopt($web, CURLOPT_URL, $url);
	 	curl_setopt($web, CURLOPT_RETURNTRANSFER, true);
		$str = curl_exec($web);
		$array = array();
		preg_match_all('/<img[^>]+.jpg+/i', $str, $matches);
		$array = array_merge($array, $matches[0]);
		preg_match_all('/<img[^>]+.gif+/i', $str, $matches);
		$array = array_merge($array, $matches[0]);
		preg_match_all('/<img[^>]+.svg+/i', $str, $matches);
		$array = array_merge($array, $matches[0]);
		preg_match_all('/<img[^>]+.png+/i', $str, $matches);
		$array = array_merge($array, $matches[0]);
		preg_match_all('/<img[^>]+.jpeg+/i', $str, $matches);
		$array = array_merge($array, $matches[0]);
		if (count($array) == 0)
		{
			echo "This page does not contain pictures!\n";
			exit (-1);
		}
		foreach($array as $pic)
		{
			$temp[] = substr($pic, strrpos($pic, '"') + 1);
		}
		if (count($temp) == 0)
		{
			echo "This page does not contain pictures!\n";
			exit (-1);
		}
		foreach($temp as $pic)
		{
			if ($pic[0] == '/')
				$links[] = $argv[1].$pic;
			else if ($pic !== '')
				$links[] = $pic;
		}
		if (count($links) == 0)
		{
			echo "This page does not contain pictures!\n";
			exit (-1);
		}
		else
		{
			if (!file_exists($folder))
				mkdir($folder, 0755, true);
			foreach($links as $pic)
			{
				$web = curl_init($pic);
				curl_setopt($web, CURLOPT_RETURNTRANSFER, true);
				$rawdata=curl_exec($web);
				curl_close($web);
				$picname = substr($pic, strrpos($pic, '/') + 1);
				if (!file_exists("$folder/$picname"))
					file_put_contents("$folder/$picname", $rawdata);
			}
		}
	}
	else
		echo "Wrong number of arguments!\n";
?>