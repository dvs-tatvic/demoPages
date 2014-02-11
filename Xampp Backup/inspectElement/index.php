<html>
	<head>
				<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script>
			$(document).ready(function(){
				$("*").hover(function(){
					$(this).css("border","1px solid black");
					//if(this.tagName == "BODY") $(this).removeClass("borderLine");
					
					//$("#myTagName").text(this.tagName);
					var myId = this.id;
					var myClass = $(this).attr('class');
					var parentId;
					var parentClass;
					if(myId=="")
					{
						parentId = $(this).parent().attr('id');
						if(parentId == "")
						{
								parentId = $(this).parentsUntil().attr('id');
						}
						$("#parentTagId").text(parentId);
					}
					
					if(myClass == undefined)
					{
						parentClass = $(this).parent().attr('class');
						if(parentClass == undefined)
						{
								parentClass = $(this).parentsUntil().attr('class');
						}
						$("#parentTagClass").text(parentClass);
						
					}
										
					
					$("#myTagName").text(this.tagName);
					$("#tagProperty").text(" id : "+myId+" || class : "+myClass);
					
				});
				
				$("*").mouseout(function(){
					$(this).css("border","none");
					$("#parentTagId").text("");
					$("#parentTagClass").text("");
					
				});
			});
		</script>
	</head>
	<style>
		#content{
			width:800px;
			height:400px;
			border:1px solid grey;
			margin:0px auto;
		}
		#mainHeader{
			width:100%;
			height:150px;
			position:absolute;
			top:0px;
			left:0px;
			border-bottom:2px solid black;
			float:left;
		}
	</style>
	<body>
			<div id="mainHeader">
					<label>This is TagName : </label><label id="myTagName"></label><br>
					<label>Tag Property : </label><label id="tagProperty"></label><br>
					<label>Parent Tag Id : </label><label id="parentTagId"></label><br>
					<label>Parent Tag Class : </label><label id="parentTagClass"></label>
			</div>
	
		
			
			<?php 
					// For file read : source of the given site
					
					$getSource = file_get_contents("http://www.appclickinfo.com");
				
					$myFile = "dumpData.txt";
					$f=@fopen($myFile,"w");
					fwrite($f,$getSource);
					fclose($f); // file close after write data
					
					// this part for the update string at header
					$fileName = "dumpData.txt";
					$newFile = @fopen($fileName,"r+");
					$str=file_get_contents($fileName);
					//replace something in the file string 
					$str=str_replace("<head>", "<head><base href='http://www.appclickinfo.com/' />",$str);
					file_put_contents($fileName, $str);
					fclose($newFile);
					
					// This is for read file which updated
					
					$fh = fopen("dumpData.txt", 'r'); 
					$fileData = fread($fh, filesize($myFile));				
							

					fclose($fh);
					echo $fileData;
				
			?>
			
		
	</body>
</html>