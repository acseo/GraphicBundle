<?php

namespace ACSEO\Bundle\GraphicBundle\Graphic\Flot\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;

class FlotTwigExtension extends \Twig_Extension {
    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction(
                'flot_graph',
                [$this, 'flotGraph'],
                [
                    'is_safe' => array('html', 'js'),
                    'needs_environment' => true
                ]
            ),
        );
    }

    /**
     * @param string $string
     * @return int
     */
    public function flotGraph (\Twig_Environment $twig, \ACSEO\Bundle\GraphicBundle\Graphic\Flot\Type\AbstractType $graph) {
        return $twig->render('ACSEOGraphicBundle:Graphic\Flot:'.strtolower((new \ReflectionClass($graph))->getShortName()).'.html.twig', $graph->getView());
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'graphic_flot';
    }
}
