<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\dashboardbegone;

use Craft;
use craft\base\Plugin;
use craft\web\View;
use yii\base\Event;

class DashboardBegone extends Plugin
{
    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        if (Craft::$app->getRequest()->getIsCpRequest()) {
            if (Craft::$app->getRequest()->getSegment(1) == 'dashboard') {
                Craft::$app->getResponse()->redirect('entries');
            }

            Event::on(View::class, View::EVENT_BEFORE_RENDER_TEMPLATE,
                function() {
                    Craft::$app->getView()->registerCss('#nav-dashboard {display: none !important;}');
                }
            );
        }
    }
}
