<?php
namespace App\Modules\Essays\UseCases\CreateEssayCorrection;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

final class IRequest extends DataTransferObject {
    public int $essay_id;
    public string $essay_correction;
    public int $teacher_id;
    public bool $confirmed;

    public static function fromRequest(Request $request, $essayId): IRequest {
       return new Static([
          'essay_id'=>$essayId,
          'essay_correction'=>$request->input('essay_correction'),
          'teacher_id'=>$request->input('teacher_id'),
          'confirmed'=>$request->input('confirmed')
       ]);
    }
}
