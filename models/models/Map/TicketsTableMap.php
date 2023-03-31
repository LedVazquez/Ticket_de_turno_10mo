<?php

namespace models\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use models\Tickets;
use models\TicketsQuery;


/**
 * This class defines the structure of the 'tickets' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class TicketsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'models.Map.TicketsTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'tickets';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Tickets';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\models\\Tickets';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'models.Tickets';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id_ticket field
     */
    public const COL_ID_TICKET = 'tickets.id_ticket';

    /**
     * the column name for the nom_completo field
     */
    public const COL_NOM_COMPLETO = 'tickets.nom_completo';

    /**
     * the column name for the curp field
     */
    public const COL_CURP = 'tickets.curp';

    /**
     * the column name for the nombres field
     */
    public const COL_NOMBRES = 'tickets.nombres';

    /**
     * the column name for the paterno field
     */
    public const COL_PATERNO = 'tickets.paterno';

    /**
     * the column name for the materno field
     */
    public const COL_MATERNO = 'tickets.materno';

    /**
     * the column name for the telefono field
     */
    public const COL_TELEFONO = 'tickets.telefono';

    /**
     * the column name for the celular field
     */
    public const COL_CELULAR = 'tickets.celular';

    /**
     * the column name for the email field
     */
    public const COL_EMAIL = 'tickets.email';

    /**
     * the column name for the nivel field
     */
    public const COL_NIVEL = 'tickets.nivel';

    /**
     * the column name for the estatus field
     */
    public const COL_ESTATUS = 'tickets.estatus';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['IdTicket', 'NomCompleto', 'Curp', 'Nombres', 'Paterno', 'Materno', 'Telefono', 'Celular', 'Email', 'Nivel', 'Estatus', ],
        self::TYPE_CAMELNAME     => ['idTicket', 'nomCompleto', 'curp', 'nombres', 'paterno', 'materno', 'telefono', 'celular', 'email', 'nivel', 'estatus', ],
        self::TYPE_COLNAME       => [TicketsTableMap::COL_ID_TICKET, TicketsTableMap::COL_NOM_COMPLETO, TicketsTableMap::COL_CURP, TicketsTableMap::COL_NOMBRES, TicketsTableMap::COL_PATERNO, TicketsTableMap::COL_MATERNO, TicketsTableMap::COL_TELEFONO, TicketsTableMap::COL_CELULAR, TicketsTableMap::COL_EMAIL, TicketsTableMap::COL_NIVEL, TicketsTableMap::COL_ESTATUS, ],
        self::TYPE_FIELDNAME     => ['id_ticket', 'nom_completo', 'curp', 'nombres', 'paterno', 'materno', 'telefono', 'celular', 'email', 'nivel', 'estatus', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['IdTicket' => 0, 'NomCompleto' => 1, 'Curp' => 2, 'Nombres' => 3, 'Paterno' => 4, 'Materno' => 5, 'Telefono' => 6, 'Celular' => 7, 'Email' => 8, 'Nivel' => 9, 'Estatus' => 10, ],
        self::TYPE_CAMELNAME     => ['idTicket' => 0, 'nomCompleto' => 1, 'curp' => 2, 'nombres' => 3, 'paterno' => 4, 'materno' => 5, 'telefono' => 6, 'celular' => 7, 'email' => 8, 'nivel' => 9, 'estatus' => 10, ],
        self::TYPE_COLNAME       => [TicketsTableMap::COL_ID_TICKET => 0, TicketsTableMap::COL_NOM_COMPLETO => 1, TicketsTableMap::COL_CURP => 2, TicketsTableMap::COL_NOMBRES => 3, TicketsTableMap::COL_PATERNO => 4, TicketsTableMap::COL_MATERNO => 5, TicketsTableMap::COL_TELEFONO => 6, TicketsTableMap::COL_CELULAR => 7, TicketsTableMap::COL_EMAIL => 8, TicketsTableMap::COL_NIVEL => 9, TicketsTableMap::COL_ESTATUS => 10, ],
        self::TYPE_FIELDNAME     => ['id_ticket' => 0, 'nom_completo' => 1, 'curp' => 2, 'nombres' => 3, 'paterno' => 4, 'materno' => 5, 'telefono' => 6, 'celular' => 7, 'email' => 8, 'nivel' => 9, 'estatus' => 10, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'IdTicket' => 'ID_TICKET',
        'Tickets.IdTicket' => 'ID_TICKET',
        'idTicket' => 'ID_TICKET',
        'tickets.idTicket' => 'ID_TICKET',
        'TicketsTableMap::COL_ID_TICKET' => 'ID_TICKET',
        'COL_ID_TICKET' => 'ID_TICKET',
        'id_ticket' => 'ID_TICKET',
        'tickets.id_ticket' => 'ID_TICKET',
        'NomCompleto' => 'NOM_COMPLETO',
        'Tickets.NomCompleto' => 'NOM_COMPLETO',
        'nomCompleto' => 'NOM_COMPLETO',
        'tickets.nomCompleto' => 'NOM_COMPLETO',
        'TicketsTableMap::COL_NOM_COMPLETO' => 'NOM_COMPLETO',
        'COL_NOM_COMPLETO' => 'NOM_COMPLETO',
        'nom_completo' => 'NOM_COMPLETO',
        'tickets.nom_completo' => 'NOM_COMPLETO',
        'Curp' => 'CURP',
        'Tickets.Curp' => 'CURP',
        'curp' => 'CURP',
        'tickets.curp' => 'CURP',
        'TicketsTableMap::COL_CURP' => 'CURP',
        'COL_CURP' => 'CURP',
        'Nombres' => 'NOMBRES',
        'Tickets.Nombres' => 'NOMBRES',
        'nombres' => 'NOMBRES',
        'tickets.nombres' => 'NOMBRES',
        'TicketsTableMap::COL_NOMBRES' => 'NOMBRES',
        'COL_NOMBRES' => 'NOMBRES',
        'Paterno' => 'PATERNO',
        'Tickets.Paterno' => 'PATERNO',
        'paterno' => 'PATERNO',
        'tickets.paterno' => 'PATERNO',
        'TicketsTableMap::COL_PATERNO' => 'PATERNO',
        'COL_PATERNO' => 'PATERNO',
        'Materno' => 'MATERNO',
        'Tickets.Materno' => 'MATERNO',
        'materno' => 'MATERNO',
        'tickets.materno' => 'MATERNO',
        'TicketsTableMap::COL_MATERNO' => 'MATERNO',
        'COL_MATERNO' => 'MATERNO',
        'Telefono' => 'TELEFONO',
        'Tickets.Telefono' => 'TELEFONO',
        'telefono' => 'TELEFONO',
        'tickets.telefono' => 'TELEFONO',
        'TicketsTableMap::COL_TELEFONO' => 'TELEFONO',
        'COL_TELEFONO' => 'TELEFONO',
        'Celular' => 'CELULAR',
        'Tickets.Celular' => 'CELULAR',
        'celular' => 'CELULAR',
        'tickets.celular' => 'CELULAR',
        'TicketsTableMap::COL_CELULAR' => 'CELULAR',
        'COL_CELULAR' => 'CELULAR',
        'Email' => 'EMAIL',
        'Tickets.Email' => 'EMAIL',
        'email' => 'EMAIL',
        'tickets.email' => 'EMAIL',
        'TicketsTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'Nivel' => 'NIVEL',
        'Tickets.Nivel' => 'NIVEL',
        'nivel' => 'NIVEL',
        'tickets.nivel' => 'NIVEL',
        'TicketsTableMap::COL_NIVEL' => 'NIVEL',
        'COL_NIVEL' => 'NIVEL',
        'Estatus' => 'ESTATUS',
        'Tickets.Estatus' => 'ESTATUS',
        'estatus' => 'ESTATUS',
        'tickets.estatus' => 'ESTATUS',
        'TicketsTableMap::COL_ESTATUS' => 'ESTATUS',
        'COL_ESTATUS' => 'ESTATUS',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('tickets');
        $this->setPhpName('Tickets');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\models\\Tickets');
        $this->setPackage('models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_ticket', 'IdTicket', 'INTEGER', true, null, null);
        $this->addColumn('nom_completo', 'NomCompleto', 'VARCHAR', true, 200, null);
        $this->addColumn('curp', 'Curp', 'VARCHAR', true, 200, null);
        $this->addColumn('nombres', 'Nombres', 'VARCHAR', true, 200, null);
        $this->addColumn('paterno', 'Paterno', 'VARCHAR', true, 200, null);
        $this->addColumn('materno', 'Materno', 'VARCHAR', true, 200, null);
        $this->addColumn('telefono', 'Telefono', 'VARCHAR', true, 200, null);
        $this->addColumn('celular', 'Celular', 'VARCHAR', true, 200, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 200, null);
        $this->addColumn('nivel', 'Nivel', 'VARCHAR', true, 200, null);
        $this->addColumn('estatus', 'Estatus', 'INTEGER', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTicket', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTicket', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTicket', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTicket', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTicket', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTicket', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdTicket', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? TicketsTableMap::CLASS_DEFAULT : TicketsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Tickets object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = TicketsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TicketsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TicketsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TicketsTableMap::OM_CLASS;
            /** @var Tickets $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TicketsTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = TicketsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TicketsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tickets $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TicketsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(TicketsTableMap::COL_ID_TICKET);
            $criteria->addSelectColumn(TicketsTableMap::COL_NOM_COMPLETO);
            $criteria->addSelectColumn(TicketsTableMap::COL_CURP);
            $criteria->addSelectColumn(TicketsTableMap::COL_NOMBRES);
            $criteria->addSelectColumn(TicketsTableMap::COL_PATERNO);
            $criteria->addSelectColumn(TicketsTableMap::COL_MATERNO);
            $criteria->addSelectColumn(TicketsTableMap::COL_TELEFONO);
            $criteria->addSelectColumn(TicketsTableMap::COL_CELULAR);
            $criteria->addSelectColumn(TicketsTableMap::COL_EMAIL);
            $criteria->addSelectColumn(TicketsTableMap::COL_NIVEL);
            $criteria->addSelectColumn(TicketsTableMap::COL_ESTATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id_ticket');
            $criteria->addSelectColumn($alias . '.nom_completo');
            $criteria->addSelectColumn($alias . '.curp');
            $criteria->addSelectColumn($alias . '.nombres');
            $criteria->addSelectColumn($alias . '.paterno');
            $criteria->addSelectColumn($alias . '.materno');
            $criteria->addSelectColumn($alias . '.telefono');
            $criteria->addSelectColumn($alias . '.celular');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.nivel');
            $criteria->addSelectColumn($alias . '.estatus');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(TicketsTableMap::COL_ID_TICKET);
            $criteria->removeSelectColumn(TicketsTableMap::COL_NOM_COMPLETO);
            $criteria->removeSelectColumn(TicketsTableMap::COL_CURP);
            $criteria->removeSelectColumn(TicketsTableMap::COL_NOMBRES);
            $criteria->removeSelectColumn(TicketsTableMap::COL_PATERNO);
            $criteria->removeSelectColumn(TicketsTableMap::COL_MATERNO);
            $criteria->removeSelectColumn(TicketsTableMap::COL_TELEFONO);
            $criteria->removeSelectColumn(TicketsTableMap::COL_CELULAR);
            $criteria->removeSelectColumn(TicketsTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(TicketsTableMap::COL_NIVEL);
            $criteria->removeSelectColumn(TicketsTableMap::COL_ESTATUS);
        } else {
            $criteria->removeSelectColumn($alias . '.id_ticket');
            $criteria->removeSelectColumn($alias . '.nom_completo');
            $criteria->removeSelectColumn($alias . '.curp');
            $criteria->removeSelectColumn($alias . '.nombres');
            $criteria->removeSelectColumn($alias . '.paterno');
            $criteria->removeSelectColumn($alias . '.materno');
            $criteria->removeSelectColumn($alias . '.telefono');
            $criteria->removeSelectColumn($alias . '.celular');
            $criteria->removeSelectColumn($alias . '.email');
            $criteria->removeSelectColumn($alias . '.nivel');
            $criteria->removeSelectColumn($alias . '.estatus');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(TicketsTableMap::DATABASE_NAME)->getTable(TicketsTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Tickets or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Tickets object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TicketsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \models\Tickets) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TicketsTableMap::DATABASE_NAME);
            $criteria->add(TicketsTableMap::COL_ID_TICKET, (array) $values, Criteria::IN);
        }

        $query = TicketsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TicketsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TicketsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tickets table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return TicketsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tickets or Criteria object.
     *
     * @param mixed $criteria Criteria or Tickets object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TicketsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tickets object
        }

        if ($criteria->containsKey(TicketsTableMap::COL_ID_TICKET) && $criteria->keyContainsValue(TicketsTableMap::COL_ID_TICKET) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TicketsTableMap::COL_ID_TICKET.')');
        }


        // Set the correct dbName
        $query = TicketsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
