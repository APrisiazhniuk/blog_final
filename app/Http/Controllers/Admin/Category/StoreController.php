<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
//        Category::firstOrCreate(['title'=>$data['title']],[
//            'title'=>$data['title']
//        ]);
        Category::firstOrCreate($data);
        return redirect()->route('admin.category.index');
    }
}
