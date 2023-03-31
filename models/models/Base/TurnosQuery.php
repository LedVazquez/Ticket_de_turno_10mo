<?php

namespace models\Base;

use \Exception;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use models\Turnos as ChildTurnos;
use models\TurnosQuery as ChildTurnosQuery;
use models\Map\TurnosTableMap;

/**
 * Base class that represents a query for the `turnos` table.
 *
 * @method     ChildTurnosQuery orderByIdMunicipio($order = Criteria::ASC) Order by the id_municipio column
 * @method     ChildTurnosQuery orderByIdTicket($order = Criteria::ASC) Order by the id_ticket column
 * @method     ChildTurnosQuery orderByNumero($order = Criteria::ASC) Order by the numero column
 *
 * @method     ChildTurnosQuery groupByIdMunicipio() Group by the id_municipio column
 * @method     ChildTurnosQuery groupByIdTicket() Group by the id_ticket column
 * @method     ChildTurnosQuery groupByNumero() Group by the numero column
 *
 * @method     ChildTurnosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTurnosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTurnosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTurnosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTurnosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTurnosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTurnos|null findOne(?ConnectionInterface $con = null) Return the first ChildTurnos matching the query
 * @method     ChildTurnos findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildTurnos matching the query, or a new ChildTurnos object populated from the query conditions when no match is found
 *
 * @method     ChildTurnos|null findOneByIdMunicipio(int $id_municipio) Return the first ChildTurnos filtered by the id_municipio column
 * @method     ChildTurnos|null findOneByIdTicket(int $id_ticket) Return the first ChildTurnos filtered by the id_ticket column
 * @method     ChildTurnos|null findOneByNumero(int $numero) Return the first ChildTurnos filtered by the numero column
 *
 * @method     ChildTurnos requirePk($key, ?ConnectionInterface $con = null) Return the ChildTurnos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurnos requireOne(?ConnectionInterface $con = null) Return the first ChildTurnos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTurnos requireOneByIdMunicipio(int $id_municipio) Return the first ChildTurnos filtered by the id_municipio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurnos requireOneByIdTicket(int $id_ticket) Return the first ChildTurnos filtered by the id_ticket column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurnos requireOneByNumero(int $numero) Return the first ChildTurnos filtered by the numero column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTurnos[]|Collection find(?ConnectionInterface $con = null) Return ChildTurnos objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildTurnos> find(?ConnectionInterface $con = null) Return ChildTurnos objects based on current ModelCriteria
 *
 * @method     ChildTurnos[]|Collection findByIdMunicipio(int|array<int> $id_municipio) Return ChildTurnos objects filtered by the id_municipio column
 * @psalm-method Collection&\Traversable<ChildTurnos> findByIdMunicipio(int|array<int> $id_municipio) Return ChildTurnos objects filtered by the id_municipio column
 * @method     ChildTurnos[]|Collection findByIdTicket(int|array<int> $id_ticket) Return ChildTurnos objects filtered by the id_ticket column
 * @psalm-method Collection&\Traversable<ChildTurnos> findByIdTicket(int|array<int> $id_ticket) Return ChildTurnos objects filtered by the id_ticket column
 * @method     ChildTurnos[]|Collection findByNumero(int|array<int> $numero) Return ChildTurnos objects filtered by the numero column
 * @psalm-method Collection&\Traversable<ChildTurnos> findByNumero(int|array<int> $numero) Return ChildTurnos objects filtered by the numero column
 *
 * @method     ChildTurnos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildTurnos> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class TurnosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \models\Base\TurnosQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\models\\Turnos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTurnosQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTurnosQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildTurnosQuery) {
            return $criteria;
        }
        $query = new ChildTurnosQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTurnos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        throw new LogicException('The Turnos object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        throw new LogicException('The Turnos object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Turnos object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Turnos object has no primary key');
    }

    /**
     * Filter the query on the id_municipio column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMunicipio(1234); // WHERE id_municipio = 1234
     * $query->filterByIdMunicipio(array(12, 34)); // WHERE id_municipio IN (12, 34)
     * $query->filterByIdMunicipio(array('min' => 12)); // WHERE id_municipio > 12
     * </code>
     *
     * @param mixed $idMunicipio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdMunicipio($idMunicipio = null, ?string $comparison = null)
    {
        if (is_array($idMunicipio)) {
            $useMinMax = false;
            if (isset($idMunicipio['min'])) {
                $this->addUsingAlias(TurnosTableMap::COL_ID_MUNICIPIO, $idMunicipio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMunicipio['max'])) {
                $this->addUsingAlias(TurnosTableMap::COL_ID_MUNICIPIO, $idMunicipio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TurnosTableMap::COL_ID_MUNICIPIO, $idMunicipio, $comparison);

        return $this;
    }

    /**
     * Filter the query on the id_ticket column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTicket(1234); // WHERE id_ticket = 1234
     * $query->filterByIdTicket(array(12, 34)); // WHERE id_ticket IN (12, 34)
     * $query->filterByIdTicket(array('min' => 12)); // WHERE id_ticket > 12
     * </code>
     *
     * @param mixed $idTicket The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdTicket($idTicket = null, ?string $comparison = null)
    {
        if (is_array($idTicket)) {
            $useMinMax = false;
            if (isset($idTicket['min'])) {
                $this->addUsingAlias(TurnosTableMap::COL_ID_TICKET, $idTicket['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTicket['max'])) {
                $this->addUsingAlias(TurnosTableMap::COL_ID_TICKET, $idTicket['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TurnosTableMap::COL_ID_TICKET, $idTicket, $comparison);

        return $this;
    }

    /**
     * Filter the query on the numero column
     *
     * Example usage:
     * <code>
     * $query->filterByNumero(1234); // WHERE numero = 1234
     * $query->filterByNumero(array(12, 34)); // WHERE numero IN (12, 34)
     * $query->filterByNumero(array('min' => 12)); // WHERE numero > 12
     * </code>
     *
     * @param mixed $numero The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNumero($numero = null, ?string $comparison = null)
    {
        if (is_array($numero)) {
            $useMinMax = false;
            if (isset($numero['min'])) {
                $this->addUsingAlias(TurnosTableMap::COL_NUMERO, $numero['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numero['max'])) {
                $this->addUsingAlias(TurnosTableMap::COL_NUMERO, $numero['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TurnosTableMap::COL_NUMERO, $numero, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildTurnos $turnos Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($turnos = null)
    {
        if ($turnos) {
            throw new LogicException('Turnos object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the turnos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TurnosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TurnosTableMap::clearInstancePool();
            TurnosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TurnosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TurnosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TurnosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TurnosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
