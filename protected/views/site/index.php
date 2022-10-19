<html>
    <head>
        <title>
            <?php echo Yii::app()->name; ?>
        </title>
    </head>
    <body>
        Hello <?php echo $username; ?><br>
        <a href="/auth/logout">
            Logout
        </a>
    </body>
    
</html>