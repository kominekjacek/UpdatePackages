<?php
/**
 * This file has been @generated by a phing task by {@link BuildMetadataPHPFromXml}.
 * See [README.md](README.md#generating-data) for more information.
 *
 * Pull requests changing data in these files will not be accepted. See the
 * [FAQ in the README](README.md#problems-with-invalid-numbers] on how to make
 * metadata changes.
 *
 * Do not modify this file directly!
 */

return [
  'generalDesc' => [
	'NationalNumberPattern' => '[15]\\d{2,5}',
	'PossibleLength' => [
	  0 => 3,
	  1 => 4,
	  2 => 5,
	  3 => 6,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '1(?:3[15]|41|16\\d{3})',
	'ExampleNumber' => '116000',
	'PossibleLength' => [
	  0 => 3,
	  1 => 6,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'premiumRate' => [
	'NationalNumberPattern' => '5\\d{4}',
	'ExampleNumber' => '50123',
	'PossibleLength' => [
	  0 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'emergency' => [
	'NationalNumberPattern' => '1(?:12|2[7-9])',
	'ExampleNumber' => '129',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'shortCode' => [
	'NationalNumberPattern' => '1(?:1(?:\\d|6(?:000|1(?:06|11|23))|8\\d{2})|2[2-9]|[349]\\d|65\\d|89[12])|5\\d{4}',
	'ExampleNumber' => '129',
	'PossibleLength' => [
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'standardRate' => [
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'carrierSpecific' => [
	'NationalNumberPattern' => '123',
	'ExampleNumber' => '123',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'smsServices' => [
	'NationalNumberPattern' => '131|5\\d{4}',
	'ExampleNumber' => '51234',
	'PossibleLength' => [
	  0 => 3,
	  1 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'id' => 'AL',
  'countryCode' => 0,
  'internationalPrefix' => '',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => [
  ],
  'intlNumberFormat' => [
  ],
  'mainCountryForCode' => false,
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => false,
];
