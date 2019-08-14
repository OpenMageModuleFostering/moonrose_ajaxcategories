<?php

class Moonrose_Ajaxcategories_Model_Categories extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('ajaxcategories/categories');
    }
	public function get_ajaxcategories($categories) {
    	foreach($categories as $category) {
			$cat = Mage::getModel('catalog/category')->load($category->getId());
			$count = $cat->getProductCount();
			$array .= '<option value="'.$category->getId().'">'.$category->getName();
			$array .= '</option>'. "\n";
    	}
    	return  $array;
	}
	function  get_categoriesStructure($idCollections) {
		foreach($idCollections as $categoryId) {
			$cur_category = Mage::getModel('catalog/category')->load($categoryId->getId());
			$array .= '<option value="'.$categoryId->getId().'">'.$cur_category->getName().'</option>'. "\n";
		}
		return  $array;
	}
	function compareChildText($a, $b)
	{
		return strnatcmp(strtolower($a->getName()), strtolower($b->getName()));
	}
}