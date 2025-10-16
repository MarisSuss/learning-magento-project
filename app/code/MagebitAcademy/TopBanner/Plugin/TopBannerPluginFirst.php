<?php
/**
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace MagebitAcademy\TopBanner\Plugin;

use MagebitAcademy\TopBanner\Block\TopBanner;
use Psr\Log\LoggerInterface;

class TopBannerPluginFirst
{
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * Before plugin for getDummy method
     *
     * This method executes before the original getDummy() method.
     *
     * @param TopBanner $subject
     * @param string $dummyText
     * @return array
     */
    public function beforeGetDummy(TopBanner $subject, string $dummyText): array
    {
        $this->logger->info('PLUGIN: SO-1 beforeGetDummy execution');
        $dummyText .= ', SO-1 before plugin executed';
        return [$dummyText];
    }

    /**
     * After plugin for getDummy method
     *
     * This method executes after the original getDummy() method.
     *
     * @param TopBanner $subject
     * @param string $result
     * @return string
     */
    public function afterGetDummy(TopBanner $subject, string $result): string
    {
        $this->logger->info('PLUGIN: SO-1 afterGetDummy execution');
        return $result . ', SO-1 after plugin executed';
    }

     /**
    * Around plugin for getDummy method
    *
    * This method wraps the original getDummy() method and can control its execution.
    *
    * @param TopBanner $subject
    * @param callable $proceed
    * @param string $dummyText
    * @return string
    */
   public function aroundGetDummy(TopBanner $subject, callable $proceed, string $dummyText): string
   {
       $this->logger->info('PLUGIN: SO-1 aroundGetDummy execution - before proceed');
       $dummyText .= ', SO-1 around plugin before proceed';


       $result = $proceed($dummyText);


       $this->logger->info('PLUGIN: SO-1 aroundGetDummy execution - after proceed');
       return $result . ', SO-1 around plugin after proceed';
   }
}
