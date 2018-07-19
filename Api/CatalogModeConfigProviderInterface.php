<?php
declare(strict_types=1);

/**
 * File: CatalogModeConfigProviderInterface.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\CatalogMode\Api;

/**
 * Interface CatalogModeConfigProviderInterface
 * @package MSlwk\CatalogMode\Api
 */
interface CatalogModeConfigProviderInterface
{
    /**
     * @return bool
     */
    public function isCatalogMode(): bool;
}
