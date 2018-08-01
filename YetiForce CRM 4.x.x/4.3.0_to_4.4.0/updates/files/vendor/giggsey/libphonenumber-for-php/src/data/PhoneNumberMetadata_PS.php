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
	'NationalNumberPattern' => '(?:(?:1\\d|5)\\d\\d|[2489]2)\\d{6}',
	'PossibleLength' => [
	  0 => 8,
	  1 => 9,
	  2 => 10,
	],
	'PossibleLengthLocalOnly' => [
	  0 => 7,
	],
  ],
  'fixedLine' => [
	'NationalNumberPattern' => '(?:22[234789]|42[45]|82[01458]|92[369])\\d{5}',
	'ExampleNumber' => '22234567',
	'PossibleLength' => [
	  0 => 8,
	],
	'PossibleLengthLocalOnly' => [
	  0 => 7,
	],
  ],
  'mobile' => [
	'NationalNumberPattern' => '5[69]\\d{7}',
	'ExampleNumber' => '599123456',
	'PossibleLength' => [
	  0 => 9,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '1800\\d{6}',
	'ExampleNumber' => '1800123456',
	'PossibleLength' => [
	  0 => 10,
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
  'sharedCost' => [
	'NationalNumberPattern' => '1700\\d{6}',
	'ExampleNumber' => '1700123456',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'personalNumber' => [
	'PossibleLength' => [
	  0 => -1,
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
  'id' => 'PS',
  'countryCode' => 970,
  'internationalPrefix' => '00',
  'nationalPrefix' => '0',
  'nationalPrefixForParsing' => '0',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => [
	0 => [
	  'pattern' => '([2489])(2\\d{2})(\\d{4})',
	  'format' => '$1 $2 $3',
	  'leadingDigitsPatterns' => [
		0 => '[2489]2',
	  ],
	  'nationalPrefixFormattingRule' => '0$1',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	1 => [
	  'pattern' => '(5[69]\\d)(\\d{3})(\\d{3})',
	  'format' => '$1 $2 $3',
	  'leadingDigitsPatterns' => [
		0 => '5[69]',
	  ],
	  'nationalPrefixFormattingRule' => '0$1',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	2 => [
	  'pattern' => '(1[78]00)(\\d{3})(\\d{3})',
	  'format' => '$1 $2 $3',
	  'leadingDigitsPatterns' => [
		0 => '1[78]0',
		1 => '1[78]00',
	  ],
	  'nationalPrefixFormattingRule' => '$1',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
  ],
  'intlNumberFormat' => [
  ],
  'mainCountryForCode' => false,
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => false,
];
