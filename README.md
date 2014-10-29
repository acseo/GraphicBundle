# ACSEO GraphicBundle

----

This bundle can be usefull when you want to easyly manipulate your data and generate nice graphics such as BarCharts, PieChart, Timelines, etc.

## Installation

Add the bundle in your composer.json:

```json
{
    "require": {
        "acseo/graphic-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

```bash
$ php composer.phar update acseo/graphic-bundle
```
Composer will install the bundle to your project's ```vendor/ACSEO``` directory.


Enable the bundle in your project

```php
<?php 
//app/AppKernel.php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
        //...
        new ACSEO\Bundle\GraphicBundle\ACSEOGraphicBundle(),
		//...
        );
//..
```

## Usage with jQuery Flot
### In Controller
```php
<?php

namespace MyProjet\MyBundle\Controller;

use ACSEO\Bundle\GraphicBundle\Graphic\Flot\Type\TimeLine; 
use ACSEO\Bundle\GraphicBundle\Graphic\Flot\Type\Pie;

class MyController extends Controller
{
    public function indexAction()
    {
        // Construct data and timeline chart
        $followers = array(
            array(strtotime("01/01/2014") * 1000, 3),
            array(strtotime("02/01/2014") * 1000, 18),
            array(strtotime("03/01/2014") * 1000, 56),
            array(strtotime("04/01/2014") * 1000, 60)
        );
        $timeline = new TimeLine("#domIdFollowers", $followers); 

        // Construct data and pie chart
        $cities = array(
            (object) array("label" => "Marseille", "data" => 100),
            (object) array("label" => "Lyon",      "data" => 50),
            (object) array("label" => "Paris",     "data" =>  1),
        );
        $pie = new Pie("#cities", $cities); 

        return $this->render('MyProjectMyBundle:Default:index.html.twig', array(
                'timeline' => $timeline,
                'pie' => $pie
        ));
```
### In View
Once you have created the graphs in your Controller, the hardest is done. Simply call the Twig Extension ```flot_graph``` to generate the graphs.

```twig
{# MyBundle:MyController:index.html.twig #}
<html>
    <head>
        <!-- include jQuery and jQuery Flot Javascript form CDN or from your project -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/flot/0.8.2/jquery.flot.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/flot/0.8.2/jquery.flot.pie.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/flot/0.8.2/jquery.flot.time.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                {{ flot_graph(timeline) }}
                {{ flot_graph(pie) }}
            });
        </script>
    </head>
    <body>
        <!-- remember to give width and height to your graph containers -->
        <div id="domIdFollowers" style="width:100%;height:50%"></div>
        <div id="cities" style="width:100%;height:50%"></div>
    </body>
</html>
```
## TODO

* write tests
* use other grah providers, such as [Google Charts](https://developers.google.com/chart/)
