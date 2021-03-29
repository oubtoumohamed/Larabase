<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    protected $fillable = [
        'title','price','date',
    ];

    public function __toHtml(){
        return ( $this->id ) ? '<a href="'.route('product_edit',$this->id).'" target="_blank">'.$this->__toString().'</a>' : "";
    }

    
    public function gettitle(){ return $this->title; }
    public function getprice(){ return $this->price; }
    public function getdate(){ return $this->date; }

}
