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
					<img src="http://files.softicons.com/download/business-icons/mono-business-icons-by-custom-icon-design/png/256x256/users.png"/>
				</div>
			</a >
			<a class="admin-icone" href="admin_categories_page.php"> 
				<div>
					<p> Categories </p> 
					<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRi5WjlY1DMD3cZq6o__7f1djC_eHcRngbQTXbw9V8jJ1zzIBRx"/>
				</div>
			</a>

 
        </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>
