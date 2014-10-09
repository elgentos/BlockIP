<?php
class Elgentos_BlockIP_Model_Observer {

    public function checkBlocked() {
        if(!Mage::getStoreConfig('blockip/general/disabled')) {
            $blockedIps = Mage::helper('blockip')->getBlockedIps();

            $setsRemote = explode(".",$_SERVER['REMOTE_ADDR']);
            $block = false;
            foreach($blockedIps as $ip) {
                $matched = 0;
                $sets = explode(".",$ip);
                foreach($sets as $key=>$set) {
                    if($set!='*' AND $set==$setsRemote[$key]) {
                        $matched++;
                    } elseif($set=='*') {
                        $matched++;
                    }
                }
                if($matched==4) {
                    $block = true;
                }
            }
            if($block) {
                header('HTTP/1.0 403 Access Denied/Forbidden');
                exit;
            }
        }
    }

}