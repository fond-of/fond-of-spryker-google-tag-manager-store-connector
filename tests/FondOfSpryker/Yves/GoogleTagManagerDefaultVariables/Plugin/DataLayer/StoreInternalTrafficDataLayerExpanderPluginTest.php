<?php

namespace FondOfSpryker\Yves\GoogleTagManagerStoreConnector\Plugin\DataLayer;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\GoogleTagManagerStoreConnector\GoogleTagManagerStoreConnectorFactory;
use FondOfSpryker\Yves\GoogleTagManagerStoreConnector\Model\GoogleTagManagerStoreConnectorModelInterface;

class StoreInternalTrafficDataLayerExpanderPluginTest extends Unit
{
    /**
     * @return void
     */
    public function testExpand(): void
    {
        $factoryMock = $this->getMockBuilder(GoogleTagManagerStoreConnectorFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $googleTagManagerStoreConnectorModel = $this->getMockBuilder(GoogleTagManagerStoreConnectorModelInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $factoryMock->expects($this->once())
            ->method('createGoogleTagManagerStoreConnectorModel')
            ->willReturn($googleTagManagerStoreConnectorModel);

        $googleTagManagerStoreConnectorModel->expects($this->once())
            ->method('getInteralTraffic')
            ->willReturn([]);

        $googleTagManagerStoreInternalTrafficPlugin = new StoreInternalTrafficDataLayerExpanderPlugin();
        $googleTagManagerStoreInternalTrafficPlugin->setFactory($factoryMock);

        $this->assertIsArray($googleTagManagerStoreInternalTrafficPlugin->expand('pageType', [], []));
    }
}