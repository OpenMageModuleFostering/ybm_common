<?php
class YBM_Common_Model_System_Config_Source_LogLevels {
	protected $attributes;
	public function __construct() {
		$this->attributes = array (
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'Disabled' ),
						'value' => - 1 
				),
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'EMERG' ),
						'value' => Zend_Log::EMERG 
				),
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'ALERT' ),
						'value' => Zend_Log::ALERT 
				),
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'CRIT' ),
						'value' => Zend_Log::CRIT 
				),
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'ERR' ),
						'value' => Zend_Log::ERR 
				),
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'WARN' ),
						'value' => Zend_Log::WARN 
				),
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'NOTICE' ),
						'value' => Zend_Log::NOTICE 
				),
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'INFO' ),
						'value' => Zend_Log::INFO 
				),
				array (
						'label' => Mage::helper ( 'ybmcommon/data' )->__ ( 'DEBUG' ),
						'value' => Zend_Log::DEBUG 
				) 
		);
	}
	public function toOptionArray($addEmpty = true) {
		return $this->attributes;
	}
	public function toSelectArray() {
		$result = array ();
		
		foreach ( $this->attributes as $attribute ) {
			$result [$attribute ['value']] = $attribute ['label'];
		}
		
		return $result;
	}
}
