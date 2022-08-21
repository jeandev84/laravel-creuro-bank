<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
*/
class Parking extends Model
{

      use HasFactory;

      const PerPage = 8;

      protected $table = 'parkings';


      protected $fillable = [
         'city', 'address_parking'
      ];
}
