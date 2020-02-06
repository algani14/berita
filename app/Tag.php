<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['nama' , 'slug'];
    public $timestamps = true;


    public function artikel()
    {
        // model 'Tag' Memiliki relasi many to many
        // terhadap model 'Artikel' yg terhubung oleh
        // table 'artikel tag' masing masing sebagai 'artikel_id' dan
        // 'tag_id'
        return $this->belongToMany('App\Artikel', 'artikel_tag' , 'user_id');
    }
}
