<html>
    <head>
        <title>
            Edit user
        </title>
    </head>

    <body>
        <h1><?php echo $user->username; ?></h1>
        <div class="form">

            <?php echo CHtml::beginForm(); ?>
            <?php echo CHtml::errorSummary($model); ?>

            <div class="row">
                <?php echo CHtml::activeLabel($model, 'E-Mail'); ?>
                <?php echo CHtml::activeTextField($model, 'email', array('value' => $user->email)); ?>
            </div>

            <div class="row">
                <?php echo CHtml::activeLabel($model, 'Role'); ?>
                <?php
                echo CHtml::activeDropDownList($model, 'role', [
                    'user' => 'user',
                    'admin' => 'admin'
                ]);
                ?>
            </div>

            <div class="row submit">
            <?php echo CHtml::submitButton('Update'); ?>
            </div>

<?php echo CHtml::endForm(); ?>

        </div>

    </body>

</html>