<?php

class Elgentos_BlockIP_Helper_Data extends Mage_Core_Helper_Abstract {
	
	public function __construct() {
		$this->cacheFile = Mage::getBaseDir('cache') . '/blocked_ips.dat';
	}
	
	public function getBlockedIps() {
		if(file_exists($this->cacheFile)) {
			$blockedIps = unserialize(file_get_contents($this->cacheFile));
		} else {
			$ips = Mage::getModel('blockip/ips')->getCollection();
			foreach($ips as $ip) {
				$blockedIps[] = $ip->getIp();
			}
			file_put_contents($this->cacheFile,serialize($blockedIps));
		}
		return $blockedIps;
	}
	
	public function clearCache() {
		unlink($this->cacheFile);
	}
	
}
