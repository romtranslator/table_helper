# table_helper
PHP utility for generating table files used in ROM translation

This is a utility I use to speed up the task of creating "table files" for ROM hacking. A table file is a simple text file detailing a text encoding scheme as a list of hex values and equivalent text characters.

Example:
01=あ
02=い
etc...

This utility uses various "character sets" (charsets) such as numerals [0-9], English upper case [A-Z], hiragana [あ-ん], etc... The user defines an array of hex values ($hex) and their character equivalents ($char) in table_helper.php. Only one value needs to be specified for each character set you'd like to print. The list of hex values and characters are generated based on the supplied hex value/character pair. It's geared toward working with custom 8-bit text encodings found in 8/16-bit games.

You can also define a custom character set for your game if there are extra characters, or non-standard orders of characters and you find it faster to define and print them rather than add them manually to your table file. A charset variable "$current_game" is set aside for this purpose. Alternately you can of course add any arbitrary character set variable as long as you add it to the globals array in library.php.

In order to generate diacritics properly for text encodings which store their diacritical mark and unvoiced character as two separate characters, define the dakuten and handakuten characters using the variables "$dakuten" and "$handakuten" where the values is the hex value of each in the encoding. As an example, a "ga" character in your text dump will then come out as "が" rather than "か゛". If the diacritical marks happen to come before the unvoiced character in your encoding set "$pre = true" in order to get "が" rather than "゛か".

I run this utility locally, by visiting "localhost/table_helper/table_helper.php" via a web browser where "table_helper" is the directory in which the utility is located in your htdocs folder. You can easily run the (W?)AMP stack on your Windows PC using XAMPP. The output is printed directly to the screen and can be copy/pasted into a text document.
