<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable=['judul' , 'slug' , 'deskripsi' , 'foto' , 'user_id' , 'kategori_id'];
    public $timestamps = true;

    public function kategori()
    {
        // data Model 'Artikel' bisa dimiliki oleh Nodel 'User'
        // melalui 'kategori_id'
        return $this->belongsTo('App\Kategori' , 'user_id');

    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tag()
    {
        // model 'Tag' Memiliki relasi many to many
        // terhadap model 'Artikel' yg terhubung oleh
        // table 'artikel tag' masing masing sebagai 'artikel_id' dan
        // 'tag_id'
        return $this->belongsToMany('App\Tag', 'artikel_tag' , 'artikel_id' , 'tag_id');
    }
}
