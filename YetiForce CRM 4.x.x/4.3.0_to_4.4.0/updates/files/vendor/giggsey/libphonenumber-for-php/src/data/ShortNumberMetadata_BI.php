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
	'NationalNumberPattern' => '[16-9]\\d{2,3}',
	'PossibleLength' => [
	  0 => 3,
	  1 => 4,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '611',
	'ExampleNumber' => '611',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'premiumRate' => [
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'emergency' => [
	'NationalNumberPattern' => '11[237]',
	'ExampleNumber' => '117',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'shortCode' => [
	'NationalNumberPattern' => '1(?:1\\d|5[2-9]|6[0-256])|611|7(?:10|77|979)|8[28]8|900',
	'ExampleNumber' => '117',
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
	'NationalNumberPattern' => '611|7(?:10|77)|888|900',
	'ExampleNumber' => '611',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'smsServices' => [
	'NationalNumberPattern' => '710|900',
	'ExampleNumber' => '900',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'id' => 'BI',
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
