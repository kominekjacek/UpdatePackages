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
	'NationalNumberPattern' => '(?:(?:[58]\\d\\d|900)\\d\\d|66449)\\d{5}',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	  0 => 7,
	],
  ],
  'fixedLine' => [
	'NationalNumberPattern' => '664491\\d{4}',
	'ExampleNumber' => '6644912345',
	'PossibleLength' => [
	],
	'PossibleLengthLocalOnly' => [
	  0 => 7,
	],
  ],
  'mobile' => [
	'NationalNumberPattern' => '66449[2-6]\\d{4}',
	'ExampleNumber' => '6644923456',
	'PossibleLength' => [
	],
	'PossibleLengthLocalOnly' => [
	  0 => 7,
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '8(?:00|33|44|55|66|77|88)[2-9]\\d{6}',
	'ExampleNumber' => '8002123456',
	'PossibleLength' => [
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'premiumRate' => [
	'NationalNumberPattern' => '900[2-9]\\d{6}',
	'ExampleNumber' => '9002123456',
	'PossibleLength' => [
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'sharedCost' => [
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'personalNumber' => [
	'NationalNumberPattern' => '5(?:00|2[12]|33|44|66|77|88)[2-9]\\d{6}',
	'ExampleNumber' => '5002345678',
	'PossibleLength' => [
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'voip' => [
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'pager' => [
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'uan' => [
	'PossibleLength' => [
	  0 => -1,
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
  'id' => 'MS',
  'countryCode' => 1,
  'internationalPrefix' => '011',
  'nationalPrefix' => '1',
  'nationalPrefixForParsing' => '1',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => [
  ],
  'intlNumberFormat' => [
  ],
  'mainCountryForCode' => false,
  'leadingDigits' => '664',
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => false,
];