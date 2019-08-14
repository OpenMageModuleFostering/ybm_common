<?php

class YBM_Common_Helper_Abstract extends Mage_Core_Helper_Abstract {
	public function getExtensionVersion()
	{
		$parts = explode('_', get_class($this));

		if (!is_array($parts) || count($parts) < 2) {
			return 'UNKNOWN';
		}
		
		$module = $parts[0] . '_' . $parts[1];

		return (string) Mage::getConfig()->getModuleConfig($module)->version;
	}
}
