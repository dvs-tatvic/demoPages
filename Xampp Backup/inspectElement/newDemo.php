<?php
    $siteUrl = "Default";
    if(isset($_GET["Url"]))
    {
        $siteUrl = $_GET["Url"];
        $host = $siteUrl;
        if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
        if($_GET["ext"]=="1")
        {
            $siteUrl = "http://www.".$_GET["Url"];
        }
        else
        {
            $siteUrl = "https://www.".$_GET["Url"];
        }
        fclose($socket);
        } else {
        ?>
                <script language="javascript">
                alert("Sorry!! Site not Found..");
                history.back();
                //document.getElementById("Url").Focus();
                </script>
        <?php
               
        }
    }
    else
    {
        $siteUrl = "http://www.appclickinfo.com";
    }
?>
<html>
    <head>
       <script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>
       <script  src="myElement.js"></script>
	
       <link rel="stylesheet" type="text/css" href="style.css" >
       
        <title>Site Inspector</title>
    </head>
    <body>
        <div id="headerPart">
                
            <div id="sidePanel">
                <ul>
                    <li><label>Current Tag :</label>
                        <label  id="myTagName" class="newlbl"></label>
                    </li>
                    <li><label>Property :</label>
                        <label  id="tagProperty" class="newlbl"></label>
                        
                    </li>
                    <li><label>Parent Tag Id :</label>
                        <label  id="parentTagId" class="newlbl"></label>
                        
                    </li>
                    <li><label>Parent Tag Class  :</label>
                        <label  id="parentTagClass" class="newlbl"></label>
                        
                    </li>
                </ul>
                
            </div>
            <div id="dispPanel">
            <h1>Welcome !!<?php //echo $siteUrl ?></h1>
            
            <form action="" method="get">
                <label>Enter Site Here : </label>
                <select name="ext">
                    <option value="1">http://www</option>
                    <option value="2">https://www</option>
                </select>
                <input type="text" name="Url">
                <input type="submit" value="Goto" name="gotoSubmit"><br>
                <span class="msg">(e.g :flipkart.com)</span>
                
            </form>
            </div>
            
        </div>
        <div id="bodyPart">
           
            <?php 
					// For file read : source of the given site
                                      
                                        $getSource = file_get_contents($siteUrl);
                                        $myFile = "dumpData.txt";
					$f=@fopen($myFile,"w");
					fwrite($f,$getSource);
					fclose($f); // file close after write data
					
					// this part for the update string at header
					$fileName = "dumpData.txt";
					$newFile = @fopen($fileName,"r+");
					$str=file_get_contents($myFile);
					//replace something in the file string 
					$strNew=str_replace("<head>", "<head><base href=$siteUrl />",$str);
					file_put_contents($fileName, $strNew);
					fclose($newFile);
					
					// This is for read file which updated
					
					$fh = fopen("dumpData.txt", 'r'); 
					$fileData = fread($fh, filesize($myFile));				
							

					//fclose($fh);
					echo $fileData;
				
			?>
			
			
						
        </div>
        
    </body>
</html>
