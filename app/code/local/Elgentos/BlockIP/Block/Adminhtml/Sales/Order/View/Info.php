<?php
class Elgentos_BlockIP_Block_Adminhtml_Sales_Order_View_Info extends Mage_Adminhtml_Block_Sales_Order_View_Info
{

    public function __construct()
    {
        $enterprise = Mage::getConfig()->getNode('modules/Enterprise_PageCache/active');
        $checkForVersion = ($enterprise ? '1.12' : '1.7.0.0');
        if(version_compare(Mage::getVersion(), $checkForVersion, '<')) {
            $this->setTemplate('blockip/sales_order_view_info_16xx.phtml');
        } else {
            $this->setTemplate('blockip/sales_order_view_info_17xx.phtml');
        }
        parent::__construct();
    }

}