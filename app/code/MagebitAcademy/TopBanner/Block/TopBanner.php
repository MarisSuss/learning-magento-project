<?php
/**
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */
declare(strict_types=1);

namespace MagebitAcademy\TopBanner\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class TopBanner extends Template
{
    private const CONFIG_PATH_BANNER_TEXT = 'marketing/top_banner/banner_text';
    private const CONFIG_PATH_BANNER_COLOR = 'marketing/top_banner/banner_color';

    /**
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param string $additionalString
     * @param array $data
     */
    public function __construct(
        Context $context,
        private readonly ScopeConfigInterface $scopeConfig,
        private readonly string $additionalString = '',
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get banner text from config
     *
     * @return string
     */
    public function getBannerText(): string
    {
        return (string)$this->scopeConfig->getValue(
            self::CONFIG_PATH_BANNER_TEXT,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ) . ' ' . $this->additionalString;
    }

    /**
     * Get banner color from config
     *
     * @return string
     */
    public function getBannerColor(): string
    {
        return (string)$this->scopeConfig->getValue(
            self::CONFIG_PATH_BANNER_COLOR,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
