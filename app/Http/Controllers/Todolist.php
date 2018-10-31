<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Http\Models\Todolist as mTodolist;

class Todolist extends Controller
{
    public function index ()
    {
        $data = [
            'data'     => mTodolist::all(),
            'redirect' => route('getdata')
        ];
        return view('list', $data);
    }

    public function store(Request $req)
    {
        if ($req->ajax()) {
            mTodolist::create([
                'description' => $req->input('description'),
                'status'      => '0'
            ]);
            $result = [
                'status' => true,
                'redirect' => route('getdata')
            ];
            return response()->json($result);

        }
    }

    public function gettable()
    {
        $data = [
            'data' => mTodolist::all()
        ];
        return view('table', $data)->render();
    }

    public function delete(Request $req)
    {
        if ($req->ajax()) {
            $id = $req->input('id');
            $execute = mTodolist::find($id);

            $execute->delete();

            $result = [
                'status'   => true,
                'redirect' => route('getdata')
            ];

            return response()->json($result);
        }
    }

    public function save(Request $req)
    {
        if ($req->ajax()) {
            $id = $req->input('id');
            $row = mTodolist::find($id);

            if ($req->input('flag') == 1) {
                $row->status = $req->input('status') == '0' ? '1' : '0';
            }

            $row->description = $req->input('description');
            $row->save();

            $result = [
                'status'   => true,
                'redirect' => route('getdata')
            ];

            return response()->json($result);
        }
    }
}
