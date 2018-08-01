<?php

namespace Sabre\DAVACL;

use Sabre\DAV;
use Sabre\HTTP;

require_once 'Sabre/DAVACL/MockPrincipal.php';
require_once 'Sabre/DAVACL/MockACLNode.php';

class SimplePluginTest extends \PHPUnit_Framework_TestCase
{
	public function testValues()
	{
		$aclPlugin = new Plugin();
		$this->assertSame('acl', $aclPlugin->getPluginName());
		$this->assertSame(
			['access-control', 'calendarserver-principal-property-search'],
			$aclPlugin->getFeatures()
		);

		$this->assertSame(
			[
				'{DAV:}expand-property',
				'{DAV:}principal-match',
				'{DAV:}principal-property-search',
				'{DAV:}principal-search-property-set'
			],
			$aclPlugin->getSupportedReportSet(''));

		$this->assertSame(['ACL'], $aclPlugin->getMethods(''));

		$this->assertSame(
			'acl',
			$aclPlugin->getPluginInfo()['name']
		);
	}

	public function testGetFlatPrivilegeSet()
	{
		$expected = [
			'{DAV:}all' => [
				'privilege'  => '{DAV:}all',
				'abstract'   => false,
				'aggregates' => [
					'{DAV:}read',
					'{DAV:}write',
				],
				'concrete' => '{DAV:}all',
			],
			'{DAV:}read' => [
				'privilege'  => '{DAV:}read',
				'abstract'   => false,
				'aggregates' => [
					'{DAV:}read-acl',
					'{DAV:}read-current-user-privilege-set',
				],
				'concrete' => '{DAV:}read',
			],
			'{DAV:}read-acl' => [
				'privilege'  => '{DAV:}read-acl',
				'abstract'   => false,
				'aggregates' => [],
				'concrete'   => '{DAV:}read-acl',
			],
			'{DAV:}read-current-user-privilege-set' => [
				'privilege'  => '{DAV:}read-current-user-privilege-set',
				'abstract'   => false,
				'aggregates' => [],
				'concrete'   => '{DAV:}read-current-user-privilege-set',
			],
			'{DAV:}write' => [
				'privilege'  => '{DAV:}write',
				'abstract'   => false,
				'aggregates' => [
					'{DAV:}write-properties',
					'{DAV:}write-content',
					'{DAV:}unlock',
					'{DAV:}bind',
					'{DAV:}unbind',
				],
				'concrete' => '{DAV:}write',
			],
			'{DAV:}write-properties' => [
				'privilege'  => '{DAV:}write-properties',
				'abstract'   => false,
				'aggregates' => [],
				'concrete'   => '{DAV:}write-properties',
			],
			'{DAV:}write-content' => [
				'privilege'  => '{DAV:}write-content',
				'abstract'   => false,
				'aggregates' => [],
				'concrete'   => '{DAV:}write-content',
			],
			'{DAV:}unlock' => [
				'privilege'  => '{DAV:}unlock',
				'abstract'   => false,
				'aggregates' => [],
				'concrete'   => '{DAV:}unlock',
			],
			'{DAV:}bind' => [
				'privilege'  => '{DAV:}bind',
				'abstract'   => false,
				'aggregates' => [],
				'concrete'   => '{DAV:}bind',
			],
			'{DAV:}unbind' => [
				'privilege'  => '{DAV:}unbind',
				'abstract'   => false,
				'aggregates' => [],
				'concrete'   => '{DAV:}unbind',
			],
		];

		$plugin = new Plugin();
		$plugin->allowUnauthenticatedAccess = false;
		$server = new DAV\Server();
		$server->addPlugin($plugin);
		$this->assertSame($expected, $plugin->getFlatPrivilegeSet(''));
	}

	public function testCurrentUserPrincipalsNotLoggedIn()
	{
		$acl = new Plugin();
		$acl->allowUnauthenticatedAccess = false;
		$server = new DAV\Server();
		$server->addPlugin($acl);

		$this->assertSame([], $acl->getCurrentUserPrincipals());
	}

	public function testCurrentUserPrincipalsSimple()
	{
		$tree = [
			new DAV\SimpleCollection('principals', [
				new MockPrincipal('admin', 'principals/admin'),
			])
		];

		$acl = new Plugin();
		$acl->allowUnauthenticatedAccess = false;
		$server = new DAV\Server($tree);
		$server->addPlugin($acl);

		$auth = new DAV\Auth\Plugin(new DAV\Auth\Backend\Mock());
		$server->addPlugin($auth);

		//forcing login
		$auth->beforeMethod(new HTTP\Request(), new HTTP\Response());

		$this->assertSame(['principals/admin'], $acl->getCurrentUserPrincipals());
	}

	public function testCurrentUserPrincipalsGroups()
	{
		$tree = [
			new DAV\SimpleCollection('principals', [
				new MockPrincipal('admin', 'principals/admin', ['principals/administrators', 'principals/everyone']),
				new MockPrincipal('administrators', 'principals/administrators', ['principals/groups'], ['principals/admin']),
				new MockPrincipal('everyone', 'principals/everyone', [], ['principals/admin']),
				new MockPrincipal('groups', 'principals/groups', [], ['principals/administrators']),
			])
		];

		$acl = new Plugin();
		$acl->allowUnauthenticatedAccess = false;
		$server = new DAV\Server($tree);
		$server->addPlugin($acl);

		$auth = new DAV\Auth\Plugin(new DAV\Auth\Backend\Mock());
		$server->addPlugin($auth);

		//forcing login
		$auth->beforeMethod(new HTTP\Request(), new HTTP\Response());

		$expected = [
			'principals/admin',
			'principals/administrators',
			'principals/everyone',
			'principals/groups',
		];

		$this->assertSame($expected, $acl->getCurrentUserPrincipals());

		// The second one should trigger the cache and be identical
		$this->assertSame($expected, $acl->getCurrentUserPrincipals());
	}

	public function testGetACL()
	{
		$acl = [
			[
				'principal' => 'principals/admin',
				'privilege' => '{DAV:}read',
			],
			[
				'principal' => 'principals/admin',
				'privilege' => '{DAV:}write',
			],
		];

		$tree = [
			new MockACLNode('foo', $acl),
		];

		$server = new DAV\Server($tree);
		$aclPlugin = new Plugin();
		$aclPlugin->allowUnauthenticatedAccess = false;
		$server->addPlugin($aclPlugin);

		$this->assertSame($acl, $aclPlugin->getACL('foo'));
	}

	public function testGetCurrentUserPrivilegeSet()
	{
		$acl = [
			[
				'principal' => 'principals/admin',
				'privilege' => '{DAV:}read',
			],
			[
				'principal' => 'principals/user1',
				'privilege' => '{DAV:}read',
			],
			[
				'principal' => 'principals/admin',
				'privilege' => '{DAV:}write',
			],
		];

		$tree = [
			new MockACLNode('foo', $acl),

			new DAV\SimpleCollection('principals', [
				new MockPrincipal('admin', 'principals/admin'),
			]),
		];

		$server = new DAV\Server($tree);
		$aclPlugin = new Plugin();
		$aclPlugin->allowUnauthenticatedAccess = false;
		$server->addPlugin($aclPlugin);

		$auth = new DAV\Auth\Plugin(new DAV\Auth\Backend\Mock());
		$server->addPlugin($auth);

		//forcing login
		$auth->beforeMethod(new HTTP\Request(), new HTTP\Response());

		$expected = [
			'{DAV:}write',
			'{DAV:}write-properties',
			'{DAV:}write-content',
			'{DAV:}unlock',
			'{DAV:}write-acl',
			'{DAV:}read',
			'{DAV:}read-acl',
			'{DAV:}read-current-user-privilege-set',
		];

		$this->assertSame($expected, $aclPlugin->getCurrentUserPrivilegeSet('foo'));
	}

	public function testCheckPrivileges()
	{
		$acl = [
			[
				'principal' => 'principals/admin',
				'privilege' => '{DAV:}read',
			],
			[
				'principal' => 'principals/user1',
				'privilege' => '{DAV:}read',
			],
			[
				'principal' => 'principals/admin',
				'privilege' => '{DAV:}write',
			],
		];

		$tree = [
			new MockACLNode('foo', $acl),

			new DAV\SimpleCollection('principals', [
				new MockPrincipal('admin', 'principals/admin'),
			]),
		];

		$server = new DAV\Server($tree);
		$aclPlugin = new Plugin();
		$aclPlugin->allowUnauthenticatedAccess = false;
		$server->addPlugin($aclPlugin);

		$auth = new DAV\Auth\Plugin(new DAV\Auth\Backend\Mock());
		$server->addPlugin($auth);

		//forcing login
		//$auth->beforeMethod('GET','/');

		$this->assertFalse($aclPlugin->checkPrivileges('foo', ['{DAV:}read'], Plugin::R_PARENT, false));
	}
}
