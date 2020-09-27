<?php

namespace Application\Models;

class StatusOrder
{
    private $id;
    private $status;

    public function __construct($id, $status)
    {
        $this->setId($id);
        $this->setStatus($status);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}