<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Item;


class ItemsController extends Controller
{

    // get all items
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }




    public function create()
    {
        //
    }




    // create new item and save in database
    public function store(Request $request)
    {
        // validate form input
       $validator = Validator::make($request->all(), ['Name' => 'required', 'Description' => 'required']);

       if ($validator->fails()) {
           $response = array('response' => $validator->messages(), 'success' => false);
           return $response;
       } else {
           $item = new Item;
           $item->Name = $request->input('Name');
           $item->Description = $request->input('Description');
           $item->save();
           return response()->json($item);
       }
    }



    // fetch one item
    public function show($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }




    public function edit($id)
    {
        //
    }



    // update one item
    public function update(Request $request, $id)
    {
        // validate form input
        $validator = Validator::make($request->all(), ['Name' => 'required', 'Description' => 'required']);

        if ($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            $item = Item::find($id);
            $item->Name = $request->input('Name');
            $item->Description = $request->input('Description');
            $item->save();
            return response()->json($item);
        }
    }



    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        $response = array('response' => 'Item successfully deleted!', 'success' => true);
        return $response;
    }
}
