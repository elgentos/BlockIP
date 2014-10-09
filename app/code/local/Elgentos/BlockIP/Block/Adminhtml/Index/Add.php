<?php

class Elgentos_BlockIP_Block_Adminhtml_Index_Add extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _prepareLayout()
    {
        if ($this->_blockGroup && $this->_controller && $this->_mode) {
            $this->setChild('form', $this->getLayout()->createBlock($this->_blockGroup . '/' . $this->_controller . '_' . $this->_mode . '_form'));
        }
        return parent::_prepareLayout();
    }

    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'blockip';
        $this->_controller = 'adminhtml_index';
        $this->_mode = 'add';

        $this->_updateButton('save', 'label', Mage::helper('blockip')->__('Submit'));
    }

    public function getHeaderText()
    {
        return Mage::helper('blockip')->__('Add IP to block');
    }

}