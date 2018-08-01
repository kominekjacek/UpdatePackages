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
	'NationalNumberPattern' => '[136-8]\\d{1,4}',
	'PossibleLength' => [
	  0 => 2,
	  1 => 3,
	  2 => 4,
	  3 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '35200|67(?:00|77)|74(?:02|44)|8000[12]',
	'ExampleNumber' => '35200',
	'PossibleLength' => [
	  0 => 4,
	  1 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'premiumRate' => [
	'NationalNumberPattern' => '122[13]|3(?:52(?:11|2[02]|3[04-6]|99)|7574)|8002[12]',
	'ExampleNumber' => '35211',
	'PossibleLength' => [
	  0 => 4,
	  1 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'emergency' => [
	'NationalNumberPattern' => '1[578]',
	'ExampleNumber' => '17',
	'PossibleLength' => [
	  0 => 2,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'shortCode' => [
	'NationalNumberPattern' => '1(?:1(?:2|[013-9]\\d)|2(?:1[02-469]|2[13])|[578])|3(?:5(?:0(?:35|57)|2\\d{2})|[67]\\d{3})|67(?:0[09]|59|77|8[89]|99)|74(?:0[02]|44|55)|800[012][12]',
	'ExampleNumber' => '1210',
	'PossibleLength' => [
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'standardRate' => [
	'NationalNumberPattern' => '37(?:433|575)|7400|8001[12]',
	'ExampleNumber' => '7400',
	'PossibleLength' => [
	  0 => 4,
	  1 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'carrierSpecific' => [
	'NationalNumberPattern' => '3(?:5035|[67]\\d{3})|800[012][12]',
	'ExampleNumber' => '35035',
	'PossibleLength' => [
	  0 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'smsServices' => [
	'NationalNumberPattern' => '3(?:6\\d{3}|7(?:4(?:0[24-9]|[1-9]\\d)|5\\d{2}))|7400',
	'ExampleNumber' => '37575',
	'PossibleLength' => [
	  0 => 4,
	  1 => 5,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'id' => 'ML',
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
