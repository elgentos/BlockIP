<?php
class Elgentos_BlockIP_Block_Adminhtml_CustomerRenderer extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        $value =  $row->getData($this->getColumn()->getIndex());
        $customer = Mage::getModel('customer/customer')->load($value);
        if($customer) {
	        $firstname = $customer->getFirstname();
	        $lastname = $customer->getLastname();
	        $link = $this->getUrl('adminhtml/customer/edit',array('id'=>$customer->getId()));
	        
	        return '<a href="'.$link.'">'.$firstname.' '.$lastname.'</a>';
        } else {
        	return null;
        }
    }

}
