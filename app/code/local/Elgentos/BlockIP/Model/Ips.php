<?php
class Elgentos_BlockIP_Model_Ips extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('blockip/ips');
    }

}