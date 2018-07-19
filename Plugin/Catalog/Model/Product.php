<?php
declare(strict_types=1);

/**
 * File: Product.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\CatalogMode\Plugin\Catalog\Model;

use Magento\Catalog\Model\Product as ProductModel;
use MSlwk\CatalogMode\Api\CatalogModeConfigProviderInterface;

/**
 * Class Product
 * @package MSlwk\CatalogMode\Plugin\Catalog\Model
 */
class Product
{
    /**
     * @var CatalogModeConfigProviderInterface
     */
    private $catalogModeConfigProvider;

    /**
     * Product constructor.
     * @param CatalogModeConfigProviderInterface $catalogModeConfigProvider
     */
    public function __construct(CatalogModeConfigProviderInterface $catalogModeConfigProvider)
    {
        $this->catalogModeConfigProvider = $catalogModeConfigProvider;
    }

    /**
     * @param ProductModel $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsSalable(ProductModel $subject, bool $result)
    {
        return $this->catalogModeConfigProvider->isCatalogMode() ? false : $result;
    }

    /**
     * @param ProductModel $subject
     * @param bool $result
     * @return bool
     */
    public function afterGetIsSalable(ProductModel $subject, bool $result)
    {
        return $this->catalogModeConfigProvider->isCatalogMode() ? false : $result;
    }
}
