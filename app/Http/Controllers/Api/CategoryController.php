<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private CategoryRepository $categoryRepository;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->categoryRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        return response()->json($this->categoryRepository->create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category)
    {
        return response()->json($this->categoryRepository->getById($category->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        $this->categoryRepository->update($category->id, $request->validated());
        return response()->json($this->categoryRepository->getById($category->id));

        // Если пишу как ниже он у меня выдает 500 ошибку, изменения проходят но ошибка выдается
        // return new CategoryResource($this->categoryRepository->update($category->id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category->id);

        return response()->noContent();
    }
}
