<?php

namespace App\Services\Category;

use App\Models\Category;

/**
 * Class CategoryService.
 */
class CategoryService
{
    public function category(){
        return new Category();
    }

    public function categoryById($id){
        return $this->category()->findOrFail($id);
    }
}
