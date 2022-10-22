<?php

namespace App\Http\Controllers\Home\Category;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class HomeCategoryController extends Controller
{
    private CategoryService $category;
    public function __construct(CategoryService $category){
        $this->category = $category;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->category->category()->get();
            return response()->json([
                'success' => true,
                'posts' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
