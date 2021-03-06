<?php

namespace FondOfSpryker\Yves\GoogleTagManagerStoreConnector\Plugin\DataLayer;

use FondOfSpryker\Yves\GoogleTagManagerExtension\Dependency\GoogleTagManagerDataLayerExpanderPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerStoreConnector\GoogleTagManagerStoreConnectorFactory getFactory()
 */
class StoreDataLayerExpanderPlugin extends AbstractPlugin implements GoogleTagManagerDataLayerExpanderPluginInterface
{
    /**
     * @param string $pageType
     * @param array $twigVariableBag
     *
     * @return bool
     */
    public function isApplicable(string $pageType, array $twigVariableBag = []): bool
    {
        return true;
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     * @param array $dataLayer
     *
     * @return array
     */
    public function expand(string $page, array $twigVariableBag, array $dataLayer): array
    {
        return $this->getFactory()
            ->createStoreDataLayerExpander()
            ->expand($page, $twigVariableBag, $dataLayer);
    }
}
