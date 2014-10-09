<?php

class Elgentos_BlockIP_Block_Adminhtml_Index_Add_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $dataForm = array(
                'id' => 'edit_form',
                'action' => $this->getUrl('blockip/adminhtml_index/block_ip'),
                'method' => 'post',
                'enctype' => 'multipart/form-data',
        );

        $form = new Varien_Data_Form($dataForm);

        $form->setUseContainer(true);

        $this->setForm($form);

        $fieldset = $form->addFieldset('ip_information', array(
             'legend' =>Mage::helper('blockip')->__('IP information')
        ));

        $fieldset->addField('title', 'text', array(
            'name'      => 'ip',
            'label'     => Mage::helper('blockip')->__('IP address'),
            'class'     => 'required-entry',
            'required'  => true,
            'value' => ''
        ));

        return parent::_prepareForm();
    }
}