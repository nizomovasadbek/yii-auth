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
                <td>ID</td>
                <td>Username</td>
                <td>E-mail</td>
                <td>Role</td>
            </tr>
            <?php
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td><a href="/user/edit/' . $user->id . '">' . $user->id . '</a></td>';
                echo '<td>' . $user->username . '</td>';
                echo '<td>' . $user->email . '</td>';
                echo '<td>' . $user->role . '</td>';
                echo '</tr>';
            }
            ?>
        </table>

        <p>
            <?php if (Yii::app()->user->role == 'supervisor') echo '<a href="/user/delete">Delete</a>'; ?>
        </p>

    </body>

</html>