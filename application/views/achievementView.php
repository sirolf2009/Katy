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
                                
				$this->load->controller('achievement');		
				for($i = 0; $i < $achievement_Amount; $i++) {
			 		
                                        echo $data["name"];
				}
								
				?>
				<div class ="smalldiv"> dad  </div>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div> </br>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div> </br>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div> </br>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div>
				<div class ="smalldiv"> hello </div> </br>
				
            </div>
			
    </body>
</html>