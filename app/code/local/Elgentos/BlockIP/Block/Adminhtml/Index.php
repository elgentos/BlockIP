<?php

class Elgentos_BlockIP_Block_Adminhtml_Index extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        parent::__construct();
        $this->removeButton('add');
        $this->_controller = 'adminhtml_index';
        $this->_blockGroup = 'blockip';
        $this->_headerText = Mage::helper('blockip')->__('Blocked IP\'s');

        $this->_addButton('add', array(
            'label' => 'Add IP to block',
            'onclick' => 'setLocation(\''.$this->getUrl('blockip/adminhtml_index/addform').'\')'
        ));
    }

    protected function _prepareLayout()
    {
        $this->setChild('grid',
            $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',$this->_controller . '.grid')->setSaveParametersInSession(true)
        );
        return parent::_prepareLayout();
    }
}