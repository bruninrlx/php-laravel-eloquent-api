<?php
namespace App\Modules\Essays\UseCases\CreateEssay;

use App\Modules\Essays\Dtos\ICreateEssayDTO;
use App\Modules\essays\Models\Essay;
use App\Modules\Essays\Repositories\EssaysRepository\implementations\EssaysRepository;
use App\Modules\Essays\UseCases\CreateEssay\ValidationRequest;

class CreateEssayUseCase {

  private $essaysRepository;

  function __construct(
      EssaysRepository $essaysRepository
  )
  {
      $this->essaysRepository = $essaysRepository;
  }

  public function execute(ValidationRequest $request): Essay{
    $essay = $request->essay;
    $essay_correction = $request->essay_correction;
    $teacher_id = $request->teacher_id;
    $student_id = $request->student_id;
    $confirmed = $request->confirmed;

    $essay = new ICreateEssayDTO([
      'essay'=>$essay,
      'essay_correction'=>$essay_correction,
      'teacher_id'=>$teacher_id,
      'student_id'=>$student_id,
      'confirmed'=>$confirmed
    ]);

    $essayCreated = $this->essaysRepository->create($essay);

    return $essayCreated;
  }
}
