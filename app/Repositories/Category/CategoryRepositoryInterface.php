<?php
namespace App\Repositories\Category;


interface CategoryRepositoryInterface
{
    /**
     * Get all categories
     * @return mixed
     */
    public function getAll(): mixed;
    /**
     * Get item by id
     *
     * @param string $id
     * @return mixed
     */
    public function getById(string $id): mixed;
    /**
     * Create new item
     *
     * @param mixed $attributes
     * @return mixed
     */
    public function create(mixed $attributes): mixed;
    /**
     * Update item by id
     *
     * @param string $id
     * @param mixed $attributes
     * @return mixed
     */
    public function update(string $id, mixed $attributes): mixed;
    /**
     * Delete item by id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id): mixed;

}
