<html>
	
     <head>
        <title>redelijk</title>
        <link rel="stylesheet"  type="text/css" href="http://localhost/rsc/CSS/CSS_for_e-learning.css" />
            
         
     </head>
	<body>
            <?php 
            $data['barItems'] = "1";
            $data['destinations'] = array(
                0 => "http://localhost/index.php/logout"
            );
            $data['descriptions'] = array(
                0 => "uitloggen"
            );$this->load->view('header', $data);
            echo form_open('login'); ?>
 
            
            
	</body>
</html>
