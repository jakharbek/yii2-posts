<?php
namespace jakharbek\posts;

use Yii;
use yii\base\BootstrapInterface;
use yii\console\Application as ConsoleApplication;

class Bootstrap implements BootstrapInterface
{

    /** @inheritdoc */
    public function bootstrap($app)
    {
        exit();
    }

}