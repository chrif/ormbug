<?php declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Platforms\Keywords\MariaDb102Keywords;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Types\Types;

/**
 * Copied from final {@see \Doctrine\DBAL\Platforms\MariaDb1027Platform} and added supportsRowNumberFunction
 */
final class Platform extends MySqlPlatform {
	/**
	 * {@inheritdoc}
	 *
	 * @link https://mariadb.com/kb/en/library/json-data-type/
	 */
	public function getJsonTypeDeclarationSQL(array $field): string {
		return 'LONGTEXT';
	}

	/**
	 * https://mariadb.com/kb/en/row_number/
	 *
	 * @return bool
	 */
	public function supportsRowNumberFunction(): bool {
		return true;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getReservedKeywordsClass(): string {
		return MariaDb102Keywords::class;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function initializeDoctrineTypeMappings(): void {
		parent::initializeDoctrineTypeMappings();

		$this->doctrineTypeMapping['json'] = Types::JSON;
	}
}
