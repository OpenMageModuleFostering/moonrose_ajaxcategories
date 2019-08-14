<?php
class Moonrose_Ajaxcategories_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
		$rootcatId=Mage::app()->getRequest()->getParam('cId');
		$categories = Mage::getModel('catalog/category')->getCategories($rootcatId);
		$cat = Mage::getModel('ajaxcategories/categories')->get_ajaxcategories($categories);
		
		if(!empty($cat)):
				$content = '<div class="inner_options">
								<select id="categorybox_<?=$rootcatId; ?>" class="change">
									<option value="0">---</option>'.
										$cat.'
								</select>
							</div>';
		  $array['opt']=$content;
		  $array['url']="";
	   else:
			$url=preg_replace('~ajax_categories.php/~m', '', Mage::getModel('catalog/category')->load($rootcatId)->getUrl());
			$array['opt']="";
			$array['url']=$url;
		endif;	
	 echo json_encode($array);
	}
}