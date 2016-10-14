<?php

class Aks_Pagecounter_Block_Pagecount extends Mage_Core_Block_Template
{
    /*
     * This Code Will Display the Total Count Of this Product on the Product Detail Page
     * @return int
     */
    public function getTotalPageCount() { 
        $id = Mage::registry('current_product')->getId();
        $fromDate = '2015-12-10';
        $toDate = now();
        $viewedTotalProducts = Mage::getResourceModel('reports/product_collection')->addViewsCount($fromDate, $toDate);
        foreach($viewedTotalProducts as $product) {
            if($product->getData('entity_id') == $id)
            {
                $viewed = $product->getData('views');
            }
        }
        return $viewed;
    }
}
