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
	'NationalNumberPattern' => '(?:0549|[5-7]\\d)\\d{6}',
	'PossibleLength' => [
	  0 => 8,
	  1 => 10,
	],
	'PossibleLengthLocalOnly' => [
	  0 => 6,
	],
  ],
  'fixedLine' => [
	'NationalNumberPattern' => '0549(?:8[0157-9]|9\\d)\\d{4}',
	'ExampleNumber' => '0549886377',
	'PossibleLength' => [
	  0 => 10,
	],
	'PossibleLengthLocalOnly' => [
	  0 => 6,
	],
  ],
  'mobile' => [
	'NationalNumberPattern' => '6[16]\\d{6}',
	'ExampleNumber' => '66661212',
	'PossibleLength' => [
	  0 => 8,
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
	'NationalNumberPattern' => '7[178]\\d{6}',
	'ExampleNumber' => '71123456',
	'PossibleLength' => [
	  0 => 8,
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
	'PossibleLength' => [
	  0 => -1,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'voip' => [
	'NationalNumberPattern' => '5[158]\\d{6}',
	'ExampleNumber' => '58001110',
	'PossibleLength' => [
	  0 => 8,
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
  'id' => 'SM',
  'countryCode' => 378,
  'internationalPrefix' => '00',
  'nationalPrefixForParsing' => '([89]\\d{5})',
  'nationalPrefixTransformRule' => '0549$1',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => [
	0 => [
	  'pattern' => '(\\d{2})(\\d{2})(\\d{2})(\\d{2})',
	  'format' => '$1 $2 $3 $4',
	  'leadingDigitsPatterns' => [
		0 => '[5-7]',
	  ],
	  'nationalPrefixFormattingRule' => '',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	1 => [
	  'pattern' => '(0549)(\\d{6})',
	  'format' => '$1 $2',
	  'leadingDigitsPatterns' => [
		0 => '054',
		1 => '0549',
	  ],
	  'nationalPrefixFormattingRule' => '',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	2 => [
	  'pattern' => '(\\d{6})',
	  'format' => '0549 $1',
	  'leadingDigitsPatterns' => [
		0 => '[89]',
	  ],
	  'nationalPrefixFormattingRule' => '',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
  ],
  'intlNumberFormat' => [
	0 => [
	  'pattern' => '(\\d{2})(\\d{2})(\\d{2})(\\d{2})',
	  'format' => '$1 $2 $3 $4',
	  'leadingDigitsPatterns' => [
		0 => '[5-7]',
	  ],
	  'nationalPrefixFormattingRule' => '',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	1 => [
	  'pattern' => '(0549)(\\d{6})',
	  'format' => '($1) $2',
	  'leadingDigitsPatterns' => [
		0 => '054',
		1 => '0549',
	  ],
	  'nationalPrefixFormattingRule' => '',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	2 => [
	  'pattern' => '(\\d{6})',
	  'format' => '(0549) $1',
	  'leadingDigitsPatterns' => [
		0 => '[89]',
	  ],
	  'nationalPrefixFormattingRule' => '',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
  ],
  'mainCountryForCode' => false,
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => false,
];
