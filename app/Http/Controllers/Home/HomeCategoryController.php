<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class HomeCategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryService $category){
        $this->category = $category;
    }

    public function index(){
        try {
            $data = $this->category->category()->orderBy('name')->get();
            return response()->json([
                'success' => true,
                'categories' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
