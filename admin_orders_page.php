<?php
session_start();
?>
<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
  		<?php include("header.php"); ?>
    	<H2> Admin - Orders </H2> <br/>

		<?php
		$file = file_get_contents("bdd/order");
		if ($file == NULL)
			echo "No order :'(";
		else
		{
			$tab = unserialize($file);
			print_r($tab);
			foreach($tab as $elem)
			{
				?>
				<form class="form-admin" action="admin_orders_page.php" method="POST">
					User : <?php echo $elem['login']; ?> <br />
					Total : <?php echo $elem['total']; ?>$ <br />
					<input type="submit" name="submit" value="Accept">
					<input type="submit" name="submit" value="Cancel">
				</form> <br />
				<?php
			}
			?>
			<?php
		}
		?>
		<br />
    	<?php include("footer.php"); ?>
	</body>
</html>
