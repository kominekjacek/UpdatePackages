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
	'NationalNumberPattern' => '(?:1481|[357-9]\\d{3})\\d{6}|8\\d{6}(?:\\d{2})?',
	'PossibleLength' => [
	  0 => 7,
	  1 => 9,
	  2 => 10,
	],
	'PossibleLengthLocalOnly' => [
	  0 => 6,
	],
  ],
  'fixedLine' => [
	'NationalNumberPattern' => '1481[25-9]\\d{5}',
	'ExampleNumber' => '1481256789',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	  0 => 6,
	],
  ],
  'mobile' => [
	'NationalNumberPattern' => '7(?:781\\d|839\\d|911[17])\\d{5}',
	'ExampleNumber' => '7781123456',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '80(?:0(?:1111|\\d{6,7})|8\\d{7})',
	'ExampleNumber' => '8001234567',
	'PossibleLength' => [
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'premiumRate' => [
	'NationalNumberPattern' => '(?:87[123]|9(?:[01]\\d|8[0-3]))\\d{7}',
	'ExampleNumber' => '9012345678',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'sharedCost' => [
	'NationalNumberPattern' => '8(?:4(?:5464\\d|[2-5]\\d{7})|70\\d{7})',
	'ExampleNumber' => '8431234567',
	'PossibleLength' => [
	  0 => 7,
	  1 => 10,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'personalNumber' => [
	'NationalNumberPattern' => '70\\d{8}',
	'ExampleNumber' => '7012345678',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'voip' => [
	'NationalNumberPattern' => '56\\d{8}',
	'ExampleNumber' => '5612345678',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'pager' => [
	'NationalNumberPattern' => '76(?:0[012]|2[356]|4[0134]|5[49]|6[0-369]|77|81|9[39])\\d{6}',
	'ExampleNumber' => '7640123456',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'uan' => [
	'NationalNumberPattern' => '(?:3[0347]|55)\\d{8}',
	'ExampleNumber' => '5512345678',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'voicemail' => [
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'noInternationalDialling' => [
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'id' => 'GG',
  'countryCode' => 44,
  'internationalPrefix' => '00',
  'nationalPrefix' => '0',
  'nationalPrefixForParsing' => '0',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => [
  ],
  'intlNumberFormat' => [
  ],
  'mainCountryForCode' => false,
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => false,
];
