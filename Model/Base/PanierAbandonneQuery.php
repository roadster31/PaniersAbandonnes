<?php

namespace PaniersAbandonnes\Model\Base;

use \Exception;
use \PDO;
use PaniersAbandonnes\Model\PanierAbandonne as ChildPanierAbandonne;
use PaniersAbandonnes\Model\PanierAbandonneQuery as ChildPanierAbandonneQuery;
use PaniersAbandonnes\Model\Map\PanierAbandonneTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\Cart;

/**
 * Base class that represents a query for the 'panier_abandonne' table.
 *
 *
 *
 * @method     ChildPanierAbandonneQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPanierAbandonneQuery orderByCartId($order = Criteria::ASC) Order by the cart_id column
 * @method     ChildPanierAbandonneQuery orderByEmailClient($order = Criteria::ASC) Order by the email_client column
 * @method     ChildPanierAbandonneQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method     ChildPanierAbandonneQuery orderByEtatRappel($order = Criteria::ASC) Order by the etat_rappel column
 * @method     ChildPanierAbandonneQuery orderByLoginToken($order = Criteria::ASC) Order by the login_token column
 * @method     ChildPanierAbandonneQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 *
 * @method     ChildPanierAbandonneQuery groupById() Group by the id column
 * @method     ChildPanierAbandonneQuery groupByCartId() Group by the cart_id column
 * @method     ChildPanierAbandonneQuery groupByEmailClient() Group by the email_client column
 * @method     ChildPanierAbandonneQuery groupByLocale() Group by the locale column
 * @method     ChildPanierAbandonneQuery groupByEtatRappel() Group by the etat_rappel column
 * @method     ChildPanierAbandonneQuery groupByLoginToken() Group by the login_token column
 * @method     ChildPanierAbandonneQuery groupByLastUpdate() Group by the last_update column
 *
 * @method     ChildPanierAbandonneQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPanierAbandonneQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPanierAbandonneQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPanierAbandonneQuery leftJoinCart($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cart relation
 * @method     ChildPanierAbandonneQuery rightJoinCart($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cart relation
 * @method     ChildPanierAbandonneQuery innerJoinCart($relationAlias = null) Adds a INNER JOIN clause to the query using the Cart relation
 *
 * @method     ChildPanierAbandonne findOne(ConnectionInterface $con = null) Return the first ChildPanierAbandonne matching the query
 * @method     ChildPanierAbandonne findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPanierAbandonne matching the query, or a new ChildPanierAbandonne object populated from the query conditions when no match is found
 *
 * @method     ChildPanierAbandonne findOneById(int $id) Return the first ChildPanierAbandonne filtered by the id column
 * @method     ChildPanierAbandonne findOneByCartId(int $cart_id) Return the first ChildPanierAbandonne filtered by the cart_id column
 * @method     ChildPanierAbandonne findOneByEmailClient(string $email_client) Return the first ChildPanierAbandonne filtered by the email_client column
 * @method     ChildPanierAbandonne findOneByLocale(string $locale) Return the first ChildPanierAbandonne filtered by the locale column
 * @method     ChildPanierAbandonne findOneByEtatRappel(int $etat_rappel) Return the first ChildPanierAbandonne filtered by the etat_rappel column
 * @method     ChildPanierAbandonne findOneByLoginToken(string $login_token) Return the first ChildPanierAbandonne filtered by the login_token column
 * @method     ChildPanierAbandonne findOneByLastUpdate(string $last_update) Return the first ChildPanierAbandonne filtered by the last_update column
 *
 * @method     array findById(int $id) Return ChildPanierAbandonne objects filtered by the id column
 * @method     array findByCartId(int $cart_id) Return ChildPanierAbandonne objects filtered by the cart_id column
 * @method     array findByEmailClient(string $email_client) Return ChildPanierAbandonne objects filtered by the email_client column
 * @method     array findByLocale(string $locale) Return ChildPanierAbandonne objects filtered by the locale column
 * @method     array findByEtatRappel(int $etat_rappel) Return ChildPanierAbandonne objects filtered by the etat_rappel column
 * @method     array findByLoginToken(string $login_token) Return ChildPanierAbandonne objects filtered by the login_token column
 * @method     array findByLastUpdate(string $last_update) Return ChildPanierAbandonne objects filtered by the last_update column
 *
 */
abstract class PanierAbandonneQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \PaniersAbandonnes\Model\Base\PanierAbandonneQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\PaniersAbandonnes\\Model\\PanierAbandonne', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPanierAbandonneQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPanierAbandonneQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \PaniersAbandonnes\Model\PanierAbandonneQuery) {
            return $criteria;
        }
        $query = new \PaniersAbandonnes\Model\PanierAbandonneQuery();
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
     * @return ChildPanierAbandonne|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PanierAbandonneTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PanierAbandonneTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildPanierAbandonne A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, CART_ID, EMAIL_CLIENT, LOCALE, ETAT_RAPPEL, LOGIN_TOKEN, LAST_UPDATE FROM panier_abandonne WHERE ID = :p0';
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
            $obj = new ChildPanierAbandonne();
            $obj->hydrate($row);
            PanierAbandonneTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPanierAbandonne|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
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
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
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
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PanierAbandonneTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PanierAbandonneTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PanierAbandonneTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PanierAbandonneTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierAbandonneTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the cart_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCartId(1234); // WHERE cart_id = 1234
     * $query->filterByCartId(array(12, 34)); // WHERE cart_id IN (12, 34)
     * $query->filterByCartId(array('min' => 12)); // WHERE cart_id > 12
     * </code>
     *
     * @see       filterByCart()
     *
     * @param     mixed $cartId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByCartId($cartId = null, $comparison = null)
    {
        if (is_array($cartId)) {
            $useMinMax = false;
            if (isset($cartId['min'])) {
                $this->addUsingAlias(PanierAbandonneTableMap::CART_ID, $cartId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cartId['max'])) {
                $this->addUsingAlias(PanierAbandonneTableMap::CART_ID, $cartId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierAbandonneTableMap::CART_ID, $cartId, $comparison);
    }

    /**
     * Filter the query on the email_client column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailClient('fooValue');   // WHERE email_client = 'fooValue'
     * $query->filterByEmailClient('%fooValue%'); // WHERE email_client LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emailClient The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByEmailClient($emailClient = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emailClient)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $emailClient)) {
                $emailClient = str_replace('*', '%', $emailClient);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PanierAbandonneTableMap::EMAIL_CLIENT, $emailClient, $comparison);
    }

    /**
     * Filter the query on the locale column
     *
     * Example usage:
     * <code>
     * $query->filterByLocale('fooValue');   // WHERE locale = 'fooValue'
     * $query->filterByLocale('%fooValue%'); // WHERE locale LIKE '%fooValue%'
     * </code>
     *
     * @param     string $locale The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByLocale($locale = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($locale)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $locale)) {
                $locale = str_replace('*', '%', $locale);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PanierAbandonneTableMap::LOCALE, $locale, $comparison);
    }

    /**
     * Filter the query on the etat_rappel column
     *
     * Example usage:
     * <code>
     * $query->filterByEtatRappel(1234); // WHERE etat_rappel = 1234
     * $query->filterByEtatRappel(array(12, 34)); // WHERE etat_rappel IN (12, 34)
     * $query->filterByEtatRappel(array('min' => 12)); // WHERE etat_rappel > 12
     * </code>
     *
     * @param     mixed $etatRappel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByEtatRappel($etatRappel = null, $comparison = null)
    {
        if (is_array($etatRappel)) {
            $useMinMax = false;
            if (isset($etatRappel['min'])) {
                $this->addUsingAlias(PanierAbandonneTableMap::ETAT_RAPPEL, $etatRappel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($etatRappel['max'])) {
                $this->addUsingAlias(PanierAbandonneTableMap::ETAT_RAPPEL, $etatRappel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierAbandonneTableMap::ETAT_RAPPEL, $etatRappel, $comparison);
    }

    /**
     * Filter the query on the login_token column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginToken('fooValue');   // WHERE login_token = 'fooValue'
     * $query->filterByLoginToken('%fooValue%'); // WHERE login_token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $loginToken The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByLoginToken($loginToken = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($loginToken)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $loginToken)) {
                $loginToken = str_replace('*', '%', $loginToken);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PanierAbandonneTableMap::LOGIN_TOKEN, $loginToken, $comparison);
    }

    /**
     * Filter the query on the last_update column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdate('2011-03-14'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate('now'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate(array('max' => 'yesterday')); // WHERE last_update > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PanierAbandonneTableMap::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PanierAbandonneTableMap::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierAbandonneTableMap::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\Cart object
     *
     * @param \Thelia\Model\Cart|ObjectCollection $cart The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function filterByCart($cart, $comparison = null)
    {
        if ($cart instanceof \Thelia\Model\Cart) {
            return $this
                ->addUsingAlias(PanierAbandonneTableMap::CART_ID, $cart->getId(), $comparison);
        } elseif ($cart instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PanierAbandonneTableMap::CART_ID, $cart->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCart() only accepts arguments of type \Thelia\Model\Cart or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cart relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function joinCart($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cart');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Cart');
        }

        return $this;
    }

    /**
     * Use the Cart relation Cart object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\CartQuery A secondary query class using the current class as primary query
     */
    public function useCartQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCart($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cart', '\Thelia\Model\CartQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPanierAbandonne $panierAbandonne Object to remove from the list of results
     *
     * @return ChildPanierAbandonneQuery The current query, for fluid interface
     */
    public function prune($panierAbandonne = null)
    {
        if ($panierAbandonne) {
            $this->addUsingAlias(PanierAbandonneTableMap::ID, $panierAbandonne->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the panier_abandonne table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PanierAbandonneTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PanierAbandonneTableMap::clearInstancePool();
            PanierAbandonneTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildPanierAbandonne or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildPanierAbandonne object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PanierAbandonneTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PanierAbandonneTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        PanierAbandonneTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PanierAbandonneTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // PanierAbandonneQuery