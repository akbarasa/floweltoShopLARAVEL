<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Detail;
use App\Flower;
use App\Header;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    //
    public function home(){
        $category = Category::all();

        return view('home', ['category' => $category]);
    }

    public function register(Request $req){
        $user = new User();

        $req->validate([
            'username' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'password-confirm' => ['required', 'same:password'],
            'dob' => ['required'],
            'gender' => ['required'],
            'useradd' => ['required', 'string', 'min:10'],
        ]);

        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->useradd = $req->useradd;
        $user->gender = $req->gender;
        $user->dob = $req->dob;

        $user->save();

        return redirect('/login');
    }

    public function viewcflower($id){
        $flower = Flower::where('category_id','=', $id)->get();
        $category = Category::find($id);


        return view('viewcflower', ['flower' => $flower, 'category' => $category]);
    }

    public function searchflower(Request $req){
        $flower = Flower::where('category_id','=', $req->categoryid)->get();
        $category = Category::find($req->categoryid);

        if($req->filter == 'name'){
            $flower = Flower::where('flower_name','LIKE', '%'.$req->search.'%')->where('category_id','=',$req->categoryid)->get();
        }
        if($req->filter == 'price'){
            $flower = Flower::where('flower_price','=', $req->search)->where('category_id','=',$req->categoryid)->get();
        }

        return view('viewcflower', ['flower' => $flower, 'category' => $category]);
    }

    public function viewdetailflower($id){
        $flower = Flower::find($id);


        return view('viewdetailflower', ['flower' => $flower]);

    }

    public function flowerupdate($id){
        $flower = Flower::find($id);
        $category = Category::all();

        return view('viewupdateflower', ['flower' => $flower, 'category' => $category]);

    }

    public function flowerdelete($id){
        $flower = Flower::find($id);
        $flower->delete();

        return redirect()->back();

    }

    public function viewinsertflower(){
        $category = Category::all();

        return view('insertnewflower', ['category' => $category]);

    }

    public function viewmanagecategory(){
        $category = Category::all();

        return view('viewmanagecategory', ['category' => $category]);
    }

    public function viewupdatecategory($id){
        $category = Category::find($id);

        return view('viewupdatecategory', ['category' => $category]);
    }

    public function categorydelete($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->back();

    }

    public function viewchangepassword(){

        return view('viewchangepassword');
    }

    public function addcart(Request $req){
        $flower = Flower::find($req->flowerid);

        if(!Cart::where('flower_id','=',$req->flowerid)->where('users_id','=', Auth::user()->id)->first()){
            $cart = new Cart();

            $cart->users_id = Auth::user()->id;
            $cart->flower_id = $req->flowerid;
            $cart->quantity = $req->flower_qty;
            $cart->sub_price = $req->flower_qty * $flower->flower_price;

            $cart->save();
        }
        else{
            Cart::where('flower_id','=',$req->flowerid)->where('users_id','=', Auth::user()->id)->update([
                'quantity' => $req->flower_qty,
                'sub_price' => $req->flower_qty * $flower->flower_price,
            ]);
        }


        return redirect('/');

    }

    public function viewcart(){
        $cart = Cart::where('users_id','=', Auth::user()->id)->get();

        return view('viewcart', ['cart' => $cart]);

    }

    public function cartupdate(Request $req){
        $cart = Cart::find($req->cartid);
        $flowerid = $cart->flower_id;
        $flower = Flower::find($flowerid);

        if($req->quantity > 0){
            Cart::where('id','=', $req->cartid)->update([
                'quantity' => $req->quantity,
                'sub_price' => $flower->flower_price * $req->quantity,

            ]);
        }
        else{
            $cart->delete();
        }

        return redirect()->back();
    }

    public function checkout(){
        $cart = Cart::where('users_id','=', Auth::user()->id)->get();

        $totalprice = 0;

        foreach($cart as $c){
            $totalprice += $c->sub_price;
        }

        $header = new Header();

        $header->users_id = Auth::user()->id;
        $header->total_price = $totalprice;

        $header->save();

        $headerbaru = Header::where('users_id','=', Auth::user()->id)->latest('created_at')->first();
        $headerid = $headerbaru->id;

        foreach($cart as $c){
            $detail = new Detail();

            $detail->header_id = $headerid;
            $detail->flower_id = $c->flower_id;
            $detail->quantity = $c->quantity;

            $detail->save();

            $c->delete();
        }

        return redirect()->back();
    }

    public function viewhistory(){
        $header = Header::where('users_id','=', Auth::user()->id)->get();

        return view('viewhistory', ['header' => $header]);

    }

    public function viewdetailhistory($id){
        $header = Header::find($id);
        $detail = Detail::where('header_id','=', $id)->get();

        return view('viewhistorydetail', ['header' => $header, 'detail' => $detail]);

    }

    public function insertflower(Request $req){


        if($req->hasFile('flowerpic'))
        {
            $file = $req->flowerpic;
            $flowerimg = $file->getClientOriginalName();
            $req->file('flowerpic')->move('picture/', $file->getClientOriginalName());
        }

        $req->validate([
            'flowername' => 'required|min:5|unique:flower,flower_name',
            'flowerdesc' => 'required|min:20',
            'flowerprice' => 'required|integer|gte:50000',
            'categoryid' => 'required',
        ]);

        $flower = new Flower();

        $flower->flower_price = $req->flowerprice;
        $flower->flower_name = $req->flowername;
        $flower->category_id = $req->categoryid;
        $flower->flower_desc = $req->flowerdesc;
        $flower->flower_pic = $flowerimg;

        $flower->save();

        return redirect('/');

    }

    public function updatecategory(Request $req){
        if($req->hasFile('photo'))
        {
            $file = $req->photo;
            $categoryimg = $file->getClientOriginalName();
            $req->file('photo')->move('picture/', $file->getClientOriginalName());
        }

        $req->validate([
            'category_name' => 'required|min:5|unique:category',
        ]);

        Category::find($req->categoryid)->update([
            'category_name' => $req->category_name,
            'category_pic' => $categoryimg,
        ]);

        return redirect()->back();
    }

    public function updateflower(Request $req){
        if($req->hasFile('photo'))
        {
            $file = $req->photo;
            $flowerimg = $file->getClientOriginalName();
            $req->file('photo')->move('picture/', $file->getClientOriginalName());
        }

        $req->validate([
            'flower_name' => 'required|min:5|unique:flower',
            'flower_desc' => 'required|min:20',
            'flower_price' => 'required|integer|gte:50000',
            'categoryid' => 'required'
        ]);

        Flower::find($req->flowerid)->update([
            'flower_name' => $req->flower_name,
            'flower_pic' => $flowerimg,
            'flower_desc' => $req->flower_desc,
            'flower_price' => $req->flower_price,
            'category_id' => $req->categoryid
        ]);

        return redirect()->back();


    }

    public function updatepassword(Request $req){
        $user = User::find(Auth::user()->id);

        if(Hash::check($req->oldpassword, $user->password)){
            $req->validate([
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8'
            ]);

            User::where('id', '=', Auth::user()->id)->update([
                'password' => bcrypt($req->password),
            ]);

        }
        else{
            return Redirect::back()->withErrors(['Your password is wrong']);
       }

       return redirect()->back();
    }
}
