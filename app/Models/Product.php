<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; 
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Atributo stockLabel
    protected function stockLabel(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->attributes['stock'] >= $this->attributes['stock_minimo'] 
                    ? '<span class="badge badge-pill badge-success">'.$this->attributes['stock'].'</span>' 
                    : '<span class="badge badge-pill badge-danger">'.$this->attributes['stock'].'</span>';
            }
        );
    }

    protected function precio(): Attribute
    {
        return Attribute::make(
            get: function () {
                return '<b>' . number_format($this->attributes['precio_venta'], 0, ',', '.') . ' €</b>';
            }
        );
    }
    

    protected function activeLabel(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->attributes['active']
                    ? '<span class="badge badge-success">Activo</span>' 
                    : '<span class="badge badge-danger">Inactivo</span>';
            }
        );
    }

    protected function imagen(): Attribute
    {
        //dd(Storage::url('public/'.$this->image->url));
        return Attribute::make(
            get: function () {
                return $this->image ? Storage::url('public/'.$this->image->url) : 
                 asset('no_imagen.png'); 

            }
        );
    }


}

