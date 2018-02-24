<?php
/**
 * BarcodeVariable for Barcode plugin for Craft CMS 3.x
 *
 * Barcode is a Craft CMS plugin that allows you to generate a barcode image (Or HTML) in your templates using Twig.
 *
 * @link      https://bymayo.co.uk
 * @copyright Copyright (c) 2018 ByMayo
 */

namespace bymayo\barcode\variables;

use bymayo\barcode\Barcode;

use Craft;

class BarcodeVariable
{

    /**
     * Generate a barcode based on an array of options passed into twig.
     * @param array $optional
     * @return string
     */

    public function generate(array $options)
    {
        return Barcode::$plugin->barcodeService->generate($options);
    }
}
