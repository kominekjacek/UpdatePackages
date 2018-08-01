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
	'NationalNumberPattern' => '[139]\\d\\d(?:\\d{2})?',
	'PossibleLength' => [
	  0 => 3,
	  1 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '9(?:5[023]|61)',
	'ExampleNumber' => '961',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'premiumRate' => [
	'NationalNumberPattern' => '3\\d{4}',
	'ExampleNumber' => '30123',
	'PossibleLength' => [
	  0 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'emergency' => [
	'NationalNumberPattern' => '(?:112|99[3-59])',
	'ExampleNumber' => '999',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'shortCode' => [
	'NationalNumberPattern' => '11[2469]|3\\d{4}|9(?:5[023]|6[0-25]|9[3-59])',
	'ExampleNumber' => '999',
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
	'NationalNumberPattern' => '(?:114|9(?:5[023]|6[0-25]))',
	'ExampleNumber' => '114',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'smsServices' => [
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'id' => 'ZW',
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
