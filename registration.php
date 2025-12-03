<?php
/**
 * BULK HOMME Theme Registration
 * 
 * @category  BulkHomme
 * @package   BulkHomme_Theme
 * @author    Your Name
 * @copyright Copyright (c) 2025
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::THEME,
    'frontend/BulkHomme/default',
    __DIR__
);
