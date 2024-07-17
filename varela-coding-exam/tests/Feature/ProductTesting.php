<?php


namespace Tests\Feature;

use App\Models\Products;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class ProductsTesting extends TestCase{

    public function testCreateProd()
    {
        $file = UploadedFile::fake()->image("product.jpg");

        $response = $this->post('/products' , [
            'prodID' => 'PROD001',
            'prodImg' => $file,
            'prodName' => 'Test Product',
            'prodDesc' => 'Description of the test product',
            'prodPrice' => 100,
        ]);

        $response->assertRedirect('/admin-dashboard');

        $this->assertDatabaseHas('products', [
            'prodID' => 'PROD001',
            'prodName' => 'Test Product',
        ]);

        $prodID = Products::where('prodID', 'PROD001')->first()->prodID;
        $cacheKey = 'product_' . $prodID;
        $this->assertTrue(Cache::has($cacheKey));
    }

    public function tearDown(): void
    {
        Products::where('prodID', 'PROD001')->delete();
        parent::tearDown();
    }
}