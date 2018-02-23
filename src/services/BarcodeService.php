<?php
/**
 * Barcode plugin for Craft CMS 3.x
 *
 * Barcode is a Craft CMS plugin that allows you to generate a barcode image (Or HTML) in your templates using Twig.
 *
 * @link      https://bymayo.co.uk
 * @copyright Copyright (c) 2018 ByMayo
 */

namespace bymayo\barcode\services;

use bymayo\barcode\Barcode;

use Craft;
use craft\base\Component;

/**
 * Barcode Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    ByMayo
 * @package   Barcode
 * @since     1.0.0
 */
class BarcodeService extends Component
{

    /**
     * Renders the actual barcode stuff based on the selected barcode $options variable.
     * @param $type
     * @param $hex
     * @return mixed
     */
    public function hexToRgb(String $hex, String $type)
    {

        // Respect to http://stackoverflow.com/a/15202130/403180
        list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");

        if ($type === 'png' || $type === 'jpg') {
            return array($r,$g,$b);
        }
        else {
            return '#' . $hex;
        }
    }


    /**
     * Renders the actual barcode stuff based on the selected barcode $options variable.
     * @param \Picqer\Barcode\ instance $generator
     * @param array $options
     * @return mixed
     */
    public function getBarcode($generator, $options)
    {

        // Array the barcode types
        $barcodeType = [
            'TYPE_CODE_39' => $generator::TYPE_CODE_39,
            'TYPE_CODE_39_CHECKSUM' => $generator::TYPE_CODE_39_CHECKSUM,
            'TYPE_CODE_39E' => $generator::TYPE_CODE_39E,
            'TYPE_CODE_39E_CHECKSUM' => $generator::TYPE_CODE_39E_CHECKSUM,
            'TYPE_CODE_93' => $generator::TYPE_CODE_93,
            'TYPE_STANDARD_2_5' => $generator::TYPE_STANDARD_2_5,
            'TYPE_STANDARD_2_5_CHECKSUM' => $generator::TYPE_STANDARD_2_5_CHECKSUM,
            'TYPE_INTERLEAVED_2_5' => $generator::TYPE_INTERLEAVED_2_5,
            'TYPE_INTERLEAVED_2_5_CHECKSUM' => $generator::TYPE_INTERLEAVED_2_5_CHECKSUM,
            'TYPE_CODE_128' => $generator::TYPE_CODE_128,
            'TYPE_CODE_128_A' => $generator::TYPE_CODE_128_A,
            'TYPE_CODE_128_B' => $generator::TYPE_CODE_128_B,
            'TYPE_CODE_128_C' => $generator::TYPE_CODE_128_C,
            'TYPE_EAN_2' => $generator::TYPE_EAN_2,
            'TYPE_EAN_5' => $generator::TYPE_EAN_5,
            'TYPE_EAN_8' => $generator::TYPE_EAN_8,
            'TYPE_EAN_13' => $generator::TYPE_EAN_13,
            'TYPE_UPC_A' => $generator::TYPE_UPC_A,
            'TYPE_UPC_E' => $generator::TYPE_UPC_E,
            'TYPE_MSI' => $generator::TYPE_MSI,
            'TYPE_MSI_CHECKSUM' => $generator::TYPE_MSI_CHECKSUM,
            'TYPE_POSTNET' => $generator::TYPE_POSTNET,
            'TYPE_PLANET' => $generator::TYPE_PLANET,
            'TYPE_RMS4CC' => $generator::TYPE_RMS4CC,
            'TYPE_KIX' => $generator::TYPE_KIX,
            'TYPE_IMB' => $generator::TYPE_IMB,
            'TYPE_CODABAR' => $generator::TYPE_CODABAR,
            'TYPE_CODE_11' => $generator::TYPE_CODE_11,
            'TYPE_PHARMA_CODE' => $generator::TYPE_PHARMA_CODE,
            'TYPE_PHARMA_CODE_TWO_TRACKS' => $generator::TYPE_PHARMA_CODE_TWO_TRACKS
        ];


        return
            $generator->getBarcode(
                $options['code'],
                $barcodeType[$options['type']],
                (array_key_exists('width', $options)) ? $options['width'] : 2,
                (array_key_exists('height', $options)) ? $options['height'] : 30,
                (array_key_exists('color', $options)) ? $this->hexToRgb($options['color'], $options['barcodeImageType']) : $this->hexToRgb('000000', $options['barcodeImageType'])
            );
    }


    /**
     * Generates a barcode based on the array options.
     * @param array $options
     */
    public function generate(array $options)
    {

        switch ($options['barcodeImageType']) {
            case 'svg':
                $generator = new \Picqer\Barcode\BarcodeGeneratorSVG();
                echo '<img src="data:image/svg+xml;base64,' . base64_encode($this->getBarcode($generator, $options)) . '">';
                break;
            case 'png':
                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($this->getBarcode($generator, $options)) . '">';
                break;
            case 'jpg':
                $generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
                echo '<img src="data:image/jpg;base64,' . base64_encode($this->getBarcode($generator, $options)) . '">';
                break;
            case 'html':
                $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
                echo $this->getBarcode($generator, $options);
                break;
        }
    }
}
