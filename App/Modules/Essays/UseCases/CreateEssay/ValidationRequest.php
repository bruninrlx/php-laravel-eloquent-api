<?php
namespace App\Modules\Essays\UseCases\CreateEssay;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class ValidationRequest extends DataTransferObject{
    public string $essay;
    public ?string $essay_correction;
    public ?int $teacher_id;
    public int $student_id;
    public ?bool $confirmed;

    public static function fromRequest(Request $request): ValidationRequest{
        $hasFile = $request->hasFile('file');

        if(!$hasFile){
            throw new NotFoundHttpException('Arquivo não encontrado');
        }

        $validFile = $request->file('file')->isValid();

        if(!$validFile){
            throw new BadRequestException('Você não escolheu nenhum arquivo');
        }

        $file = $request->file('file');

        $fileName = $file->getClientOriginalName();

        $request->file('file')->storeAs('essays', $fileName);
        $requestData = json_decode($request->input('data'), true);

        return new static([
            'essay'=>$fileName,
            'essay_correction'=>$requestData['essay_correction']??null,
            'teacher_id'=>$requestData['teacher_id']??null,
            'student_id'=>$requestData['student_id'],
            'confirmed'=>$requestData['confirmed']??null
        ]);
    }
}
