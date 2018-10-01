<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to suporte@tray.net.br so we can send you a copy immediately.
 *
 * @category   Tray
 * @package    Tray_CheckoutApi
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Tray_CheckoutApi_Model_Config extends Varien_Object
{
    const XML_PATH = 'payment/checkoutapi_standard/';
    
    const XML_PATH_CONFIG = 'checkoutapi/settings/';
    
    protected $_config = array();
    
    protected $_config_settings = array();
    
    public function getConfigData($key, $storeId = null)
    {
        if (!isset($this->_config[$key][$storeId])) {
            $value = Mage::getStoreConfig(self::XML_PATH . $key, $storeId);
            $this->_config[$key][$storeId] = $value;
        }
        return $this->_config[$key][$storeId];
    }

    public function getConfigDataSettings($key, $storeId = null)
    {
        if (!isset($this->_config_settings[$key][$storeId])) {
            $value = Mage::getStoreConfig(self::XML_PATH_CONFIG . $key, $storeId);
            $this->_config_settings[$key][$storeId] = $value;
        }
        return $this->_config_settings[$key][$storeId];
    }    
 
    public function getExibitionWebCheckout($storeId = null)
    {        
        if (!$this->hasData('exibitionmodal')) {
            $this->setData('exibitionmodal', $this->getConfigData('exibitionmodal', $storeId));
        }
        return $this->getData('exibitionmodal');
    }
    
}