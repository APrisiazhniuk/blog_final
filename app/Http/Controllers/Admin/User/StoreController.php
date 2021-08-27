<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
//        Category::firstOrCreate(['title'=>$data['title']],[
//            'title'=>$data['title']
//        ]);
        User::firstOrCreate($data);
        return redirect()->route('admin.user.index');
    }
}
