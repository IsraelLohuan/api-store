<?php

namespace Application\Models;

class ProductImage
{
    private $id;
    private $productId;
    private $fileNameImage;

    public function __construct($id, $productId, $fileNameImage)
    {   
        $this->setId($id);
        $this->setProductId($productId);
        $this->setFileNameImage($fileNameImage);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function setFileNameImage($fileNameImage)
    {
        $this->fileNameImage = $fileNameImage;
    }

    public function getFileNameImage()
    {
        return $this->fileNameImage;
    }
}