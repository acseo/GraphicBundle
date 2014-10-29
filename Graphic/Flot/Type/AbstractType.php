<?php

namespace ACSEO\Bundle\GrapicBundle\Graphic\Flot\Type;

abstract class AbstractType
{
    protected $domSelector;
    protected $data;
    public $options = array();

    public function __construct($domSelector, $data, $options = array())
    {

        $this->domSelector = $domSelector;
        $this->data        = $data;
        if (is_array($options)) {
            $this->options     = $this->options + $options;
        }
    }


    public function getView()
    {
        return array("domSelector" => $this->domSelector, "data" => $this->data, "options" => $this->options);
    }
}

