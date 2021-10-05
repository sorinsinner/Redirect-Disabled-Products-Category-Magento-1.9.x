<?php /**
     * Redirect from disabled product to product last category
     * Obseve event - controller_action_predispatch_catalog_product_view
     * 
     * @param Varien_Event_Observer $observer
     */
class SinnersProjects_RedirectDisableProduct2Category_Model_Observer
{
    public function catalogProductViewPredispatch(Varien_Event_Observer $observer)
    {
        Varien_Profiler::start(__METHOD__);
        
        $product_id = intval(Mage::app()->getRequest()->getParam('id'));
        $_product   = Mage::getSingleton('catalog/product')->load($product_id);
        
        if($_product->getStatus() == Mage_Catalog_Model_Product_Status::STATUS_DISABLED) {

            $category_ids = $_product->getCategoryIds();
            $last_id      = end($category_ids);
         
            $redirect_url = Mage::getSingleton("catalog/category")->load($last_id)->getUrl();

            Mage::app()->getResponse()
                       ->setRedirect($redirect_url, 302);
        }
        
        
        Varien_Profiler::stop(__METHOD__);
    }
}