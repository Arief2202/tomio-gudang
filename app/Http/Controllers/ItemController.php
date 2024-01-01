<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemBrand;
use App\Models\ItemType;

use App\Models\Income;
use App\Models\Outcome;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    //============================================= STOCK ======================================================
    //======================= CREATE ============================

    // public function item_create(Request $request)
    // {
    //     if(isset($request->item_type_id) && isset($request->item_brand_id)){
    //         // dd($request);
    //         Item::create([
    //             "item_type_id" => $request->item_type_id,
    //             "item_brand_id" => $request->item_brand_id,
    //             "varian" => $request->varian,
    //             "product_code" => $request->product_code
    //         ]);
    //     }
    //     return redirect('/gudang/item');
    // }
    // public function type_create(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|unique:item_types|max:255'
    //     ]);
    //     ItemType::create([
    //         'name' => $request->name,
    //     ]);
     
    //     return redirect('/gudang/jenis');
    // }
    // public function brand_create(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|unique:item_brands|max:255'
    //     ]);
    //     ItemBrand::create([
    //         "name" => $request->name,
    //     ]);
        
    //     return redirect('/gudang/merk');
    // }

    
    //======================= READ ============================
    public function stock_read()
    {
        $items = Item::get();
        // $items2 = $items;
        $i = 0;
        $items2 = array();
        $inct = array();
        foreach($items as $item){
            $items2[$i] = $item;
            $incomeTotal = 0;
            foreach(Income::where('item_id', '=', $item->id)->get() as $inc){
                $incomeTotal += $inc->count;
            }
            $outcomeTotal = 0;
            foreach(Outcome::where('item_id', '=', $item->id)->get() as $outc){
                $outcomeTotal += $outc->count;
            }
            $items2[$i]->stock = $incomeTotal - $outcomeTotal;
            $i++;
        }
        $items2 = collect((object) $items2);
        return view('stock.read_stock', [
            "items" => $items2,
            "types" => ItemType::get(),
            "brands" => ItemBrand::get()
        ]);
    }

    public function stock_in_read()
    {
        return view('stock.read_income', [
            "items" => Item::get(),
            "types" => ItemType::get(),
            "brands" => ItemBrand::get()
        ]);
    }

    public function stock_out_read()
    {
        return view('stock.read_outcome', [
            "items" => Item::orderBy('id', 'DESC')->get(),
            "types" => ItemType::get(),
            "brands" => ItemBrand::get()
        ]);
    }

    //======================= UPDATE ============================
    // public function item_update(Request $request)
    // {
    //     if(isset($request->id) && isset($request->item_type_id) && isset($request->item_brand_id)){
    //         $item = Item::where('id', '=', $request->id)->first();
    //         if(isset($request->item_type_id))  $item->item_type_id  = $request->item_type_id;
    //         if(isset($request->item_brand_id)) $item->item_brand_id = $request->item_brand_id;
    //         if(isset($request->varian))        $item->varian        = $request->varian;
    //         if(isset($request->product_code))  $item->product_code  = $request->product_code;
    //         $item->save();
    //     }
    //     // dd("Hello");
    //     return redirect('/gudang/item');
    // }
    // public function type_update(Request $request)
    // {
    //     if(isset($request->id) && isset($request->name)){
    //         $type = ItemType::where('id', '=', $request->id)->first();
    //         $type->name = $request->name;
    //         $type->save();
    //     }
    //     return redirect('/gudang/jenis');
    // }
    // public function brand_update(Request $request)
    // {
    //     if(isset($request->id) && isset($request->name)){
    //         $brand = ItemBrand::where('id', '=', $request->id)->first();
    //         $brand->name = $request->name;
    //         $brand->save();
    //     }
    //     return redirect('/gudang/merk');
    // }

    //======================= DELETE ============================
    // public function item_delete(Request $request)
    // {
    //     if(isset($request->id)){
    //         Item::where('id', '=', $request->id)->first()->delete();
    //     }
    //     return redirect('/gudang/item');
    // }
    // public function type_delete(Request $request)
    // {
    //     if(isset($request->id)){
    //         $type = ItemType::where('id', '=', $request->id)->first();
    //         $items = Item::where('item_type_id', '=', $type->id)->get();
    //         foreach($items as $item) $item->delete();
    //         $type->delete();
    //     }
    //     return redirect('/gudang/jenis');
    // }
    // public function brand_delete(Request $request)
    // {
    //     if(isset($request->id)){
    //         $brand = ItemBrand::where('id', '=', $request->id)->first();
    //         if($brand){
    //             $items = Item::where('item_brand_id', '=', $brand->id)->get();
    //             foreach($items as $item) $item->delete();
    //             $brand->delete();
    //         }
    //     }
    //     return redirect('/gudang/merk');
    // }

    //============================================= ITEM ======================================================
    //======================= CREATE ============================
    public function item_create(Request $request)
    {
        if(isset($request->item_type_id) && isset($request->item_brand_id)){
            // dd($request);
            Item::create([
                "item_type_id" => $request->item_type_id,
                "item_brand_id" => $request->item_brand_id,
                "varian" => $request->varian,
                "product_code" => $request->product_code
            ]);
        }
        return redirect('/gudang/item');
    }
    public function type_create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:item_types|max:255'
        ]);
        ItemType::create([
            'name' => $request->name,
        ]);
     
        return redirect('/gudang/jenis');
    }
    public function brand_create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:item_brands|max:255'
        ]);
        ItemBrand::create([
            "name" => $request->name,
        ]);
        
        return redirect('/gudang/merk');
    }

    
    //======================= READ ============================
    public function item_read()
    {
        
        return view('gudang.read_item', [
            "items" => Item::orderBy('id', 'DESC')->get(),
            "types" => ItemType::get(),
            "brands" => ItemBrand::get()
        ]);
    }

    public function type_read()
    {
        return view('gudang.read_type', [
            "types" => ItemType::get(),
        ]);
    }

    public function brand_read()
    {
        return view('gudang.read_brand', [
            "brands" => ItemBrand::get(),
        ]);
    }

    //======================= UPDATE ============================
    public function item_update(Request $request)
    {
        if(isset($request->id) && isset($request->item_type_id) && isset($request->item_brand_id)){
            $item = Item::where('id', '=', $request->id)->first();
            if(isset($request->item_type_id))  $item->item_type_id  = $request->item_type_id;
            if(isset($request->item_brand_id)) $item->item_brand_id = $request->item_brand_id;
            if(isset($request->varian))        $item->varian        = $request->varian;
            if(isset($request->product_code))  $item->product_code  = $request->product_code;
            $item->save();
        }
        // dd("Hello");
        return redirect('/gudang/item');
    }
    public function type_update(Request $request)
    {
        if(isset($request->id) && isset($request->name)){
            $type = ItemType::where('id', '=', $request->id)->first();
            $type->name = $request->name;
            $type->save();
        }
        return redirect('/gudang/jenis');
    }
    public function brand_update(Request $request)
    {
        if(isset($request->id) && isset($request->name)){
            $brand = ItemBrand::where('id', '=', $request->id)->first();
            $brand->name = $request->name;
            $brand->save();
        }
        return redirect('/gudang/merk');
    }

    //======================= DELETE ============================
    public function item_delete(Request $request)
    {
        if(isset($request->id)){
            Item::where('id', '=', $request->id)->first()->delete();
        }
        return redirect('/gudang/item');
    }
    public function type_delete(Request $request)
    {
        if(isset($request->id)){
            $type = ItemType::where('id', '=', $request->id)->first();
            $items = Item::where('item_type_id', '=', $type->id)->get();
            foreach($items as $item) $item->delete();
            $type->delete();
        }
        return redirect('/gudang/jenis');
    }
    public function brand_delete(Request $request)
    {
        if(isset($request->id)){
            $brand = ItemBrand::where('id', '=', $request->id)->first();
            if($brand){
                $items = Item::where('item_brand_id', '=', $brand->id)->get();
                foreach($items as $item) $item->delete();
                $brand->delete();
            }
        }
        return redirect('/gudang/merk');
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
