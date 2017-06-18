<?php
session_start();
?>
<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H2> Admin </H2>
		<div align=center> <div class="product">

        <?php
            /*$data = ft_getcsv("bdd/product.csv");
            if ($_GET != NULL)
                $filter = $_GET['category'];
            foreach($data as $elem)
            {
                if (ft_filter($elem[1], $filter) === TRUE) : ?>
                    <div class="horse"><div align=center>
                        <p><?php echo $elem[2] ?></p>
                        <div style="font-style:italic"><?php echo $elem[1] ?></div>
                        <div>
                            <?php   
                    if ($elem[5] == 0)
                {
                    echo '<p style="background-color:darkmagenta;color:white">SOLD OUT !</p>';
                    $filigrane = 'style="opacity:0.2";';
                }
                    else
                {
                    echo "<br />";
                    $filigrane = ""; 
					}*/ ?>
		   <a class="admin-icone" href="admin_users_page.php"> 
				<div>
					<p> Users </p> 
					<img class="logo-admin" src="http://www.icone-png.com/png/29/28583.png"/>
				</div>
			</a >
			<a class="admin-icone" href="admin_categories_page.php"> 
				<div>
					<p> Categories </p> 
					<img class="logo-admin" src="http://www.free-icons-download.net/images/label-icon-63765.png"/>
				</div>
			</a>

 
        </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>
