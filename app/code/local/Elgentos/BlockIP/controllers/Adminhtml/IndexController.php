<?php

class Elgentos_BlockIP_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction($title=null) {
        $this->loadLayout();
        if($title!=null) {
            $this->getLayout()->getBlock('head')->setTitle($title.' / Magento Admin');
        }
        $this->_setActiveMenu('system/blockip');
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction('Block IP')->renderLayout();
    }
    
    public function addformAction() {
    	$this->_initAction('Block IP')->renderLayout();
    }
    
    public function block_ipAction() {
    	$ip = $this->getRequest()->getParam('ip');
    	$customer_id = $this->getRequest()->getParam('customer_id');
    	$ipModel = Mage::getModel('blockip/ips');
    	if($ip) {
    		if(count($ipModel->getCollection()->addFieldToFilter('ip',$ip))==0) {
		    	$ipModel = Mage::getModel('blockip/ips');
		    	$ipModel->setIp($ip);
		    	$ipModel->setCustomerId($customer_id);
		    	try {
		    		$ipModel->save();
		    		Mage::getSingleton('core/session')->addSuccess(__('IP %s is now blocked.',$ip));
		    		Mage::helper('blockip')->clearCache();
		    		$this->_redirectUrl(Mage::helper('adminhtml')->getUrl('blockip/adminhtml_index'));
		    	} catch(Exception $e) {
		    		Mage::getSingleton('core/session')->addError(__('Could not block %s; ',$ip) . $e->getMessage());
		    		$this->_redirectReferer();
		    	}
    		} else {
    			Mage::getSingleton('core/session')->addNotice(__('IP %s is already blocked.',$ip));
    			$this->_redirectUrl(Mage::helper('adminhtml')->getUrl('blockip/adminhtml_index'));
    		}
    	} else {
    		Mage::getSingleton('core/session')->addError(__('Wrong or no IP supplied.'));
    		$this->_redirectReferer();
    	}
    }
    
    public function unblock_ipAction() {
    	$id = $this->getRequest()->getParam('id');
    	try {
    		$ipModel = Mage::getModel('blockip/ips')->load($id);
    		$ip = $ipModel->getIp();
    		$ipModel->delete();
    		Mage::helper('blockip')->clearCache();
    		Mage::getSingleton('core/session')->addSuccess(__('IP %s is now unblocked.',$ip));
    		$this->_redirectUrl(Mage::helper('adminhtml')->getUrl('blockip/adminhtml_index'));
    	} catch(Exception $e) {
    		Mage::getSingleton('core/session')->addError(__('IP %s could not be unblocked; ',$ip) . $e->getMessage());
    		$this->_redirectUrl(Mage::helper('adminhtml')->getUrl('blockip/adminhtml_index'));
    	}
    }

}