<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BanksController extends Controller
{
    public function index(Request $request)
    {
        $limit = isset($request->all()['limit']) ? $request->all()['limit'] : 20;

        $order = isset($request->all()['order']) ? $request->all()['order'] : null;

        if ($order != null){
            $order = explode(',', $order);
        }

        $order[0] = isset($order[0]) ? $order[0] : 'id';

        $order[1] = isset($order[1]) ? $order[1] :'asc';

        $where = isset($request->all()['where']) ? $request->all()['where'] : [];

        $like = isset($request->all()['like']) ? $request->all()['like'] : null;

        if ($like) {
            $like = explode(',', $like);
            $like[1] = '%'.'%';
        }



        $result = \App\Bank::orderBy($order[0], $order[1])
            ->where($where)
            ->paginate($limit);
        
        return response()->json($result);
    }

    public function create()
    {

    }

    public function update()
    {

    }
}
