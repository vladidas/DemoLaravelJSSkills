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
     * Returns the first record in the database.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function first();

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
     * @param int limit
     * @param int $offset
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function page($limit = 10, $offset = 0, array $relations = [], $orderBy = 'updated_at', $sorting = 'desc');

    /**
     * Find a record by its identifier.
     *
     * @param string $id
     * @param array  $relations
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, $relations = null);

    /**
     * Find a record by an attribute.
     * Fails if no model is found.
     *
     * @param string $attribute
     * @param string $value
     * @param array  $relations
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findBy($attribute, $value, $relations = null);

    /**
     * Get all records by an associative array of attributes.
     * Two operators values are handled: AND | OR.
     *
     * @param array  $attributes
     * @param string $operator
     * @param array  $relations
     *
     * @return \Illuminate\Support\Collection
     */
    public function getByAttributes(array $attributes, $operator = 'AND', $relations = null);

    /**
     * Fills out an instance of the model
     * with $attributes.
     *
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fill($attributes);

    /**
     * Fills out an instance of the model
     * and saves it, pretty much like mass assignment.
     *
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fillAndSave($attributes);

    /**
     * Find record and fills out an instance of the model
     * and saves it, pretty much like mass assignment.
     *
     * @param $key
     * @param $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($key, $attributes);

    /**
     * Remove a selected record.
     *
     * @param string $key
     *
     * @return bool
     */
    public function remove($key);
}
