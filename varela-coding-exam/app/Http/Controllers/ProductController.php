<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    //Add Product to the DB

    public function store(Request $request){
        //Validation of the data
        $validated = $request->validate([
            'prodID' => 'required',
            'prodImg' => 'required|image|mimes:jpeg,png,jpg',
            'prodName' => 'required',
            'prodDesc' => 'required',
            'prodPrice' => 'required',
        ]);

        //Handling the file/img upload

        if($request->hasFile('prodImg') && $request->file('prodImg')->isValid()){
            $file = $request->file('prodImg');

            if (is_file($file->getPathname())){
                $validated['prodImg'] = file_get_contents($file->getRealPath());
            }else{
                return redirect()->back()->with('error', 'Invalid File.');
            }
        }else{
            return redirect()->back()-with('error', 'Invalid File Upload');
        }

        //Creating the product

        try{
            Products::create($validated);
        }catch(\Exception $e){
            //Log the Error Message for debugging
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Product creation failed.');
        }
        
        return redirect('/admin-dashboard');
        
    }

    public function dashboard(){
        $products = Products::paginate(5);
        
        return view("Admin.admin-products", [
            'products' => $products,
        ]);
    }
}
