<?php

namespace ACSEO\Bundle\GrapicBundle\Graphic\Flot\Type;

class TimeLine extends AbstractType 
{
    public function __construct($domSelector, $data, $options = array())
    {
        $this->initOptions();
        
        parent::__construct($domSelector, $data, $options);

    }

    private function initOptions()
    {
        $this->options = array(
            "type" => "line",
            "data" => array(
                "lines" => (object) array("show" => true, "fill" => true),
                "points" => (object) array("show" => true, "radius" => 6)
            ),
            "options" => (object) array(

                "colors" => array(),
                "legend" => (object) array("show" => true),
                "grid" => (object) array("borderWidth" => 1, "hoverable" => true, "clickable" => true),
                "yaxis" => (object) array("show" => true),
                "xaxis" => (object) array("mode" => "time",  "timeformat" =>"%d/%m/%Y", "show" => true)
            )
        );
    }
}
