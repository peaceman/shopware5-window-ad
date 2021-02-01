<?php

namespace n2305WindowAd;

use n2305WindowAd\Bootstrap\Database;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;

class n2305WindowAd extends Plugin
{
    public const PLUGIN_NAME = 'n2305WindowAd';

    public function install(InstallContext $installContext)
    {
        $database = new Database(
            $this->container->get('models')
        );

        $database->install();
    }

    public function uninstall(UninstallContext $uninstallContext)
    {
        $database = new Database(
            $this->container->get('models')
        );

        if ($uninstallContext->keepUserData()) {
            return;
        }

        $database->uninstall();
    }
}
