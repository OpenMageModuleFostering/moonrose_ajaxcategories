<?php

class Moonrose_Ajaxcategories_Model_Mysql4_Categories extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the malls_id refers to the key field in your database table.
        $this->_init('ajaxcategories/categories');
    }
}