<?php

namespace models\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use models\Turnos;
use models\TurnosQuery;


/**
 * This class defines the structure of the 'turnos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class TurnosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'models.Map.TurnosTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'turnos';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Turnos';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\models\\Turnos';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'models.Turnos';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the id_municipio field
     */
    public const COL_ID_MUNICIPIO = 'turnos.id_municipio';

    /**
     * the column name for the id_ticket field
     */
    public const COL_ID_TICKET = 'turnos.id_ticket';

    /**
     * the column name for the numero field
     */
    public const COL_NUMERO = 'turnos.numero';

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
        self::TYPE_PHPNAME       => ['IdMunicipio', 'IdTicket', 'Numero', ],
        self::TYPE_CAMELNAME     => ['idMunicipio', 'idTicket', 'numero', ],
        self::TYPE_COLNAME       => [TurnosTableMap::COL_ID_MUNICIPIO, TurnosTableMap::COL_ID_TICKET, TurnosTableMap::COL_NUMERO, ],
        self::TYPE_FIELDNAME     => ['id_municipio', 'id_ticket', 'numero', ],
        self::TYPE_NUM           => [0, 1, 2, ]
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
        self::TYPE_PHPNAME       => ['IdMunicipio' => 0, 'IdTicket' => 1, 'Numero' => 2, ],
        self::TYPE_CAMELNAME     => ['idMunicipio' => 0, 'idTicket' => 1, 'numero' => 2, ],
        self::TYPE_COLNAME       => [TurnosTableMap::COL_ID_MUNICIPIO => 0, TurnosTableMap::COL_ID_TICKET => 1, TurnosTableMap::COL_NUMERO => 2, ],
        self::TYPE_FIELDNAME     => ['id_municipio' => 0, 'id_ticket' => 1, 'numero' => 2, ],
        self::TYPE_NUM           => [0, 1, 2, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'IdMunicipio' => 'ID_MUNICIPIO',
        'Turnos.IdMunicipio' => 'ID_MUNICIPIO',
        'idMunicipio' => 'ID_MUNICIPIO',
        'turnos.idMunicipio' => 'ID_MUNICIPIO',
        'TurnosTableMap::COL_ID_MUNICIPIO' => 'ID_MUNICIPIO',
        'COL_ID_MUNICIPIO' => 'ID_MUNICIPIO',
        'id_municipio' => 'ID_MUNICIPIO',
        'turnos.id_municipio' => 'ID_MUNICIPIO',
        'IdTicket' => 'ID_TICKET',
        'Turnos.IdTicket' => 'ID_TICKET',
        'idTicket' => 'ID_TICKET',
        'turnos.idTicket' => 'ID_TICKET',
        'TurnosTableMap::COL_ID_TICKET' => 'ID_TICKET',
        'COL_ID_TICKET' => 'ID_TICKET',
        'id_ticket' => 'ID_TICKET',
        'turnos.id_ticket' => 'ID_TICKET',
        'Numero' => 'NUMERO',
        'Turnos.Numero' => 'NUMERO',
        'numero' => 'NUMERO',
        'turnos.numero' => 'NUMERO',
        'TurnosTableMap::COL_NUMERO' => 'NUMERO',
        'COL_NUMERO' => 'NUMERO',
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
        $this->setName('turnos');
        $this->setPhpName('Turnos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\models\\Turnos');
        $this->setPackage('models');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('id_municipio', 'IdMunicipio', 'INTEGER', true, null, null);
        $this->addColumn('id_ticket', 'IdTicket', 'INTEGER', true, null, null);
        $this->addColumn('numero', 'Numero', 'INTEGER', true, null, null);
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
        return null;
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
        return '';
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
        return $withPrefix ? TurnosTableMap::CLASS_DEFAULT : TurnosTableMap::OM_CLASS;
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
     * @return array (Turnos object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = TurnosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TurnosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TurnosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TurnosTableMap::OM_CLASS;
            /** @var Turnos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TurnosTableMap::addInstanceToPool($obj, $key);
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
            $key = TurnosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TurnosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Turnos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TurnosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TurnosTableMap::COL_ID_MUNICIPIO);
            $criteria->addSelectColumn(TurnosTableMap::COL_ID_TICKET);
            $criteria->addSelectColumn(TurnosTableMap::COL_NUMERO);
        } else {
            $criteria->addSelectColumn($alias . '.id_municipio');
            $criteria->addSelectColumn($alias . '.id_ticket');
            $criteria->addSelectColumn($alias . '.numero');
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
            $criteria->removeSelectColumn(TurnosTableMap::COL_ID_MUNICIPIO);
            $criteria->removeSelectColumn(TurnosTableMap::COL_ID_TICKET);
            $criteria->removeSelectColumn(TurnosTableMap::COL_NUMERO);
        } else {
            $criteria->removeSelectColumn($alias . '.id_municipio');
            $criteria->removeSelectColumn($alias . '.id_ticket');
            $criteria->removeSelectColumn($alias . '.numero');
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
        return Propel::getServiceContainer()->getDatabaseMap(TurnosTableMap::DATABASE_NAME)->getTable(TurnosTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Turnos or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Turnos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TurnosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \models\Turnos) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Turnos object has no primary key');
        }

        $query = TurnosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TurnosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TurnosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the turnos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return TurnosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Turnos or Criteria object.
     *
     * @param mixed $criteria Criteria or Turnos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TurnosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Turnos object
        }


        // Set the correct dbName
        $query = TurnosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
