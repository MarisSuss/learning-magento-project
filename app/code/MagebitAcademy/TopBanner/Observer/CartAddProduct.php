<?php
/**
* @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
* @author    Magebit <info@magebit.com>
* @license   MIT
*/


declare(strict_types=1);


namespace MagebitAcademy\TopBanner\Observer;


use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;


class CartAddProduct implements ObserverInterface
{
   /**
    * @param LoggerInterface $logger
    */
   public function __construct(
       private readonly LoggerInterface $logger
   ) {
   }


   /**
    * Observer for cart add product event
    *
    * @param Observer $observer
    * @return void
    */
   public function execute(Observer $observer): void
   {
       $product = $observer->getEvent()->getData('product');
       $this->logger->info(sprintf('Product with name %s was added to cart!', $product->getName()));
   }
}
