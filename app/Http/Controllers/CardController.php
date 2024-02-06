<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Controllers\Controller;
use App\Services\CardService;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function __construct(protected CardService $cartService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content=$this->cartService->getContent();
        $content=session()->has('cart') ? session()->get('cart') :collect();
        $total=$content->reduce(function ($total,$item){
            return $total+=$item->get('price')*$item->get('quantity');
        });
        return view('cart.index',[
            'content'=>$content,
            'total'=>$total,
        ]);
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
    public function store(Request $request)
    {
        //kirish malumotlarini tasdiqlang
        $request->validate([
           'name'=>'required:string',
            'price'=>'required:numeric',
            'quantity'=>'required:integer',
        ]);
        // yangi savat elementlarini shakllantiring
        $cartItem=collect([
           'name'=>$request->name,
            'price'=>floatval($request->price),
            'quantity'=>floatval($request->quantity),
            'options'=>$request->options

        ]);
        //buyum allaqachon savatda mavjudligini tekshiring
        $content=session()->has('cart') ? session()->get('cart') :collect();
        $id=$request['id'];
        if($content->has('id')){
            $cartItem->put('quantity',$content->get($id)->get('quantity')+$request->quantity);
        }
        //agar yoq bosa savatga qoshing
        $content=put($id,$cartItem);
        session()->put('content',$content);
        return back()->with('success','Savatga qoshildi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $content=$this->cardService->getContent();
        if($content->has('id')){
            $item=$content->get('id');
            return view('cart',compact('item'));
        }
        return  back()->with('fail','Item topimadi');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
