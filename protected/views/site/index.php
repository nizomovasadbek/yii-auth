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
        </a><br>
        <?php
        if (Yii::app()->user->role == 'supervisor' || Yii::app()->user->role == 'admin') {
            echo '<a href="/user">Users</a>';
        }
        ?>
    </body>

</html>