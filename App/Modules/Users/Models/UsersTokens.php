<?php
namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersTokens extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'user_id',
        'expires_date'
    ];
}
?>
