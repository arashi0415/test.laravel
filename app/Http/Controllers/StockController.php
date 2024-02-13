<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use App\Models\Users_stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $stocks = Stock::SimplePaginate(6);
        return view('stocks',compact('stocks'));
    }
    public function myCart(Users_stock $users_stock){
        $myCartStocks = $users_stock->showMyCart();
        return view('myCart',compact('myCartStocks'));
    }

    public function addMyCart(Request $request,Users_stock $users_stock)
    {
        $stockId=$request->stockId;
        $message = $users_stock->addMyCart($stockId);
        //追加後の情報を取得
        $myCartStocks = $users_stock->showMyCart();
        return view('myCart',compact('myCartStocks' , 'message'));

        // return redirect()->route('stock.myCart')->with(compact('myCartStocks', 'message'));
    //     public function test(): RedirectResponse
    // {
        // return redirect()->route('stock.myCart')->with(['myCartStocks' => []]);
    // }
    }
    public function deleteMyCartStock(Request $request,Users_Stock $users_stock){

        $stockId = $request->stockId;

        $message = $users_stock->deleteMyCartStock($stockId);
        


        $myCartStocks = $users_stock->showMyCart();
        

        return view('myCart',compact('myCartStocks' , 'message'));

    }
    
}
