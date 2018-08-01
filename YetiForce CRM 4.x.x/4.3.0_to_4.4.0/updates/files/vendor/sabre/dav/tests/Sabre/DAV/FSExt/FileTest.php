<?php

namespace Sabre\DAV\FSExt;

require_once 'Sabre/TestUtil.php';

class FileTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		file_put_contents(SABRE_TEMPDIR . '/file.txt', 'Contents');
	}

	public function tearDown()
	{
		\Sabre\TestUtil::clearTempDir();
	}

	public function testPut()
	{
		$filename = SABRE_TEMPDIR . '/file.txt';
		$file = new File($filename);
		$result = $file->put('New contents');

		$this->assertSame('New contents', file_get_contents(SABRE_TEMPDIR . '/file.txt'));
		$this->assertSame(
			'"' .
			sha1(
				fileinode($filename) .
				filesize($filename) .
				filemtime($filename)
			) . '"',
			$result
		);
	}

	public function testRange()
	{
		$file = new File(SABRE_TEMPDIR . '/file.txt');
		$file->put('0000000');
		$file->patch('111', 2, 3);

		$this->assertSame('0001110', file_get_contents(SABRE_TEMPDIR . '/file.txt'));
	}

	public function testRangeStream()
	{
		$stream = fopen('php://memory', 'r+');
		fwrite($stream, '222');
		rewind($stream);

		$file = new File(SABRE_TEMPDIR . '/file.txt');
		$file->put('0000000');
		$file->patch($stream, 2, 3);

		$this->assertSame('0002220', file_get_contents(SABRE_TEMPDIR . '/file.txt'));
	}

	public function testGet()
	{
		$file = new File(SABRE_TEMPDIR . '/file.txt');
		$this->assertSame('Contents', stream_get_contents($file->get()));
	}

	public function testDelete()
	{
		$file = new File(SABRE_TEMPDIR . '/file.txt');
		$file->delete();

		$this->assertFalse(file_exists(SABRE_TEMPDIR . '/file.txt'));
	}

	public function testGetETag()
	{
		$filename = SABRE_TEMPDIR . '/file.txt';
		$file = new File($filename);
		$this->assertSame(
			'"' .
			sha1(
				fileinode($filename) .
				filesize($filename) .
				filemtime($filename)
			) . '"',
			$file->getETag()
		);
	}

	public function testGetContentType()
	{
		$file = new File(SABRE_TEMPDIR . '/file.txt');
		$this->assertNull($file->getContentType());
	}

	public function testGetSize()
	{
		$file = new File(SABRE_TEMPDIR . '/file.txt');
		$this->assertSame(8, $file->getSize());
	}
}
