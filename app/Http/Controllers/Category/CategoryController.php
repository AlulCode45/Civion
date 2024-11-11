<?php

namespace App\Http\Controllers\Category;

use App\Contracts\Interface\Category\CategoryInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryInterface $category;

    function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ResponseHelper::success($this->category->getCategoryWithReports());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try{
            $validated = $request->validated();
            $this->category->store($validated);
            return ResponseHelper::success($validated, message: "Create success");
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return ResponseHelper::success($category,message: "Get data success");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try{
            $validated = $request->validated();
            $this->category->update($validated, $category->id);
            return ResponseHelper::success($validated, message: "Update success");
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($this->category->delete($category->id)) {
            return ResponseHelper::success("Delete success");
        }else{
            return ResponseHelper::error("Delete fail");
        }
    }
}
