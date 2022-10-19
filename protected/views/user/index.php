<html>
    <head>
        <title>
            <?php echo Yii::app()->name; ?>
        </title>
        <style>
            table, td, th {
                border:1px solid black;
            }
        </style>
    </head>

    <body>

        <table style="width:70%">
            <tr>
                <td>Username</td>
                <td>E-mail</td>
                <td>Role</td>
            </tr>
            <?php
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user->username . '</td>';
                echo '<td>' . $user->email . '</td>';
                echo '<td>' . $user->role . '</td>';
                echo '</tr>';
            }
            ?>
        </table>

    </body>

</html>