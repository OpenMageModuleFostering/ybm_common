<?php
class YBM_Common_Model_Feed extends Mage_AdminNotification_Model_Feed {
	/**
	 * Retrieve feed url
	 *
	 * @return string
	 */
	public function getFeedUrl() {
		if (is_null ( $this->_feedUrl )) {
			// $this->_feedUrl = Mage::getStoreConfigFlag ( self::XML_USE_HTTPS_PATH ) ? 'https://' : 'http://' . 'news.ybm-deutschland.de/feed/';
			$this->_feedUrl = 'http://news.ybm-deutschland.de/feed/';
		}
		return $this->_feedUrl;
	}
	
	/**
	 * Retrieve Last update time
	 *
	 * @return int
	 */
	public function getLastUpdate() {
		return Mage::app ()->loadCache ( 'admin_ybm_common_lastcheck' );
	}
	
	/**
	 * Set last update time (now)
	 *
	 * @return Mage_AdminNotification_Model_Feed
	 */
	public function setLastUpdate() {
		Mage::app ()->saveCache ( time (), 'admin_ybm_common_lastcheck' );
		return $this;
	}
}