<?php
/**
 * Barcode
 *
 * @author    Jason Mayo
 * @twitter   @madebymayo
 * @package   Barcode
 *
 */

namespace Craft;

class BarcodePlugin extends BasePlugin
{

    public function init()
    {	    
		require_once __DIR__ . '/vendor/autoload.php';
	    parent::init();   
    }

    public function getName()
    {
         return Craft::t('Barcode');
    }

    public function getDescription()
    {
        return Craft::t('Generates barcode images using PHP Barcode Generator');
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/madebyshape/barcode/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/madebyshape/barcode/master/releases.json';
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getSchemaVersion()
    {
        return '1.0';
    }

    public function getDeveloper()
    {
        return 'Jason Mayo';
    }

    public function getDeveloperUrl()
    {
        return 'bymayo.co.uk';
    }

    public function hasCpSection()
    {
        return false;
    }
}