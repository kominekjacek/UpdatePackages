<?php

namespace Sabre\DAV;

use Sabre\DAVServerTest;
use Sabre\HTTP;

/**
 * Tests related to the GET request.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class HttpGetTest extends DAVServerTest
{
	/**
	 * Sets up the DAV tree.
	 */
	public function setUpTree()
	{
		$this->tree = new Mock\Collection('root', [
			'file1' => 'foo',
			new Mock\Collection('dir', []),
			new Mock\StreamingFile('streaming', 'stream')
		]);
	}

	public function testGet()
	{
		$request = new HTTP\Request('GET', '/file1');
		$response = $this->request($request);

		$this->assertSame(200, $response->getStatus());

		// Removing Last-Modified because it keeps changing.
		$response->removeHeader('Last-Modified');

		$this->assertSame(
			[
				'X-Sabre-Version' => [Version::VERSION],
				'Content-Type'    => ['application/octet-stream'],
				'Content-Length'  => [3],
				'ETag'            => ['"' . md5('foo') . '"'],
			],
			$response->getHeaders()
		);

		$this->assertSame('foo', $response->getBodyAsString());
	}

	public function testGetHttp10()
	{
		$request = new HTTP\Request('GET', '/file1');
		$request->setHttpVersion('1.0');
		$response = $this->request($request);

		$this->assertSame(200, $response->getStatus());

		// Removing Last-Modified because it keeps changing.
		$response->removeHeader('Last-Modified');

		$this->assertSame(
			[
				'X-Sabre-Version' => [Version::VERSION],
				'Content-Type'    => ['application/octet-stream'],
				'Content-Length'  => [3],
				'ETag'            => ['"' . md5('foo') . '"'],
			],
			$response->getHeaders()
		);

		$this->assertSame('1.0', $response->getHttpVersion());

		$this->assertSame('foo', $response->getBodyAsString());
	}

	public function testGet404()
	{
		$request = new HTTP\Request('GET', '/notfound');
		$response = $this->request($request);

		$this->assertSame(404, $response->getStatus());
	}

	public function testGet404_aswell()
	{
		$request = new HTTP\Request('GET', '/file1/subfile');
		$response = $this->request($request);

		$this->assertSame(404, $response->getStatus());
	}

	/**
	 * We automatically normalize double slashes.
	 */
	public function testGetDoubleSlash()
	{
		$request = new HTTP\Request('GET', '//file1');
		$response = $this->request($request);

		$this->assertSame(200, $response->getStatus());

		// Removing Last-Modified because it keeps changing.
		$response->removeHeader('Last-Modified');

		$this->assertSame(
			[
				'X-Sabre-Version' => [Version::VERSION],
				'Content-Type'    => ['application/octet-stream'],
				'Content-Length'  => [3],
				'ETag'            => ['"' . md5('foo') . '"'],
			],
			$response->getHeaders()
		);

		$this->assertSame('foo', $response->getBodyAsString());
	}

	public function testGetCollection()
	{
		$request = new HTTP\Request('GET', '/dir');
		$response = $this->request($request);

		$this->assertSame(501, $response->getStatus());
	}

	public function testGetStreaming()
	{
		$request = new HTTP\Request('GET', '/streaming');
		$response = $this->request($request);

		$this->assertSame(200, $response->getStatus());

		// Removing Last-Modified because it keeps changing.
		$response->removeHeader('Last-Modified');

		$this->assertSame(
			[
				'X-Sabre-Version' => [Version::VERSION],
				'Content-Type'    => ['application/octet-stream'],
			],
			$response->getHeaders()
		);

		$this->assertSame('stream', $response->getBodyAsString());
	}
}
