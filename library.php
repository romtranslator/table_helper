<?php

//takes a path to a charset and returns an array of values
function get_charset($charset) {
	//open file
	$handle = fopen($charset, "r");
	//read contents
	$contents = fread($handle, filesize($charset));
	//close file
	fclose($handle);
	
	//split at line breaks
	$contents = mb_split ("
" , $contents);
	
	//return results
	return $contents;
}

function print_table($char, $hex, $dakuten = null, $handakuten = null, $pre = null) {
	
	//pick the charset in which the $char input appears
	if (in_array($char, $GLOBALS["numerals"])) {
		$charset = $GLOBALS["numerals"];
	} elseif (in_array($char, $GLOBALS["english_upper"])) {
		$charset = $GLOBALS["english_upper"];
	} elseif (in_array($char, $GLOBALS["english_lower"])) {
		$charset = $GLOBALS["english_lower"];
	} elseif (in_array($char, $GLOBALS["hiragana"])) {
		$charset = $GLOBALS["hiragana"];
	} elseif (in_array($char, $GLOBALS["hiragana_small"])) {
		$charset = $GLOBALS["hiragana_small"];
	} elseif (in_array($char, $GLOBALS["hiragana_diacritic"])) {
		$charset = $GLOBALS["hiragana_diacritic"];
	} elseif (in_array($char, $GLOBALS["katakana"])) {
		$charset = $GLOBALS["katakana"];
	} elseif (in_array($char, $GLOBALS["katakana_small"])) {
		$charset = $GLOBALS["katakana_small"];
	} elseif (in_array($char, $GLOBALS["katakana_diacritic"])) {
		$charset = $GLOBALS["katakana_diacritic"];
	} elseif (in_array($char, $GLOBALS["current_game"])) {
		$charset = $GLOBALS["current_game"];
	}
	
	//if a charset is found
	if (isset($charset)) {
		
		//set position of char in charset
		$pos = array_search($char, $charset);
		//get size of charset
		$count = count($charset);
		
		//switch hex value to dec for calculation
		$hex = hexdec($hex);
		
		//iterate through the charset
		for ($x = 0; $x < ($count-1); $x++) {
			//print the hex/char pair, calculating
			//hex  for based on the supplied value		
			
			$byte = ($hex - ($pos - $x));
			
			$dakuten_chars = array(
				"か" => "が",
				"き" => "ぎ",
				"く" => "ぐ",
				"け" => "げ",
				"こ" => "ご",
				"さ" => "ざ",
				"し" => "じ",
				"す" => "ず",
				"せ" => "ぜ",
				"そ" => "ぞ",
				"た" => "だ",
				"ち" => "ぢ",
				"つ" => "づ",
				"て" => "で",
				"と" => "ど",
				"は" => "ば",
				"ひ" => "び",
				"ふ" => "ぶ",
				"へ" => "べ",
				"ほ" => "ぼ",
				"カ" => "ガ",
				"キ" => "ギ",
				"ク" => "グ",
				"ケ" => "ゲ",
				"コ" => "ゴ",
				"サ" => "ザ",
				"シ" => "ジ",
				"ス" => "ズ",
				"セ" => "ゼ",
				"ソ" => "ゾ",
				"タ" => "ダ",
				"チ" => "ヂ",
				"ツ" => "ヅ",
				"テ" => "デ",
				"ト" => "ド",
				"ハ" => "バ",
				"ヒ" => "ビ",
				"フ" => "ブ",
				"ヘ" => "ベ",
				"ホ" => "ボ",
			);
				
			$handakuten_chars = array(
				"は" => "ぱ",
				"ひ" => "ぴ",
				"ふ" => "ぷ",
				"へ" => "ぺ",
				"ほ" => "ぽ",
				"ハ" => "パ",
				"ヒ" => "ピ",
				"フ" => "プ",
				"ヘ" => "ペ",
				"ホ" => "ポ",
			);
			
			print (strtoupper(str_pad(dechex($byte), 2, "0", STR_PAD_LEFT)) .  "=" . $charset[$x] ."<br>");
			
			if ($dakuten != null && array_key_exists($charset[$x], $dakuten_chars)) {
					print (strtoupper(($pre ? $dakuten : '') . str_pad(dechex($byte), 2, "0", STR_PAD_LEFT) . ($pre ? '' : $dakuten)) .  "=" . $dakuten_chars[$charset[$x]] ."<br>");
			}
			if ($handakuten != null && array_key_exists($charset[$x], $handakuten_chars)) {
					print (strtoupper(($pre ? $handakuten : '') . str_pad(dechex($byte), 2, "0", STR_PAD_LEFT) . ($pre ? '' : $handakuten)) .  "=" . $handakuten_chars[$charset[$x]] ."<br>");
			}
		}
	//if no charset is found, print message
	} else {
		print "Character not found.";
	}
}