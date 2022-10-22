<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    private CategoryService $category;
    public function __construct(CategoryService $category){
        $this->category = $category;
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->category->createCategory($request);
            return response()->json([
                'success' => true,
                'category' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->category->updateCategory($request, $id);
            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
