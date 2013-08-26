<?php
/**
 * PaymentFee_Model_System_Config_Source_Payment_Methods
 *
 * @category  Models
 * @package   PaymentFee
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class AwHh_PaymentFee_Model_System_Config_Source_Payment_Methods
{
    /**
     * Get payment methods.
     *
     * @return array $methods
     */
    public function toOptionArray()
    {
        $methods = array();
        foreach (Mage::getStoreConfig('payment') as $code => $payment) {
            if ($this->isActive($payment)) {
                $methods[$code] = array(
                    'label' => Mage::helper('payment')->__($payment['title']),
                    'value' => $code,
                );
            }
        }
        return $methods;
    }

    private function isActive($payment)
    {
        return isset($payment['title']) && isset($payment['active']) && 1 == $payment['active'];
    }
}
