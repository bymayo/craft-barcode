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

class BarcodeVariable
{
	
	/*
	 * Generate Barcode Object
	*/
    public function generate($options)
    {
	    return craft()->barcode->generate($options);
    }
}