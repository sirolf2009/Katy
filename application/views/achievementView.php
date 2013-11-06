<html>
    <head>
        <title>achievements</title>
            <style type="text/css">
                .topBar {
                    background-color: #83c8f9;
                    border: 2px solid;
                    border-color: #2984c3;
                    height: 75px;
                    width: 100%;
                }
                .greatdiv{
                    background-color: #ceceed; 
                    border: 2px solid;
                    border-color: #2984c3;
                    width: 98%;
                    height: 750px;
                    margin: 1%;
                }
				.smalldiv{
					background-color: #ceceed; 
                    border: 2px solid;
                    border-color: #2984c3;
                    width: 22%;
                    height: 150px;
                    margin: 1%;
					float: left;
				}
				
            </style>
			
			
    </head>
    <body>
			
        <?php $this->load->view('commonHeader'); ?>
        <div>
            <div class ="greatdiv">
				<?php
                                    $achievement_Amount = $achievement_Amount + 1;
                                    for ($i = 1; $i < $achievement_Amount; $i++) {
                                         echo ("<div id ='achivement1' class ='smalldiv'> ${Name . $i} </br> ${IMG . $i} </br> ${Desc . $i}</div>");
                                    }   
                                        
                                      ?>                                       
                                    
                                    
                                
                                
                                
				
                                				
            </div>
			
    </body>
</html>