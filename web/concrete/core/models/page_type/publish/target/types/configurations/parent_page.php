<?php defined('C5_EXECUTE') or die("Access Denied.");

class Concrete5_Model_ParentPagePageTypePublishTargetConfiguration extends PageTypePublishTargetConfiguration {

	protected $cParentID;
	
	public function setParentPageID($cParentID) {
		$this->cParentID = $cParentID;
	}

	/** 
	 * Note: if a configuration contains this method, it is assumed that the configuration will default to this page and
	 * can skip composer
	 */
	public function getDefaultParentPageID() {
		return $this->getParentPageID();
	}
	
	public function getParentPageID() {
		return $this->cParentID;
	}

	public function getPageTypePublishTargetConfiguredTargetParentPageID() {
		return $this->cParentID;
	}

	public function export($cxml) {
		$target = parent::export($cxml);
		$c = Page::getByID($this->cParentID);
		if (is_object($c) && !$c->isError()) {
			$target->addAttribute('path', $c->getCollectionPath());
		}
	}


}