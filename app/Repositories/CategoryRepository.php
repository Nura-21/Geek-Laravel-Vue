<?php
namespace App\Repositories;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements BaseRepository
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
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
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
