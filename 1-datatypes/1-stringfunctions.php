<?php
/*
 * A string is a sequence of characters, like "Hello world!".
 */




/* strlen() - Return the Length of a String
 * The PHP strlen() function returns the length of a string.
 */
echo ("<h3>strlen - Returns the Length of a string</h3>");
echo strlen("Hello world!"); // outputs 12


/*
 *str_word_count() - Count Words in a String
The PHP str_word_count() function counts the number of words in a string.
 */
echo ("<h3>str_word_count() - Count Words in a String</h3>");

echo str_word_count("Hello world!"); // outputs 2

/*
 * strrev() - Reverse a String
 * The PHP strrev() function reverses a string.
 */
echo ("<h3>strrev() - Reverse a String</h3>");

echo strrev("Hello world!"); // outputs !dlrow olleH

/* strpos() - Search For a Text Within a String
* The PHP strpos() function searches for a specific text within a string.
* If a match is found, the function returns the character position of the first match.
 * If no match is found, it will return FALSE.
 */
echo ("<h3>strpos() - Search For a Text Within a String and return position</h3>");

echo strpos("Hello world!", "world"); // outputs 6

/* str_replace() - Replace Text Within a String
* The PHP str_replace() function replaces some characters with some other characters in a string.
*
*/
echo ("<h3>str_replace() - Replace Text Within a String</h3>");

echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!

/*
 *
 */

/*
 *
 */

/*
 *
 */
