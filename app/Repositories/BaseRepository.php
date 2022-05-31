<?php

namespace App\Repositories;

interface BaseRepository
{
    /**
     * Get all
     *
     * @return mixed
     */
    function getAll();

    /**
     * Get by id
     *
     * @param string $id
     * @return mixed
     */
    function getById(string $id);

    /**
     * Create new
     *
     * @param mixed $attributes
     * @return mixed
     */
    function create(mixed $attributes);

    /**
     * Update
     *
     * @param string $id
     * @param mixed $attributes
     * @return mixed
     */
    function update(string $id, mixed $attributes);

    /**
     * Destroy
     *
     * @param string $id
     * @return mixed
     */
    function delete(string $id);
}
