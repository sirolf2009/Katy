<html>
    <head>
        <title>header</title>
        <link rel="stylesheet"  type="text/css" href="http://localhost/rsc/CSS/CSS_for_e-learning.css" />
    </head>
    <body>
        <div class="topBar">
            <input type="image" src="http://localhost/rsc/images/KatyLogo.png" class="logo" onclick="location.href = 'http://localhost/index.php/'">
            <?php
                for($i = 0; $i < $barItems; $i++) {
                    $cssClass = $i === 0 ? "barItemFirst" : ($i === $barItems-1 ? "barItemLast" : "barItem");
                    echo('<a class="'.$cssClass.'" href="'
                            .$destinations[$i].'">'
                            .$descriptions[$i].'</a>');
                }
            ?>
        </div>
    </body>
</html>