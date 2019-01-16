> ⚠️ Deprecated - This Craft CMS 2.x plugin is no longer supported. 

<img src="https://github.com/bymayo/barcode/raw/master/screenshots/icon.png" width="50">

# Barcode for Craft 2.x

Barcode is a Craft CMS plugin that allows you to generate a barcode image (Or HTML) in your templates using Twig. 

This was built for a project that required barcodes to be generated in Twig and exported via a PDF.

It uses the PHP Barcode Generator (https://github.com/picqer/php-barcode-generator) library and includes all the options from there.

## Install

- Add the `barcode` directory into your `craft/plugins` directory.
- Navigate to Settings -> Plugins and click the "Install" button.

## Templating

There is only one method that you can use - generate. 

```
{{ craft.barcode.generate(
	{
		code: '8745364267452',
		barcodeImageType: 'svg',
		type: 'TYPE_CODE_128'
	}
) }}
```

## Templating Options

<table>
	<tr>
		<td><strong>Name</strong></td>
		<td><strong>Type</strong></td>
		<td><strong>Default Value</strong></td>
		<td><strong>Required</strong></td>
		<td><strong>Description</strong></td>
	</tr>
	<tr>
		<td>code</td>
		<td>string</td>
		<td>null</td>
		<td>Yes</td>
		<td>The code data the barcode should be generated from.</td>
	</tr>
	<tr>
		<td>barcodeImageType</td>
		<td>string</td>
		<td>null</td>
		<td>Yes</td>
		<td>Image type you want to output the barcode as. Accepts svg, png, jpg or html (Must be lowercase)</td>
	</tr>
	<tr>
		<td>type</td>
		<td>string</td>
		<td>null</td>
		<td>Yes</td>
		<td>The type of barcode you want to output, accepts all the 'Accepted types' from https://github.com/picqer/php-barcode-generator#accepted-types.</td>
	</tr>
	<tr>
		<td>color</td>
		<td>string</td>
		<td>000000</td>
		<td>---</td>
		<td>Foreground colour of the barcode, accepts all HEX codes (Without the #)</td>
	</tr>
	<tr>
		<td>width</td>
		<td>integer</td>
		<td>2</td>
		<td>---</td>
		<td>Width is based on the length of the data, with this you can make the barcode bars wider.</td>
	</tr>
	<tr>
		<td>height</td>
		<td>integer</td>
		<td>30</td>
		<td>---</td>
		<td>Height of the barcode in pixels.</td>
	</tr>
</table>

## Credits

Barcode Scanner by ProSymbols from Noun Project (https://thenounproject.com/prosymbols/)
