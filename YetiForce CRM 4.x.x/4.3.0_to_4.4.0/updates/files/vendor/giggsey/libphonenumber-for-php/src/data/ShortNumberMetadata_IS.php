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
	'NationalNumberPattern' => '1\\d\\d(?:\\d(?:\\d{2})?)?',
	'PossibleLength' => [
	  0 => 3,
	  1 => 4,
	  2 => 6,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '1717',
	'ExampleNumber' => '1717',
	'PossibleLength' => [
	  0 => 4,
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
	'NationalNumberPattern' => '112',
	'ExampleNumber' => '112',
	'PossibleLength' => [
	  0 => 3,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'shortCode' => [
	'NationalNumberPattern' => '1(?:1(?:[28]|6(?:1(?:23|16)))|4(?:00|1[145]|4[0146])|55|7(?:00|17|7[07-9])|8(?:[02]0|1[16-9]|88)|900)',
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
	'NationalNumberPattern' => '14(?:00|41)',
	'ExampleNumber' => '1441',
	'PossibleLength' => [
	  0 => 4,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'smsServices' => [
	'NationalNumberPattern' => '1(?:415|900)',
	'ExampleNumber' => '1415',
	'PossibleLength' => [
	  0 => 4,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'id' => 'IS',
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
