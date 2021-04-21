<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catégorie extends Model 
{
    protected $fillable = [
        'label','parent',
    ];

    public function __toHtml(){
        return ( $this->id ) ? '<a href="'.route('Catégorie_edit',$this->id).'" target="_blank">'.$this->__toString().'</a>' : "";
    }

    
    public function getlabel(){ return $this->label; }
    public function getparent(){ return $this->parent; }

}
