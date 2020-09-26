<?php

namespace Application\Models;

class Product 
{
  private $id;
  private $price;
  private $description;
  private $spotlight;
  private $deleted;
  private $valueDiscount;
  private $male;
  private $productCategoryId;
   
  public function __construct($id, $price, $description, $spotlight, $deleted, $valueDiscount, $male, $productCategoryId, $title)
  {
    $this->setId($id);
    $this->setPrice($price);
    $this->setDescription($description);
    $this->setSpotlight($spotlight);
    $this->setDeleted($deleted);
    $this->setValueDiscount($valueDiscount);
    $this->setMale($male);
    $this->setProductCategoryId($productCategoryId);
    $this->setTitle($title);
  }

  public function getId()
  {
		return $this->id;
	}

  public function setId($id)
  {
		$this->id = $id;
	}

  public function getPrice()
  {
		return $this->price;
	}

  public function setPrice($price)
  {
		$this->price = $price;
	}

  public function getDescription()
  {
		return $this->description;
	}

  public function setDescription($description)
  {
		$this->description = $description;
	}

  public function getSpotlight()
  {
		return $this->spotlight;
	}

  public function setSpotlight($spotlight)
  {
		$this->spotlight = $spotlight;
	}

  public function getDeleted()
  {
		return $this->deleted;
	}

  public function setDeleted($deleted)
  {
		$this->deleted = $deleted;
	}

  public function getValueDiscount()
  {
		return $this->valueDiscount;
	}

  public function setValueDiscount($valueDiscount)
  {
		$this->valueDiscount = $valueDiscount;
  }

  public function getMale()
  {
		return $this->male;
	}

  public function setMale($male)
  {
		$this->male = $male;
	}

  public function getProductCategoryId()
  {
		return $this->productCategoryId;
	}

  public function setProductCategoryId($productCategoryId)
  {
		$this->productCategoryId = $productCategoryId;
  }

  public function getTitle()
  {
		return $this->title;
  }
    
  public function setTitle($title)
  {
		$this->title = $title;
	}
}