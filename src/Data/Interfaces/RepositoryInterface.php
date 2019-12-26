<?php

namespace App\Data\Interfaces;

/**
 * Interface RepositoryInterface
 * @package App\Data\Interfaces
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
interface RepositoryInterface
{
    /**
     * Returns all the records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Returns the count of all the records.
     *
     * @return int
     */
    public function count();

    /**
     * Returns a range of records bounded by pagination parameters.
     *
     * @param int $limit
     * @param int $offset
     * @param array $relations
     * @param string $orderBy
     * @param string $sorting
     * @return \Illuminate\Database\Eloquent\Builder[]|
     * \Illuminate\Database\Eloquent\Collection|
     * \Illuminate\Database\Eloquent\Model[]|
     * \Illuminate\Database\Query\Builder[]|
     * \Illuminate\Support\Collection|
     * mixed
     */
    public function page();

    /**
     * Add row.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Find a record by its identifier.
     *
     * @param int $id
     * @param array|null $relations
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find(int $id, array $relations = null);

    /**
     * Find a record by an attribute.
     * Fails if no model is found.
     *
     * @param string $attribute
     * @param string $value
     * @param array|null $relations
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findBy(string $attribute, string $value, array $relations = null);

    /**
     * Get all records by an associative array of attributes.
     * Two operators values are handled: AND | OR.
     *
     * @param array $attributes
     * @param string $operator
     * @param string|null $relations
     * @return \Illuminate\Support\Collection
     */
    public function getByAttributes(array $attributes, string $operator = 'AND', string $relations = null);

    /**
     * Fills out an instance of the model
     * with $attributes.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fill(array $attributes);

    /**
     * Fills out an instance of the model
     * and saves it, pretty much like mass assignment.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fillAndSave(array $attributes);

    /**
     * Find record and fills out an instance of the model
     * and saves it, pretty much like mass assignment.
     *
     * @param string $key
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(string $key, array $attributes);

    /**
     * Remove a selected record.
     *
     * @param string $key
     * @return bool
     */
    public function remove(string $key);

    /**
     * Implement a convenience call to findBy
     * which allows finding by an attribute name
     * as follows: findByName or findByAlias.
     *
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $method, array $arguments);
}
