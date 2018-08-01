<?php

namespace Sabre\VObject;

use PHPUnit\Framework\TestCase;

class Issue64Test extends TestCase
{
	public function testRead()
	{
		$vcard = Reader::read(file_get_contents(dirname(__FILE__) . '/issue64.vcf'));
		$vcard = $vcard->convert(\Sabre\VObject\Document::VCARD30);
		$vcard = $vcard->serialize();

		$converted = Reader::read($vcard);

		$this->assertInstanceOf('Sabre\\VObject\\Component\\VCard', $converted);
	}
}
