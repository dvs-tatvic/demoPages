
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
            <h1>Welcome !!</h1>
            
            <form action="" method="get">
                <label>Enter Site Here : </label>
                <input type="text" name="mySite">
                <input type="submit" value="Goto" name="gotoSubmit"><br>
                <span class="msg">(e.g : http://www.google.com)</span>
                
            </form>
            </div>
            
        </div>
        <div id="bodyPart">
           
            <?php 
					// For file read : source of the given site
                                        if(isset($_GET["mySite"])=="")
                                            $site = "http://www.appclickinfo.com";
                                        else
                                            $site = $_GET["mySite"];  
					
                                        $getSource = file_get_contents($site);
                                        $myFile = "dumpData.txt";
					$f=@fopen($myFile,"w");
					fwrite($f,$getSource);
					fclose($f); // file close after write data
					
					// this part for the update string at header
					$fileName = "dumpData.txt";
					$newFile = @fopen($fileName,"r+");
					$str=file_get_contents($fileName);
					//replace something in the file string 
					$str=str_replace("<head>", "<head><base href=$site />",$str);
					file_put_contents($fileName, $str);
					fclose($newFile);
					
					// This is for read file which updated
					
					$fh = fopen("dumpData.txt", 'r'); 
					$fileData = fread($fh, filesize($myFile));				
							

					fclose($fh);
					echo $fileData;
				
			?>
			
			
						
        </div>
        
    </body>
</html>
