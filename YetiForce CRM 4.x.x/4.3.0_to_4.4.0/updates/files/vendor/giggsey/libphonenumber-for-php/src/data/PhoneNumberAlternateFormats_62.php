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
  'id' => '',
  'countryCode' => 62,
  'internationalPrefix' => '',
  'nationalPrefix' => '0',
  'nationalPrefixForParsing' => '0',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => [
	0 => [
	  'pattern' => '(\\d{2})(\\d{3,4})(\\d{4})',
	  'format' => '$1 $2',
	  'leadingDigitsPatterns' => [
		0 => '2[124]|[36]1',
	  ],
	  'nationalPrefixFormattingRule' => '(0$1)',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	1 => [
	  'pattern' => '(\\d{2})(\\d{2})(\\d{3})(\\d{3})',
	  'format' => '$1 $2',
	  'leadingDigitsPatterns' => [
		0 => '2[124]|[36]1',
	  ],
	  'nationalPrefixFormattingRule' => '(0$1)',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	2 => [
	  'pattern' => '(8\\d{2})(\\d{3})(\\d{4,6})',
	  'format' => '$1-$2-$3',
	  'leadingDigitsPatterns' => [
		0 => '8[1-35-9]',
	  ],
	  'nationalPrefixFormattingRule' => '',
	  'domesticCarrierCodeFormattingRule' => '',
	  'nationalPrefixOptionalWhenFormatting' => false,
	],
	3 => [
	  'pattern' => '(8\\d{2})(\\d{3})(\\d{2})(\\d{3})',
	  'format' => '$1-$2-$3-$4',
	  'leadingDigitsPatterns' => [
		0 => '8[1-35-9]',
	  ],
	  'nationalPrefixFormattingRule' => '',
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
