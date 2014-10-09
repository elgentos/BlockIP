<?php
class Elgentos_BlockIP_Block_Adminhtml_Unblock extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
    	$link = $this->getUrl('blockip/adminhtml_index/unblock_ip',array('id'=>$row->getId()));
    	return '<a href="'.$link.'">Unblock</a>';
    }

}
