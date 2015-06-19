<?php
namespace Arrounded\Assets;

class AssetsHandlerTest extends AssetsTestCase
{
    /**
     * @type AssetsHandler
     */
    protected $assets;

    public function setUp()
    {
        $this->assets = new AssetsHandler([
            'global' => [
                'css' => [
                    'foo.css',
                    'bar.css',
                ],
                'js'  => [
                    'foo.js',
                    'bar.js',
                ],
            ],
        ]);
    }

    public function testCanGetStylesInCollection()
    {
        $styles  = $this->assets->styles('global');
        $matcher = <<<EOF
<!-- build:css builds/css/global.css -->
<link rel="stylesheet" href="foo.css">
<link rel="stylesheet" href="bar.css">
<!-- endbuild -->
EOF;

        $this->assertEquals($matcher, $styles);
    }

    public function testCanGetScriptsInCollection()
    {
        $styles  = $this->assets->scripts('global');
        $matcher = <<<EOF
<!-- build:js builds/js/global.js -->
<script src="foo.js"></script>
<script src="bar.js"></script>
<!-- endbuild -->
EOF;

        $this->assertEquals($matcher, $styles);
    }
}
