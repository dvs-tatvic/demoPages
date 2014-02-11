

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
                                       if(typeof myClass == "undefined")
                                           {
                                               myClass = "";
                                           }
					$("#tagProperty").text(" ID : "+myId+" || CLASS : "+myClass);
					
				});
				
				$("*").mouseout(function(){
					$(this).css("border","none");
					$("#parentTagId").text("");
					$("#parentTagClass").text("");
					
				});
                                $("#headerPart *,HTML,body").hover(function(){
					$(this).css("border","none");
                                        $("#parentTagId").text("");
                                        $("#myTagName").text("");
					$("#tagProperty").text("");
                                });
                                $("#headerPart *,#bodyPart, #wrapper *,body").hover(function(){
					$(this).css("border","none");
                                        
                                });
			
                        });
