<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H1>Sign in</H1> <br />
    <form action="sign_in_action.php" method="POST">
        Login: <input type="text" name="login" value="">
        <br/ >
        Password: <input type="password" name="passwd" value="">
        <br/ >
        <input type="submit" name="submit" value="OK">
    </form> <br />
    <a href="sign_up.php">Not a client ? Sign up here !</a> 
    <?php include("footer.php"); ?>
    </body>
</html>