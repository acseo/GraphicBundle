<?php

namespace ACSEO\Bundle\GraphicBundle\Graphic\Flot\Type;

class Pie extends AbstractType 
{
    public function __construct($domSelector, $data, $options = array())
    {
        $this->initOptions();
        
        parent::__construct($domSelector, $data, $options);

    }

    private function initOptions()
    {
        $this->options = array(
            "options" => (object) array(
                "series" => (object) array(
                    "pie" => (object) array("show" => true),
                )
            )
        );

    }
}
