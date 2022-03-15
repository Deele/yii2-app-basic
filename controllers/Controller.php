<?php

namespace app\controllers;

use Yii;
use yii\web\Controller as YiiWebController;

/**
 * Web controller base
 *
 * @property string $title {@see Controller::setTitle()} {@see Controller::getTitle()}
 */
abstract class Controller extends YiiWebController
{

    /**
     * Sets the page title
     *
     * @param string|array $title
     * @param string $separator
     * @return self
     */
    public function setTitle($title, string $separator = ' - '): self
    {
        if (is_array($title)) {
            $title = implode($separator, $title);
        }
        $this->view->title = $title . ' | ' . Yii::$app->name;
        return $this;
    }

    /**
     * Returns the page title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->view->title ?? '';
    }
}
