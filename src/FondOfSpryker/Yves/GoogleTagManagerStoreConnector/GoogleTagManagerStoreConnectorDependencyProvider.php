<?php

namespace FondOfSpryker\Yves\GoogleTagManagerStoreConnector;

use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class GoogleTagManagerStoreConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    public const STORE = 'STORE';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addStore($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addStore(Container $container): Container
    {
        $container->set(static::STORE, function () {
            return $this->getStore();
        });

        return $container;
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    protected function getStore(): Store
    {
        return Store::getInstance();
    }
}
