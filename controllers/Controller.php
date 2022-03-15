<?php

namespace app\controllers;

use Exception;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller as YiiWebController;
use yii\widgets\Breadcrumbs;

/**
 * Web controller base
 *
 * @property string $title {@see Controller::setTitle()} {@see Controller::getTitle()}
 * @property array $breadcrumbs {@see Controller::setBreadCrumbs()} {@see Controller::getBreadCrumbs()}
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

    /**
     * Adds page breadcrumbs to the end
     *
     * @see Breadcrumbs::$links
     * @param array|string[] $breadCrumbs
     * @return Controller
     */
    public function addBreadCrumbs(array $breadCrumbs): self
    {
        if (!array_key_exists('breadcrumbs', $this->view->params)) {
            $this->view->params['breadcrumbs'] = [];
        }
        foreach ($breadCrumbs as $breadCrumb) {
            $this->view->params['breadcrumbs'][] = $breadCrumb;
        }
        return $this;
    }

    /**
     * Sets page breadcrumb links
     *
     * @see Breadcrumbs::$links
     * @param array $breadCrumbs
     */
    public function setBreadCrumbs(array $breadCrumbs): void
    {
        $this->view->params['breadcrumbs'] = $breadCrumbs;
    }

    /**
     * Returns page breadcrumbs
     *
     * @see Breadcrumbs::$links
     * @return array
     */
    public function getBreadCrumbs(): array
    {
        try {
            return ArrayHelper::getValue($this->view->params, 'breadcrumbs', []);
        } catch (Exception $e) {
        }
        return [];
    }
}
