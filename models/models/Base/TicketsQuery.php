<?php

namespace models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use models\Tickets as ChildTickets;
use models\TicketsQuery as ChildTicketsQuery;
use models\Map\TicketsTableMap;

/**
 * Base class that represents a query for the `tickets` table.
 *
 * @method     ChildTicketsQuery orderByIdTicket($order = Criteria::ASC) Order by the id_ticket column
 * @method     ChildTicketsQuery orderByNomCompleto($order = Criteria::ASC) Order by the nom_completo column
 * @method     ChildTicketsQuery orderByCurp($order = Criteria::ASC) Order by the curp column
 * @method     ChildTicketsQuery orderByNombres($order = Criteria::ASC) Order by the nombres column
 * @method     ChildTicketsQuery orderByPaterno($order = Criteria::ASC) Order by the paterno column
 * @method     ChildTicketsQuery orderByMaterno($order = Criteria::ASC) Order by the materno column
 * @method     ChildTicketsQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method     ChildTicketsQuery orderByCelular($order = Criteria::ASC) Order by the celular column
 * @method     ChildTicketsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildTicketsQuery orderByNivel($order = Criteria::ASC) Order by the nivel column
 * @method     ChildTicketsQuery orderByEstatus($order = Criteria::ASC) Order by the estatus column
 *
 * @method     ChildTicketsQuery groupByIdTicket() Group by the id_ticket column
 * @method     ChildTicketsQuery groupByNomCompleto() Group by the nom_completo column
 * @method     ChildTicketsQuery groupByCurp() Group by the curp column
 * @method     ChildTicketsQuery groupByNombres() Group by the nombres column
 * @method     ChildTicketsQuery groupByPaterno() Group by the paterno column
 * @method     ChildTicketsQuery groupByMaterno() Group by the materno column
 * @method     ChildTicketsQuery groupByTelefono() Group by the telefono column
 * @method     ChildTicketsQuery groupByCelular() Group by the celular column
 * @method     ChildTicketsQuery groupByEmail() Group by the email column
 * @method     ChildTicketsQuery groupByNivel() Group by the nivel column
 * @method     ChildTicketsQuery groupByEstatus() Group by the estatus column
 *
 * @method     ChildTicketsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTicketsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTicketsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTicketsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTicketsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTicketsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTickets|null findOne(?ConnectionInterface $con = null) Return the first ChildTickets matching the query
 * @method     ChildTickets findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildTickets matching the query, or a new ChildTickets object populated from the query conditions when no match is found
 *
 * @method     ChildTickets|null findOneByIdTicket(int $id_ticket) Return the first ChildTickets filtered by the id_ticket column
 * @method     ChildTickets|null findOneByNomCompleto(string $nom_completo) Return the first ChildTickets filtered by the nom_completo column
 * @method     ChildTickets|null findOneByCurp(string $curp) Return the first ChildTickets filtered by the curp column
 * @method     ChildTickets|null findOneByNombres(string $nombres) Return the first ChildTickets filtered by the nombres column
 * @method     ChildTickets|null findOneByPaterno(string $paterno) Return the first ChildTickets filtered by the paterno column
 * @method     ChildTickets|null findOneByMaterno(string $materno) Return the first ChildTickets filtered by the materno column
 * @method     ChildTickets|null findOneByTelefono(string $telefono) Return the first ChildTickets filtered by the telefono column
 * @method     ChildTickets|null findOneByCelular(string $celular) Return the first ChildTickets filtered by the celular column
 * @method     ChildTickets|null findOneByEmail(string $email) Return the first ChildTickets filtered by the email column
 * @method     ChildTickets|null findOneByNivel(string $nivel) Return the first ChildTickets filtered by the nivel column
 * @method     ChildTickets|null findOneByEstatus(int $estatus) Return the first ChildTickets filtered by the estatus column
 *
 * @method     ChildTickets requirePk($key, ?ConnectionInterface $con = null) Return the ChildTickets by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOne(?ConnectionInterface $con = null) Return the first ChildTickets matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTickets requireOneByIdTicket(int $id_ticket) Return the first ChildTickets filtered by the id_ticket column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByNomCompleto(string $nom_completo) Return the first ChildTickets filtered by the nom_completo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByCurp(string $curp) Return the first ChildTickets filtered by the curp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByNombres(string $nombres) Return the first ChildTickets filtered by the nombres column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByPaterno(string $paterno) Return the first ChildTickets filtered by the paterno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByMaterno(string $materno) Return the first ChildTickets filtered by the materno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByTelefono(string $telefono) Return the first ChildTickets filtered by the telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByCelular(string $celular) Return the first ChildTickets filtered by the celular column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByEmail(string $email) Return the first ChildTickets filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByNivel(string $nivel) Return the first ChildTickets filtered by the nivel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTickets requireOneByEstatus(int $estatus) Return the first ChildTickets filtered by the estatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTickets[]|Collection find(?ConnectionInterface $con = null) Return ChildTickets objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildTickets> find(?ConnectionInterface $con = null) Return ChildTickets objects based on current ModelCriteria
 *
 * @method     ChildTickets[]|Collection findByIdTicket(int|array<int> $id_ticket) Return ChildTickets objects filtered by the id_ticket column
 * @psalm-method Collection&\Traversable<ChildTickets> findByIdTicket(int|array<int> $id_ticket) Return ChildTickets objects filtered by the id_ticket column
 * @method     ChildTickets[]|Collection findByNomCompleto(string|array<string> $nom_completo) Return ChildTickets objects filtered by the nom_completo column
 * @psalm-method Collection&\Traversable<ChildTickets> findByNomCompleto(string|array<string> $nom_completo) Return ChildTickets objects filtered by the nom_completo column
 * @method     ChildTickets[]|Collection findByCurp(string|array<string> $curp) Return ChildTickets objects filtered by the curp column
 * @psalm-method Collection&\Traversable<ChildTickets> findByCurp(string|array<string> $curp) Return ChildTickets objects filtered by the curp column
 * @method     ChildTickets[]|Collection findByNombres(string|array<string> $nombres) Return ChildTickets objects filtered by the nombres column
 * @psalm-method Collection&\Traversable<ChildTickets> findByNombres(string|array<string> $nombres) Return ChildTickets objects filtered by the nombres column
 * @method     ChildTickets[]|Collection findByPaterno(string|array<string> $paterno) Return ChildTickets objects filtered by the paterno column
 * @psalm-method Collection&\Traversable<ChildTickets> findByPaterno(string|array<string> $paterno) Return ChildTickets objects filtered by the paterno column
 * @method     ChildTickets[]|Collection findByMaterno(string|array<string> $materno) Return ChildTickets objects filtered by the materno column
 * @psalm-method Collection&\Traversable<ChildTickets> findByMaterno(string|array<string> $materno) Return ChildTickets objects filtered by the materno column
 * @method     ChildTickets[]|Collection findByTelefono(string|array<string> $telefono) Return ChildTickets objects filtered by the telefono column
 * @psalm-method Collection&\Traversable<ChildTickets> findByTelefono(string|array<string> $telefono) Return ChildTickets objects filtered by the telefono column
 * @method     ChildTickets[]|Collection findByCelular(string|array<string> $celular) Return ChildTickets objects filtered by the celular column
 * @psalm-method Collection&\Traversable<ChildTickets> findByCelular(string|array<string> $celular) Return ChildTickets objects filtered by the celular column
 * @method     ChildTickets[]|Collection findByEmail(string|array<string> $email) Return ChildTickets objects filtered by the email column
 * @psalm-method Collection&\Traversable<ChildTickets> findByEmail(string|array<string> $email) Return ChildTickets objects filtered by the email column
 * @method     ChildTickets[]|Collection findByNivel(string|array<string> $nivel) Return ChildTickets objects filtered by the nivel column
 * @psalm-method Collection&\Traversable<ChildTickets> findByNivel(string|array<string> $nivel) Return ChildTickets objects filtered by the nivel column
 * @method     ChildTickets[]|Collection findByEstatus(int|array<int> $estatus) Return ChildTickets objects filtered by the estatus column
 * @psalm-method Collection&\Traversable<ChildTickets> findByEstatus(int|array<int> $estatus) Return ChildTickets objects filtered by the estatus column
 *
 * @method     ChildTickets[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildTickets> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class TicketsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \models\Base\TicketsQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\models\\Tickets', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTicketsQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTicketsQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildTicketsQuery) {
            return $criteria;
        }
        $query = new ChildTicketsQuery();
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
     * @return ChildTickets|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TicketsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TicketsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTickets A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_ticket, nom_completo, curp, nombres, paterno, materno, telefono, celular, email, nivel, estatus FROM tickets WHERE id_ticket = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTickets $obj */
            $obj = new ChildTickets();
            $obj->hydrate($row);
            TicketsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildTickets|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
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

        $this->addUsingAlias(TicketsTableMap::COL_ID_TICKET, $key, Criteria::EQUAL);

        return $this;
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

        $this->addUsingAlias(TicketsTableMap::COL_ID_TICKET, $keys, Criteria::IN);

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
                $this->addUsingAlias(TicketsTableMap::COL_ID_TICKET, $idTicket['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTicket['max'])) {
                $this->addUsingAlias(TicketsTableMap::COL_ID_TICKET, $idTicket['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_ID_TICKET, $idTicket, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nom_completo column
     *
     * Example usage:
     * <code>
     * $query->filterByNomCompleto('fooValue');   // WHERE nom_completo = 'fooValue'
     * $query->filterByNomCompleto('%fooValue%', Criteria::LIKE); // WHERE nom_completo LIKE '%fooValue%'
     * $query->filterByNomCompleto(['foo', 'bar']); // WHERE nom_completo IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $nomCompleto The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNomCompleto($nomCompleto = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomCompleto)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_NOM_COMPLETO, $nomCompleto, $comparison);

        return $this;
    }

    /**
     * Filter the query on the curp column
     *
     * Example usage:
     * <code>
     * $query->filterByCurp('fooValue');   // WHERE curp = 'fooValue'
     * $query->filterByCurp('%fooValue%', Criteria::LIKE); // WHERE curp LIKE '%fooValue%'
     * $query->filterByCurp(['foo', 'bar']); // WHERE curp IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $curp The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCurp($curp = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($curp)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_CURP, $curp, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nombres column
     *
     * Example usage:
     * <code>
     * $query->filterByNombres('fooValue');   // WHERE nombres = 'fooValue'
     * $query->filterByNombres('%fooValue%', Criteria::LIKE); // WHERE nombres LIKE '%fooValue%'
     * $query->filterByNombres(['foo', 'bar']); // WHERE nombres IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $nombres The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNombres($nombres = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombres)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_NOMBRES, $nombres, $comparison);

        return $this;
    }

    /**
     * Filter the query on the paterno column
     *
     * Example usage:
     * <code>
     * $query->filterByPaterno('fooValue');   // WHERE paterno = 'fooValue'
     * $query->filterByPaterno('%fooValue%', Criteria::LIKE); // WHERE paterno LIKE '%fooValue%'
     * $query->filterByPaterno(['foo', 'bar']); // WHERE paterno IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $paterno The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPaterno($paterno = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paterno)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_PATERNO, $paterno, $comparison);

        return $this;
    }

    /**
     * Filter the query on the materno column
     *
     * Example usage:
     * <code>
     * $query->filterByMaterno('fooValue');   // WHERE materno = 'fooValue'
     * $query->filterByMaterno('%fooValue%', Criteria::LIKE); // WHERE materno LIKE '%fooValue%'
     * $query->filterByMaterno(['foo', 'bar']); // WHERE materno IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $materno The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMaterno($materno = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($materno)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_MATERNO, $materno, $comparison);

        return $this;
    }

    /**
     * Filter the query on the telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefono('fooValue');   // WHERE telefono = 'fooValue'
     * $query->filterByTelefono('%fooValue%', Criteria::LIKE); // WHERE telefono LIKE '%fooValue%'
     * $query->filterByTelefono(['foo', 'bar']); // WHERE telefono IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $telefono The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_TELEFONO, $telefono, $comparison);

        return $this;
    }

    /**
     * Filter the query on the celular column
     *
     * Example usage:
     * <code>
     * $query->filterByCelular('fooValue');   // WHERE celular = 'fooValue'
     * $query->filterByCelular('%fooValue%', Criteria::LIKE); // WHERE celular LIKE '%fooValue%'
     * $query->filterByCelular(['foo', 'bar']); // WHERE celular IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $celular The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCelular($celular = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($celular)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_CELULAR, $celular, $comparison);

        return $this;
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * $query->filterByEmail(['foo', 'bar']); // WHERE email IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $email The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEmail($email = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_EMAIL, $email, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nivel column
     *
     * Example usage:
     * <code>
     * $query->filterByNivel('fooValue');   // WHERE nivel = 'fooValue'
     * $query->filterByNivel('%fooValue%', Criteria::LIKE); // WHERE nivel LIKE '%fooValue%'
     * $query->filterByNivel(['foo', 'bar']); // WHERE nivel IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $nivel The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNivel($nivel = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nivel)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_NIVEL, $nivel, $comparison);

        return $this;
    }

    /**
     * Filter the query on the estatus column
     *
     * Example usage:
     * <code>
     * $query->filterByEstatus(1234); // WHERE estatus = 1234
     * $query->filterByEstatus(array(12, 34)); // WHERE estatus IN (12, 34)
     * $query->filterByEstatus(array('min' => 12)); // WHERE estatus > 12
     * </code>
     *
     * @param mixed $estatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEstatus($estatus = null, ?string $comparison = null)
    {
        if (is_array($estatus)) {
            $useMinMax = false;
            if (isset($estatus['min'])) {
                $this->addUsingAlias(TicketsTableMap::COL_ESTATUS, $estatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estatus['max'])) {
                $this->addUsingAlias(TicketsTableMap::COL_ESTATUS, $estatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TicketsTableMap::COL_ESTATUS, $estatus, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildTickets $tickets Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($tickets = null)
    {
        if ($tickets) {
            $this->addUsingAlias(TicketsTableMap::COL_ID_TICKET, $tickets->getIdTicket(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tickets table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TicketsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TicketsTableMap::clearInstancePool();
            TicketsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TicketsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TicketsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TicketsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TicketsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
