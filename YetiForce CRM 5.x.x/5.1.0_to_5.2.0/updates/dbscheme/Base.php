<?php

namespace Importers;

/**
 * Class that imports base database.
 *
 * @copyright YetiForce Sp. z o.o.
 * @license   YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author    Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class Base extends \App\Db\Importers\Base
{
	public $dbType = 'base';

	public function scheme()
	{
		$this->tables = [
			'roundcube_users_autologin' => [
				'columns' => [
					'active' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0),
				],
				'columns_mysql' => [
					'active' => $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0),
				],
				'engine' => 'InnoDB',
				'charset' => 'utf8'
			],
			'u_#__pdf_inv_scheme' => [
				'columns' => [
					'crmid' => $this->integer(10)->notNull(),
					'columns' => $this->text(),
				],
				'index' => [
					['crmid', 'crmid'],
				],
				'engine' => 'InnoDB',
				'charset' => 'utf8'
			],
			'u_#__servicecontracts_sla_policy' => [
				'columns' => [
					'id' => $this->integer()->primaryKey()->notNull(),
					'crmid' => $this->integer()->notNull(),
					'policy_type' => $this->smallInteger(1)->notNull()->defaultValue(0),
					'sla_policy_id' => $this->integer(),
					'tabid' => $this->smallInteger(5)->notNull(),
					'conditions' => $this->text()->notNull(),
					'reaction_time' => $this->stringType(20)->notNull()->defaultValue('0:H'),
					'idle_time' => $this->stringType(20)->notNull()->defaultValue('0:H'),
					'resolve_time' => $this->stringType(20)->notNull()->defaultValue('0:H'),
					'business_hours' => $this->text()->notNull(),
				],
				'columns_mysql' => [
					'policy_type' => $this->tinyInteger(1)->notNull()->defaultValue(0),
				],
				'index' => [
					['fk_crmid_idx', 'crmid'],
					['fk_sla_policy_idx', 'sla_policy_id'],
				],
				'engine' => 'InnoDB',
				'charset' => 'utf8'
			],
			'vtiger_faq' => [
				'columns' => [
					'subject' => $this->stringType()->defaultValue(''),
					'content' => $this->text(),
					'category' => $this->stringType(30)->defaultValue(''),
					'featured' => $this->smallInteger(1)->defaultValue(0),
					'introduction' => $this->text(),
					'knowledgebase_view' => $this->stringType()->defaultValue(''),
					'accountid' => $this->integer()->unsigned()->defaultValue(0),
				],
				'columns_mysql' => [
					'featured' => $this->tinyInteger(1)->defaultValue(0),
				],
				'index' => [
					['vtiger_faq_accountid_idx', 'accountid'],
					['search', ['subject', 'content', 'introduction']],
				],
				'engine' => 'InnoDB',
				'charset' => 'utf8'
			],
		];
		$this->foreignKey = [
			['fk_u_#__pdf_inv_scheme_crmid', 'u_#__pdf_inv_scheme', 'crmid', 'vtiger_crmentity', 'crmid', 'CASCADE', 'RESTRICT'],
			['fk_crmid_idx', 'u_#__servicecontracts_sla_policy', 'crmid', 'vtiger_crmentity', 'crmid', 'CASCADE', 'RESTRICT'],
			['fk_sla_policy_idx', 'u_#__servicecontracts_sla_policy', 'sla_policy_id', 's_#__sla_policy', 'id', 'CASCADE', 'RESTRICT']
		];
	}
}
