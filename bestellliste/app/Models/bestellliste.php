<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bestellliste extends Model
{
    use HasFactory;

    //protected $fillable = [
    //    'artikel',
    //    'beschreibung',
    //    'bestellt',
    //    'user_id'
    //];

   protected $guarded = []; // hinzugefügt

   public function user()
   {
    return $this->belongsTo(Users::class);
   }
}
