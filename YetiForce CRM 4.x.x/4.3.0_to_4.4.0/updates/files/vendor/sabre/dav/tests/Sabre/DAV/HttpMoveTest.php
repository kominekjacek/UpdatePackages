<?php

namespace Sabre\DAV;

use Sabre\DAVServerTest;
use Sabre\HTTP;

/**
 * Tests related to the MOVE request.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class HttpMoveTest extends DAVServerTest
{
	/**
	 * Sets up the DAV tree.
	 */
	public function setUpTree()
	{
		$this->tree = new Mock\Collection('root', [
			'file1' => 'content1',
			'file2' => 'content2',
		]);
	}

	public function testMoveToSelf()
	{
		$request = new HTTP\Request('MOVE', '/file1', [
			'Destination' => '/file1'
		]);
		$response = $this->request($request);
		$this->assertSame(403, $response->getStatus());
		$this->assertSame('content1', $this->tree->getChild('file1')->get());
	}

	public function testMove()
	{
		$request = new HTTP\Request('MOVE', '/file1', [
			'Destination' => '/file3'
		]);
		$response = $this->request($request);
		$this->assertSame(201, $response->getStatus(), print_r($response, true));
		$this->assertSame('content1', $this->tree->getChild('file3')->get());
		$this->assertFalse($this->tree->childExists('file1'));
	}

	public function testMoveToExisting()
	{
		$request = new HTTP\Request('MOVE', '/file1', [
			'Destination' => '/file2'
		]);
		$response = $this->request($request);
		$this->assertSame(204, $response->getStatus(), print_r($response, true));
		$this->assertSame('content1', $this->tree->getChild('file2')->get());
		$this->assertFalse($this->tree->childExists('file1'));
	}

	public function testMoveToExistingOverwriteT()
	{
		$request = new HTTP\Request('MOVE', '/file1', [
			'Destination' => '/file2',
			'Overwrite'   => 'T',
		]);
		$response = $this->request($request);
		$this->assertSame(204, $response->getStatus(), print_r($response, true));
		$this->assertSame('content1', $this->tree->getChild('file2')->get());
		$this->assertFalse($this->tree->childExists('file1'));
	}

	public function testMoveToExistingOverwriteF()
	{
		$request = new HTTP\Request('MOVE', '/file1', [
			'Destination' => '/file2',
			'Overwrite'   => 'F',
		]);
		$response = $this->request($request);
		$this->assertSame(412, $response->getStatus(), print_r($response, true));
		$this->assertSame('content1', $this->tree->getChild('file1')->get());
		$this->assertSame('content2', $this->tree->getChild('file2')->get());
		$this->assertTrue($this->tree->childExists('file1'));
		$this->assertTrue($this->tree->childExists('file2'));
	}

	/**
	 * If we MOVE to an existing file, but a plugin prevents the original from
	 * being deleted, we need to make sure that the server does not delete
	 * the destination.
	 */
	public function testMoveToExistingBlockedDeleteSource()
	{
		$this->server->on('beforeUnbind', function ($path) {
			if ($path === 'file1') {
				throw new \Sabre\DAV\Exception\Forbidden('uh oh');
			}
		});
		$request = new HTTP\Request('MOVE', '/file1', [
			'Destination' => '/file2'
		]);
		$response = $this->request($request);
		$this->assertSame(403, $response->getStatus(), print_r($response, true));
		$this->assertSame('content1', $this->tree->getChild('file1')->get());
		$this->assertSame('content2', $this->tree->getChild('file2')->get());
		$this->assertTrue($this->tree->childExists('file1'));
		$this->assertTrue($this->tree->childExists('file2'));
	}
}
