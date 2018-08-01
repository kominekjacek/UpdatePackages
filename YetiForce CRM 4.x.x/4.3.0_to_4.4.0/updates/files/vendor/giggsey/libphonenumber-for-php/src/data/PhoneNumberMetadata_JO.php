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
	'NationalNumberPattern' => '(?:(?:(?:[268]|7\\d)\\d|32|53)\\d|900)\\d{5}',
	'PossibleLength' => [
	  0 => 8,
	  1 => 9,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'fixedLine' => [
	'NationalNumberPattern' => '(?:2(?:6(?:2[0-35-9]|3[0-57-8]|4[24-7]|5[0-24-8]|[6-8][023]|9[0-3])|7(?:0[1-79]|10|2[014-7]|3[0-689]|4[019]|5[0-3578]))|32(?:0[1-69]|1[1-35-7]|2[024-7]|3\\d|4[0-3]|[57][023]|6[03])|53(?:0[0-3]|[13][023]|2[0-59]|49|5[0-35-9]|6[15]|7[45]|8[1-6]|9[0-36-9])|6(?:2[50]0|3(?:00|33)|4(?:0[0125]|1[2-7]|2[0569]|[38][07-9]|4[025689]|6[0-589]|7\\d|9[0-2])|5(?:[01][056]|2[034]|3[0-57-9]|4[17-8]|5[0-69]|6[0-35-9]|7[1-379]|8[0-68]|9[02-39]))|87(?:[02]0|7[08]|90))\\d{4}',
	'ExampleNumber' => '62001234',
	'PossibleLength' => [
	  0 => 8,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'mobile' => [
	'NationalNumberPattern' => '7(?:55[0-49]|7[025-9]\\d|8[0-25-9]\\d|9[0-25-9]\\d)\\d{5}',
	'ExampleNumber' => '790123456',
	'PossibleLength' => [
	  0 => 9,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'tollFree' => [
	'NationalNumberPattern' => '80\\d{6}',
	'ExampleNumber' => '80012345',
	'PossibleLength' => [
	  0 => 8,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'premiumRate' => [
	'NationalNumberPattern' => '900\\d{5}',
	'ExampleNumber' => '90012345',
	'PossibleLength' => [
	  0 => 8,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'sharedCost' => [
	'NationalNumberPattern' => '85\\d{6}',
	'ExampleNumber' => '85012345',
	'PossibleLength' => [
	  0 => 8,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'personalNumber' => [
	'NationalNumberPattern' => '70\\d{7}',
	'ExampleNumber' => '700123456',
	'PossibleLength' => [
	  0 => 9,
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
	'NationalNumberPattern' => '74(?:66|77)\\d{5}',
	'ExampleNumber' => '746612345',
	'PossibleLength' => [
	  0 => 9,
	],
	'PossibleLengthLocalOnly' => [
	],
  ],
  'uan' => [
	'NationalNumberPattern' => '8(?:10|8\\d)\\d{5}',
	'ExampleNumber' => '88101234',
	'PossibleLength' => [
	  0 => 8,
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
  'id' => 'JO',
  'countryCode' => 962,
  'internationalPrefix' => '00',
  'nationalPrefix' => '0',
  'nationalPrefixForParsing' => '0',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => [
	0 => [
	  'pattern' => '(\\d)(\\d{3})(\\d{4})',
	  'format' => '$1 $2 $3',
	  'leadingDigitsPatterns' => [
		0 => '[2356]|87',
	  ],
	  'nationalPrefixFormattingRule' => '(0$1)',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	1 => [
	  'pattern' => '(7)(\\d{4})(\\d{4})',
	  'format' => '$1 $2 $3',
	  'leadingDigitsPatterns' => [
		0 => '7[457-9]',
	  ],
	  'nationalPrefixFormattingRule' => '0$1',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	2 => [
	  'pattern' => '(\\d{2})(\\d{7})',
	  'format' => '$1 $2',
	  'leadingDigitsPatterns' => [
		0 => '70',
	  ],
	  'nationalPrefixFormattingRule' => '0$1',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	3 => [
	  'pattern' => '(\\d{3})(\\d{5,6})',
	  'format' => '$1 $2',
	  'leadingDigitsPatterns' => [
		0 => '8[0158]|9',
	  ],
	  'nationalPrefixFormattingRule' => '0$1',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
  ],
  'intlNumberFormat' => [
  ],
  'mainCountryForCode' => false,
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => true,
];
