<?php

namespace Application\Models;

class ItemOrder
{
    private $id;
    private $product_id;
    private $saleOrderId;
    private $deleted;

    public function __construct($id, $productId, $saleOrderId, $deleted)
    {
        $this->setId($id);
        $this->setProductId($product_id);
        $this->setSaleOrderId($saleOrderId);
        $this->setDeleted($deleted);
    }

    public function getId()
    {
		return $this->id;
	}

    public function setId($id)
    {
		$this->id = $id;
	}

    public function getProduct_id()
    {
		return $this->product_id;
	}

    public function setProduct_id($product_id)
    {
		$this->product_id = $product_id;
	}

    public function getSaleOrderId()
    {
		return $this->saleOrderId;
	}

    public function setSaleOrderId($saleOrderId)
    {
		$this->saleOrderId = $saleOrderId;
	}

    public function getDeleted()
    {
		return $this->deleted;
	}

    public function setDeleted($deleted)
    {
		$this->deleted = $deleted;
	}
}