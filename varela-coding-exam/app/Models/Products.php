<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

        // In your Products model
        protected $guarded = [];
        protected $fillable =[];
        
        public function getImageAttribute(){
            return base64_encode($this->attributes['product_image']);
        }
}
