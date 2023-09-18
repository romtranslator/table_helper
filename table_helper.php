<?php

include_once("library.php");

//an array of known hex values, one for
//each character set. EX: array("a5", "af") 
//$hex = array("09", "14",  "2d", "5b", "64", "90");
$hex = array(
"",
);

//an array of the corresponding known characters,
//one for each character set. EX: array("０", "あ")
/*$char = array(
"０",
"Ａ",
"ａ",
"あ",
"ぁ",
"ア",
"ァ",
"が",
"ガ",
);*/
$char = array(
"",
);

//hex value of the dakuten character (optional)
//$dakuten = '';

//hex value of the handakuten character (optional)
//$handakuten = '';

//set true if diacritical marks come before the unvoiced character
//$pre = true;

//available character sets
$numerals = get_charset("charsets/numerals.utf");
$english_upper = get_charset("charsets/english_upper.utf");
$english_lower = get_charset("charsets/english_lower.utf");
$hiragana = get_charset("charsets/hiragana.utf");
$hiragana_small = get_charset("charsets/hiragana_small.utf");
//$hiragana_small = get_charset("charsets/hiragana_small_alt.utf");
$hiragana_diacritic = get_charset("charsets/hiragana_diacritic.utf");
$katakana = get_charset("charsets/katakana.utf");
$katakana_small = get_charset("charsets/katakana_small.utf");
$katakana_diacritic = get_charset("charsets/katakana_diacritic.utf");
//use $current_game for a custom character set you've prepared for a particular game
//$current_game = get_charset("");

//iterate through each hex/char pair and print the
//charset in table format based on the supplied value
for ($x = 0; $x < (count($hex)); $x++) {
	print_table($char[$x], $hex[$x], $dakuten, $handakuten, $pre);
	//add a line of whitespace between each set for readability
	print "<br>";
}