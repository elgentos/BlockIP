<?php

class Elgentos_BlockIP_Block_Adminhtml_Index_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('blockip_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('blockip/ips')->getCollection();

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $fields = array(
            'ID'=>'id',
            'IP'=>'ip',
            'Customer'=>'customer_id',
        	'Unblock' => 'unblock'
        );

        foreach($fields as $field=>$index) {
            $options = array(
                'header'    => Mage::helper('blockip')->__($field),
                'index'     => $index,
            );
            if($field=='Customer') {
            	$options['renderer'] = 'Elgentos_BlockIP_Block_Adminhtml_CustomerRenderer';
            }
            if($field=='Unblock') {
            	$options['renderer'] = 'Elgentos_BlockIP_Block_Adminhtml_Unblock';
            }
            if($index=='id') {
            	$options['align'] = 'right';
            	$options['width'] = '50px';
            }
            $this->addColumn($field, $options);
        }

        return parent::_prepareColumns();
    }
}