<?php

/** @var yii\web\View $this */
/** @todo Remove developer note text and replace about page text with meaningful one */

use yii\helpers\Html;
?>
<div class="site-about">
    <h1><?= Html::encode(Yii::$app->controller->getHeading()) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
