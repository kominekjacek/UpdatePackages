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
	'NationalNumberPattern' => '[014]\\d\\d(?:\\d{2})?',
	'PossibleLength' => [
	  0 => 3,
	  1 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'PossibleLength' => [
	  0 => -1,
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
	'NationalNumberPattern' => '0(?:11|22|33)|1(?:1[123]|22)',
	'ExampleNumber' => '112',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'shortCode' => [
	'NationalNumberPattern' => '0(?:11|22|33)|1(?:1[123]|22)|40404',
	'ExampleNumber' => '112',
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
	'NationalNumberPattern' => '40404',
	'ExampleNumber' => '40404',
	'PossibleLength' => [
	  0 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'smsServices' => [
	'NationalNumberPattern' => '40404',
	'ExampleNumber' => '40404',
	'PossibleLength' => [
	  0 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'id' => 'GE',
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
