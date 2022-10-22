<?php

namespace App\Services\Category;

use App\Models\Category;

/**
 * Class CategoryService.
 */
class CategoryService
{
    public function category(): Category
    {
        return new Category();
    }

    public function categoryById($id){
        return $this->category()->findOrFail($id);
    }

    public function createCategory($request){
        $input = $request->all();
        return $this->category()->create($input);
    }

    public function updateCategory($request, $id): void
    {
        $input = $request->all();
        $category = $this->categoryById($id);
        $category->update($input);
    }
}
