<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    protected $fillable = ['id_usuario', 'titulo', 'link'];


	public function usuario()
	{
		return $this->belongsTo('App\User', 'id_usuario');
	}
}
