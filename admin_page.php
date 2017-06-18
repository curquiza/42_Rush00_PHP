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
			<a class="admin-icone" href="admin_products_page.php"> 
				<div>
					<p> Products </p> 
					<img class="logo-admin" src="http://www.freeiconspng.com/uploads/production-icon-26.jpg"/>
				</div>
			</a>
        </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>
