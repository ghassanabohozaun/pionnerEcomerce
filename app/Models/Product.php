<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use SoftDeletes, HasFactory, HasTranslations;
    protected $table = 'products';
    protected $fillable = ['name', 'small_desc', 'desc', 'status', 'sku', 'available_for', 'views', 'has_variants', 'price',
                            'has_discount', 'discount', 'start_discount', 'end_discount', 'manage_stock', 'quantity', 'available_in_stock', 'category_id', 'brand_id'];

    // translatable
    public array $translatable = ['name', 'small_desc', 'desc'];

    // relations
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productPreivews()
    {
        return $this->hasMany(productPreview::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(productImage::class, 'product_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    // function
    public function isSimple()
    {
        return !$this->has_variants;
    }

    //accessories

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }
}
