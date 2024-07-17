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

    //Pagination View of products
    public function dashboard(){
        $products = Products::paginate(5);
        
        return view("Admin.admin-products", [
            'products' => $products,
        ]);
    }

    //Viewing of per products

    public function viewProduct($prodID) {
        $product = Products::where('prodID', $prodID)->first();
    
        return view('Admin.admin-updateprod', ['product' => $product]);
    }

    //Updating the product

    public function editProd(Request $request, $prodID){
        // Validate the incoming request data
        $request->validate([
            'prodID' => 'required',
            'prodName' => 'required|string|max:255',
            'prodDesc' => 'required|string|max:255',
            'prodPrice' => 'required|numeric|min:0',
            'prodImg' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate image file
        ]);
    
        // Find the product by prodID
        $product = Products::where('prodID', $prodID)->first();
    
        // Handle case where product is not found
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        // Update the product information
        $product->prodID = $request->input('prodID');
        $product->prodName = $request->input('prodName');
        $product->prodDesc = $request->input('prodDesc');
        $product->prodPrice = $request->input('prodPrice');
    
        // Handle product image update if a new image file is uploaded
        if ($request->hasFile('prodImg') && $request->file('prodImg')->isValid()) {
    
            // Store new image
            $image = $request->file('prodImg');
            $imageData = file_get_contents($image->getRealPath());
            $product->prodImg = $imageData;
        }
    
        // Save the updated product to the database
        $product->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Product updated successfully');
    }
    

    //Delete the Product
    
    public function deleteProd($prodID){
        $product = Products::where('prodID', $prodID)->first();
        $product->delete();

        return redirect('/admin-dashboard');
    }
    
}
