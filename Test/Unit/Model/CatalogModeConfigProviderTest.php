<?php
declare(strict_types=1);

/**
 * File: CatalogModeConfigProviderTest.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\CatalogMode\Test\Unit\Model;

use MSlwk\CatalogMode\Model\CatalogModeConfigProvider;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use Magento\Framework\App\Config\ScopeConfigInterface;

class CatalogModeConfigProviderTest extends TestCase
{
    /**
     * @var MockObject|ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var CatalogModeConfigProvider
     */
    private $configProvider;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->scopeConfig = $this->getMockBuilder(ScopeConfigInterface::class)
            ->getMock();

        $this->configProvider = new CatalogModeConfigProvider($this->scopeConfig);
    }

    /**
     * @test
     */
    public function testIsInCatalogModeWhenEnabled()
    {
        $this->scopeConfig->expects($this->once())
            ->method('getValue')
            ->with('catalog_mode/general/is_enabled', 'stores')
            ->willReturn('1');

        $this->assertTrue($this->configProvider->isCatalogMode());
    }

    /**
     * @test
     */
    public function testIsInCatalogModeWhenNotSet()
    {
        $this->scopeConfig->expects($this->once())
            ->method('getValue')
            ->with('catalog_mode/general/is_enabled', 'stores')
            ->willReturn(null);

        $this->assertFalse($this->configProvider->isCatalogMode());
    }
}
