<html>
    <head>
      <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H1>Sign Up</H1> <br />
    <form action="sign_up_action.php" method="POST">
        Choose a login: <input type="text" name="login" value="">
        <br/ >
        Create a password: <input type="password" name="passwd" value="">
        <br/ >
        <input type="submit" name="submit" value="OK">
    </form> <br />
    <a href="sign_in.php">Already a client ? Sign in here !</a>
    <?php include("footer.php"); ?>
    </body>
</html>