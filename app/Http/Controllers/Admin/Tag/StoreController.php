<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
//        Category::firstOrCreate(['title'=>$data['title']],[
//            'title'=>$data['title']
//        ]);
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }
}
