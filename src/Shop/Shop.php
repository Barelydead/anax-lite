<?php

namespace CJ\Shop;

/*
* Helper class for the webshop. CRUD interface
*/
class Shop implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;


    /**
    * Gets all products from db
    * @return array
    */
    public function getAllProducts()
    {
        $sql = "CALL getProdOverview()";
        $res = $this->app->db->executeFetchAll($sql);

        return $res;
    }

    /**
    * @param string category
    * Gets all products from specific category
    * @return array
    */
    public function getProductsFromCategory($cat)
    {
        $sql = "SELECT * FROM `anax_product` WHERE category = ?";
        $res = $this->app->db->executeFetchAll($sql, [$cat]);

        return $res;
    }

    /**
    * @param string category
    * Gets all products from specific category
    * @return array
    */
    public function getItemWithId($id)
    {
        $sql = "SELECT * FROM `anax_product` WHERE id = ?";
        $res = $this->app->db->executeFetch($sql, [$id]);

        return $res;
    }


    /**
    * @param int, how many units
    * @param int, what product id
    * Change stock
    */
    public function changeStock($units, $prodId)
    {
        $this->app->db->execute("CALL `changeStock`($units, $prodId)");
    }


    public function getStock()
    {
        $sql = "SELECT * FROM `VProductStock`";
        $this->app->db->executeFetchAll($sql);
    }

    public function getStockForItem($id)
    {
        $sql = "SELECT * FROM `VProductStock` WHERE productId = ?";
        $res = $this->app->db->executeFetch($sql, [$id]);

        return $res;
    }

    public function getLowStock()
    {
        $sql = "SELECT * FROM `VLowStock`";
        $res = $this->app->db->executeFetchAll($sql);

        return $res;
    }
}
