#!/usr/bin/php
<?php
	function match_name($img)
	{
		preg_match("/^.*?([^\/]+)$/", $img, $matches);
		if (substr($matches[1], -1) === "\"" || substr($matches[1], -1) === "'")
			return (substr($matches[1], 0, -1));
		return ($matches[1]);
    }

	if ($argc == 2)
	{
		$url = $argv[1];
		$dir = str_replace('https://', '', $url);
		$dir = str_replace('http://', '', $dir);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FAILONERROR, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        $html = curl_exec($curl);
		$types = [];
        preg_match_all("/(<img[^>])(.*).(svg|png|jpeg|jpg|gif|bmp)/i", $html, $matches);
        $types = array_merge($types, $matches[0]);
		if (count($types) == 0)
            exit("No images found\n");
		foreach ($types as $img){
			$temp[] = substr($img, strrpos($img, '"') + 1);
        }
		if (count($temp) == 0)
			exit("No images found\n");
		foreach ($temp as $link)
		{
			if ($link[0] == '/' && $link != "")
				$final[] = $url.$link;
			else if ($link != "")
				$final[] = $link;
		}
		if (count($final) == 0)
			exit("No images found\n");
		else
		{
			if (!file_exists($dir))
                mkdir($dir, 0755, true);
            else
                exit("'$dir' directory already exists\n");
			foreach ($final as $image)
			{
				$curl = curl_init($image);
				curl_setopt($curl, CURLOPT_HEADER, 0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
				curl_setopt($curl, CURLOPT_TIMEOUT, 2);
				$exec = curl_exec($curl);
				curl_close ($curl);
				$f = fopen($dir."/".match_name($image),'x');
				fwrite($f, $exec);
				fclose($f);
			}
		}
	} else
		exit("No link found\n");
?>