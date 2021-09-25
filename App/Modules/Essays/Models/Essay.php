<?php
namespace App\Modules\essays\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'essay',
        'essay_correction',
        'teacher_id',
        'student_id',
        'confirmed',
    ];

    public function essay() {
        return $this->belongsTo('App\Models\Essay');
    }
}
?>
