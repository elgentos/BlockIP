<?php

class Elgentos_BlockIP_Model_Mysql4_Ips_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blockip/ips');
    }
}