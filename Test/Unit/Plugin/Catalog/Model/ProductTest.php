<?php
declare(strict_types=1);

/**
 * File: ProductTest.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\CatalogMode\Test\Unit\Plugin\Catalog\Model;

use Magento\Catalog\Model\Product as ProductModel;
use MSlwk\CatalogMode\Api\CatalogModeConfigProviderInterface;
use MSlwk\CatalogMode\Plugin\Catalog\Model\Product;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

/**
 * Class ProductTest
 * @package MSlwk\CatalogMode\Test\Unit\Plugin\Catalog\Model
 */
class ProductTest extends TestCase
{
    /**
     * @var MockObject|CatalogModeConfigProviderInterface
     */
    private $catalogModeConfigProvider;

    /**
     * @var MockObject|ProductModel
     */
    private $product;

    /**
     * @var Product
     */
    private $plugin;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->catalogModeConfigProvider = $this->getMockBuilder(CatalogModeConfigProviderInterface::class)
            ->getMock();
        $this->product = $this->getMockBuilder(ProductModel::class)
            ->disableOriginalconstructor()
            ->getMock();

        $this->plugin = new Product($this->catalogModeConfigProvider);
    }

    /**
     * @test
     */
    public function testAfterIsSalableWhenInCatalogMode()
    {
        $this->catalogModeConfigProvider->expects($this->once())
            ->method('isCatalogMode')
            ->willReturn(true);

        $this->assertFalse($this->plugin->afterIsSalable($this->product, true));
    }

    /**
     * @test
     */
    public function testAfterIsSalableWhenNotInCatalogModeAndSalable()
    {
        $this->catalogModeConfigProvider->expects($this->once())
            ->method('isCatalogMode')
            ->willReturn(false);

        $this->assertTrue($this->plugin->afterIsSalable($this->product, true));
    }

    /**
     * @test
     */
    public function testAfterIsSalableWhenNotInCatalogModeAndNotSalable()
    {
        $this->catalogModeConfigProvider->expects($this->once())
            ->method('isCatalogMode')
            ->willReturn(false);

        $this->assertFalse($this->plugin->afterIsSalable($this->product, false));
    }

    /**
     * @test
     */
    public function testAfterGetIsSalableWhenInCatalogMode()
    {
        $this->catalogModeConfigProvider->expects($this->once())
            ->method('isCatalogMode')
            ->willReturn(true);

        $this->assertFalse($this->plugin->afterGetIsSalable($this->product, true));
    }

    /**
     * @test
     */
    public function testAfterGetIsSalableWhenNotInCatalogModeAndSalable()
    {
        $this->catalogModeConfigProvider->expects($this->once())
            ->method('isCatalogMode')
            ->willReturn(false);

        $this->assertTrue($this->plugin->afterGetIsSalable($this->product, true));
    }

    /**
     * @test
     */
    public function testAfteGetrIsSalableWhenNotInCatalogModeAndNotSalable()
    {
        $this->catalogModeConfigProvider->expects($this->once())
            ->method('isCatalogMode')
            ->willReturn(false);

        $this->assertFalse($this->plugin->afterGetIsSalable($this->product, false));
    }
}
