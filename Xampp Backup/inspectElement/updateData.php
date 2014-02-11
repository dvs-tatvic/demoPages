<?php
					//code for insert a new line
					$fileName = "dump.txt";
					$myFile = @fopen($fileName,"r+");
					$str=file_get_contents($fileName);

					//replace something in the file string - this is a VERY simple example

						$str=str_replace("<head>", "<head><base href='http://www.appclickinfo.com/' />",$str);

						file_put_contents($fileName, $str);
						
?>