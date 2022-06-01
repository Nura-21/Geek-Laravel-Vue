<?php
namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    protected Category $model;

    /**
     * CategoryRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * Get all categories
     * @return mixed
     */
    public function getAll(): mixed
    {
        return $this->model->orderBy('code')->paginate(6);
    }

    /**
     * Get item by id
     *
     * @param string $id
     * @return mixed
     */
    public function getById(string $id): mixed
    {
        return $this->model->find($id);
    }

    /**
     * Create new item
     *
     * @param mixed $attributes
     * @return mixed
     */
    public function create(mixed $attributes): mixed
    {
        return $this->model->create($attributes);
    }

    /**
     * Update item by id
     *
     * @param string $id
     * @param mixed $attributes
     * @return mixed
     */
    public function update(string $id, mixed $attributes): mixed
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete item by id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id): mixed
    {
        return $this->model->find($id)->delete();
    }
}
