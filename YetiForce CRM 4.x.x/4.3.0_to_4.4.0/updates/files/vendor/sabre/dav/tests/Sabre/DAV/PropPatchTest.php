<?php

namespace Sabre\DAV;

class PropPatchTest extends \PHPUnit_Framework_TestCase
{
	protected $propPatch;

	public function setUp()
	{
		$this->propPatch = new PropPatch([
			'{DAV:}displayname' => 'foo',
		]);
		$this->assertSame(['{DAV:}displayname' => 'foo'], $this->propPatch->getMutations());
	}

	public function testHandleSingleSuccess()
	{
		$hasRan = false;

		$this->propPatch->handle('{DAV:}displayname', function ($value) use (&$hasRan) {
			$hasRan = true;
			$this->assertSame('foo', $value);
			return true;
		});

		$this->assertTrue($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 200], $result);

		$this->assertTrue($hasRan);
	}

	public function testHandleSingleFail()
	{
		$hasRan = false;

		$this->propPatch->handle('{DAV:}displayname', function ($value) use (&$hasRan) {
			$hasRan = true;
			$this->assertSame('foo', $value);
			return false;
		});

		$this->assertFalse($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 403], $result);

		$this->assertTrue($hasRan);
	}

	public function testHandleSingleCustomResult()
	{
		$hasRan = false;

		$this->propPatch->handle('{DAV:}displayname', function ($value) use (&$hasRan) {
			$hasRan = true;
			$this->assertSame('foo', $value);
			return 201;
		});

		$this->assertTrue($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 201], $result);

		$this->assertTrue($hasRan);
	}

	public function testHandleSingleDeleteSuccess()
	{
		$hasRan = false;

		$this->propPatch = new PropPatch(['{DAV:}displayname' => null]);
		$this->propPatch->handle('{DAV:}displayname', function ($value) use (&$hasRan) {
			$hasRan = true;
			$this->assertNull($value);
			return true;
		});

		$this->assertTrue($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 204], $result);

		$this->assertTrue($hasRan);
	}

	public function testHandleNothing()
	{
		$hasRan = false;

		$this->propPatch->handle('{DAV:}foobar', function ($value) use (&$hasRan) {
			$hasRan = true;
		});

		$this->assertFalse($hasRan);
	}

	/**
	 * @depends testHandleSingleSuccess
	 */
	public function testHandleRemaining()
	{
		$hasRan = false;

		$this->propPatch->handleRemaining(function ($mutations) use (&$hasRan) {
			$hasRan = true;
			$this->assertSame(['{DAV:}displayname' => 'foo'], $mutations);
			return true;
		});

		$this->assertTrue($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 200], $result);

		$this->assertTrue($hasRan);
	}

	public function testHandleRemainingNothingToDo()
	{
		$hasRan = false;

		$this->propPatch->handle('{DAV:}displayname', function () {
		});
		$this->propPatch->handleRemaining(function ($mutations) use (&$hasRan) {
			$hasRan = true;
		});

		$this->assertFalse($hasRan);
	}

	public function testSetResultCode()
	{
		$this->propPatch->setResultCode('{DAV:}displayname', 201);
		$this->assertTrue($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 201], $result);
	}

	public function testSetResultCodeFail()
	{
		$this->propPatch->setResultCode('{DAV:}displayname', 402);
		$this->assertFalse($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 402], $result);
	}

	public function testSetRemainingResultCode()
	{
		$this->propPatch->setRemainingResultCode(204);
		$this->assertTrue($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 204], $result);
	}

	public function testCommitNoHandler()
	{
		$this->assertFalse($this->propPatch->commit());
		$result = $this->propPatch->getResult();
		$this->assertSame(['{DAV:}displayname' => 403], $result);
	}

	public function testHandlerNotCalled()
	{
		$hasRan = false;

		$this->propPatch->setResultCode('{DAV:}displayname', 402);
		$this->propPatch->handle('{DAV:}displayname', function ($value) use (&$hasRan) {
			$hasRan = true;
		});

		$this->propPatch->commit();

		// The handler is not supposed to have ran
		$this->assertFalse($hasRan);
	}

	public function testDependencyFail()
	{
		$propPatch = new PropPatch([
			'{DAV:}a' => 'foo',
			'{DAV:}b' => 'bar',
		]);

		$calledA = false;
		$calledB = false;

		$propPatch->handle('{DAV:}a', function () use (&$calledA) {
			$calledA = true;
			return false;
		});
		$propPatch->handle('{DAV:}b', function () use (&$calledB) {
			$calledB = true;
			return false;
		});

		$result = $propPatch->commit();
		$this->assertTrue($calledA);
		$this->assertFalse($calledB);

		$this->assertFalse($result);

		$this->assertSame([
			'{DAV:}a' => 403,
			'{DAV:}b' => 424,
		], $propPatch->getResult());
	}

	/**
	 * @expectedException \UnexpectedValueException
	 */
	public function testHandleSingleBrokenResult()
	{
		$propPatch = new PropPatch([
			'{DAV:}a' => 'foo',
		]);

		$propPatch->handle('{DAV:}a', function () {
			return [];
		});
		$propPatch->commit();
	}

	public function testHandleMultiValueSuccess()
	{
		$propPatch = new PropPatch([
			'{DAV:}a' => 'foo',
			'{DAV:}b' => 'bar',
			'{DAV:}c' => null,
		]);

		$calledA = false;

		$propPatch->handle(['{DAV:}a', '{DAV:}b', '{DAV:}c'], function ($properties) use (&$calledA) {
			$calledA = true;
			$this->assertSame([
				'{DAV:}a' => 'foo',
				'{DAV:}b' => 'bar',
				'{DAV:}c' => null,
			], $properties);
			return true;
		});
		$result = $propPatch->commit();
		$this->assertTrue($calledA);
		$this->assertTrue($result);

		$this->assertSame([
			'{DAV:}a' => 200,
			'{DAV:}b' => 200,
			'{DAV:}c' => 204,
		], $propPatch->getResult());
	}

	public function testHandleMultiValueFail()
	{
		$propPatch = new PropPatch([
			'{DAV:}a' => 'foo',
			'{DAV:}b' => 'bar',
			'{DAV:}c' => null,
		]);

		$calledA = false;

		$propPatch->handle(['{DAV:}a', '{DAV:}b', '{DAV:}c'], function ($properties) use (&$calledA) {
			$calledA = true;
			$this->assertSame([
				'{DAV:}a' => 'foo',
				'{DAV:}b' => 'bar',
				'{DAV:}c' => null,
			], $properties);
			return false;
		});
		$result = $propPatch->commit();
		$this->assertTrue($calledA);
		$this->assertFalse($result);

		$this->assertSame([
			'{DAV:}a' => 403,
			'{DAV:}b' => 403,
			'{DAV:}c' => 403,
		], $propPatch->getResult());
	}

	public function testHandleMultiValueCustomResult()
	{
		$propPatch = new PropPatch([
			'{DAV:}a' => 'foo',
			'{DAV:}b' => 'bar',
			'{DAV:}c' => null,
		]);

		$calledA = false;

		$propPatch->handle(['{DAV:}a', '{DAV:}b', '{DAV:}c'], function ($properties) use (&$calledA) {
			$calledA = true;
			$this->assertSame([
				'{DAV:}a' => 'foo',
				'{DAV:}b' => 'bar',
				'{DAV:}c' => null,
			], $properties);

			return [
				'{DAV:}a' => 201,
				'{DAV:}b' => 204,
			];
		});
		$result = $propPatch->commit();
		$this->assertTrue($calledA);
		$this->assertFalse($result);

		$this->assertSame([
			'{DAV:}a' => 201,
			'{DAV:}b' => 204,
			'{DAV:}c' => 500,
		], $propPatch->getResult());
	}

	/**
	 * @expectedException \UnexpectedValueException
	 */
	public function testHandleMultiValueBroken()
	{
		$propPatch = new PropPatch([
			'{DAV:}a' => 'foo',
			'{DAV:}b' => 'bar',
			'{DAV:}c' => null,
		]);

		$propPatch->handle(['{DAV:}a', '{DAV:}b', '{DAV:}c'], function ($properties) {
			return 'hi';
		});
		$propPatch->commit();
	}
}
