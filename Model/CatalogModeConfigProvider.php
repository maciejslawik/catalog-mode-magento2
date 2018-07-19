<?php
declare(strict_types=1);

/**
 * File: CatalogModeConfigProvider.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\CatalogMode\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use MSlwk\CatalogMode\Api\CatalogModeConfigProviderInterface;

/**
 * Class CatalogModeConfigProvider
 * @package MSlwk\CatalogMode\Model
 */
class CatalogModeConfigProvider implements CatalogModeConfigProviderInterface
{
    const XML_PATH_CATALOG_MODE_ENABLED = 'catalog_mode/general/is_enabled';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * CatalogModeConfigProvider constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isCatalogMode(): bool
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_CATALOG_MODE_ENABLED, ScopeInterface::SCOPE_STORES);
    }
}
