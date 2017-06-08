<?php

/**
 * 替换文件内容
 *
 */
if (! function_exists('replaceString'))
{
    function replaceString($old, $new, $file)
    {
        $fp = fopen($file, 'r');
		
		while(! feof($fp))
		{
			$buffer = fgets($fp, 4096);
		
			$buffer = str_replace($old, $new, $buffer);
		
			echo $buffer . "\n";
		}
		
		fclose($fp);
    }
}
