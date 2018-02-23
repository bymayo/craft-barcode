<?php
/**
 * BarcodeService plugin for Craft CMS 3.x
 *
 * BarcodeService is a Craft CMS plugin that allows you to generate a barcode image (Or HTML) in your templates using Twig.
 *
 * @link      https://bymayo.co.uk
 * @copyright Copyright (c) 2018 ByMayo
 */

namespace bymayo\barcode\variables;

use bymayo\barcode\Barcode;

use Craft;

/**
 * BarcodeService Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.barcode }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    ByMayo
 * @package   BarcodeService
 * @since     1.0.0
 */
class BarcodeVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Generate a barcode. Use the below twig:
     *
     *  {{ craft.barcode.generate(  {
     *          code: '8745364267452',
     *          barcodeImageType: 'svg',
     *          type: 'TYPE_CODE_128'
     *  } ) }}
     *
     * @param array $optional
     * @return string
     */
    /*
	 * Generate BarcodeService Object
	*/
    public function generate(array $options)
    {
        return Barcode::$plugin->barcodeService->generate($options);
    }
}
