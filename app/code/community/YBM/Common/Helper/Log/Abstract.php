<?php
abstract class YBM_Common_Helper_Log_Abstract extends Mage_Core_Helper_Abstract {
	/**
	 *
	 * @return boolean
	 */
	public abstract function isLoggingEnabled();
	
	/**
	 *
	 * @return int
	 */
	public abstract function getMaxLogLevel();
	
	/**
	 *
	 * @return string
	 */
	public function getLogfile() {
		return 'ybm.log';
	}
	
	/**
	 * Log exceptions
	 *
	 * @param Exception $e        	
	 */
	public function logException(Exception $e, $logToSession = true) {
		if ($logToSession) {
			$this->logToSession ( "\n" . $e->getMessage (), Zend_Log::ERR );
		}
		$this->logToFile ( "\n" . $e->__toString (), Zend_Log::ERR );
	}
	/**
	 * Log to Mage::log
	 *
	 * @param unknown $message        	
	 * @param string $level        	
	 */
	public function log($message, $level = null) {
		$this->logToSession ( $message, $level );
		$this->logToFile ( $message, $level );
	}
	
	/**
	 * Log to file only.
	 *
	 * @param unknown $message        	
	 * @param string $level        	
	 */
	public function logToFile($message, $level = null) {
		$level = is_null ( $level ) ? Zend_Log::DEBUG : ( int ) $level;
		
		if (! $this->isLoggingEnabled ()) {
			return;
		}
		
		if ($this->getMaxLogLevel () >= $level) {
			Mage::log ( $message, $level, $this->getLogfile(), true );
		}
	}
	
	/**
	 * Log to session only.
	 *
	 * @param unknown $message        	
	 * @param string $level        	
	 */
	public function logToSession($message, $level = null) {
		$level = is_null ( $level ) ? Zend_Log::DEBUG : ( int ) $level;
		
		$adminSession = Mage::getSingleton ( 'admin/session' );
		/* @var $adminSession Mage_Admin_Model_Session */
		
		// verify if the user is logged in to the backend
		if ($adminSession->isLoggedIn ()) {
			/* @var $adminhtmlSession Mage_Adminhtml_Model_Session */
			$adminhtmlSession = Mage::getSingleton ( 'adminhtml/session' );
			
			switch ($level) {
				case Zend_Log::EMERG :
					$adminhtmlSession->addError ( $message );
					break;
				case Zend_Log::ALERT :
					$adminhtmlSession->addError ( $message );
					break;
				case Zend_Log::CRIT :
					$adminhtmlSession->addError ( $message );
					break;
				case Zend_Log::ERR :
					$adminhtmlSession->addError ( $message );
					break;
				case Zend_Log::WARN :
					$adminhtmlSession->addWarning ( $message );
					break;
				case Zend_Log::NOTICE :
					$adminhtmlSession->addNotice ( $message );
					break;
				case Zend_Log::INFO :
					$adminhtmlSession->addSuccess ( $message );
					break;
			}
		}
	}
}
