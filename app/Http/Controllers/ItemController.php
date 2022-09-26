<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //
    public function get()
	{
		return Item::all();
	}

	public function create(Request $request)
	{
		if(!$request->text) return response("Error dato", 500);

		$item = new Item;
		$item->text = $request->text;
		$item->save();

	}

	public function update(Request $request)
	{
		$item = Item::find($request->id);
		$field = $request->field;
		$value = $request->value;

		if(!$item || !$field) return response("Error dato", 500);

		$item->$field = $value;
		$item->save();
	}

	public function destroy($id)
	{
		if ($id == 'all') {
			$records = Item::pluck('id')->toArray();
			$deleted = Item::destroy($records);
		}
		else{
			$item = Item::find($id);
			$item->delete();
		}
	}
}
