<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', ['items' => $items]);
    }

    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show', ['item' => $item]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        // インスタンスの作成
        $item = new Item;

        // 値の用意
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->seller = $request->seller;
        $item->email = $request->email;
        $item->image_url = $request->image_url;

        // インスタンスに値を設定して保存
        $item->save();

        // 登録したらindexに戻る
        return redirect('/items');
    }

    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        // 値の用意
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->seller = $request->seller;
        $item->email = $request->email;
        $item->image_url = $request->image_url;
        // 保存
        $item->save();
        // 登録したらindexに戻る
        return redirect('/items');
    }
}
