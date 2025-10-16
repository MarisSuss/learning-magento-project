<?php
declare(strict_types=1);

namespace MagebitAcademy\TopBanner\Model\Config\Backend;

use Magento\Framework\App\Config\Value;
use Magento\Framework\Exception\LocalizedException;

class Color extends Value
{
   /**
    * Validate color value before saving
    *
    * @return $this
    * @throws LocalizedException
    */
   public function beforeSave()
   {
       $value = $this->getValue();

       // Use a regular expression to validate the hex code format.
       if (!empty($value) && !preg_match('/^#[a-f0-9]{6}$/i', $value)) {
           throw new LocalizedException(
               __('Please enter a valid hex color code (e.g. #FF0000)')
           );
       }

       return parent::beforeSave();
   }
}
