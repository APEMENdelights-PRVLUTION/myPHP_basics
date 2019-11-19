This library use the php built in gd2 extension. This extension is relevant for the basic image processing routines.
GD2 is not enabled by default so you have to enable it before using the script.

Enable GD2:
1. Open your php.ini file
        If you don't know where it is than create a small php info script which will tell you.
           <?php phpinfo(); ?>
        You can find the location in the header area.
2. Find the "extension_dir" php variable and set it to a correct value
        Eg.: extension_dir = "d:\Program Files\Php\extensions\"
3. Now enable the GD2 library. Find "extension=php_gd2.dll" and remove the semicolon(;) from the beginning of the line.
4. Check the settings. Call again the phpinfo file. You should find a section with caption "gd" and the parameter 
        "GD Support" must be enabled.
        
        