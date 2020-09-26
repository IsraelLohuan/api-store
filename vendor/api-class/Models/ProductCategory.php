<?php

namespace Application\Models;

class ProductCategory
{
    private $id;
    private $categoryDescription;

    public function __construct($id, $category_description)
    {
        $this->setId($id);
        $this->setCategoryDescription($category_description);
    }

    public function getId()
    {
        return $this->id;
    }
      
    public function setId($id)
    {
        $this->id = $id;
    }
      
    public function getCategoryDescription()
    {
        return $this->categoryDescription;
    }
      
    public function setCategoryDescription($category_description)
    {
        $this->categoryDescription = $category_description;
    }
}