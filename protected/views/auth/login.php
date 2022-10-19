<html>
    <head>
        <title>
            <?php echo Yii::app()->name; ?>
        </title>
    </head>
    <body>
        <div class="form">
            <?php echo CHtml::beginForm(); ?>
            <?php echo CHtml::errorSummary($model); ?>

            <div class="row">
                <?php echo CHtml::activeLabel($model, 'Username'); ?>
                <?php echo CHtml::activeTextField($model, 'username'); ?>
            </div>

            <div class="row">
                <?php echo CHtml::activeLabel($model, 'Password'); ?>
                <?php echo CHtml::activeTelField($model, 'password'); ?>
            </div>

            <div class="row">
                <?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?>
                <?php echo CHtml::activeLabel($model, 'Remember me'); ?>
            </div>

            <div class="row submit">
                <?php echo CHtml::submitButton('Login'); ?>
            </div>

            <?php echo CHtml::endForm(); ?>

        </div>
    </body>
</html>