<?php
namespace App\Modules\Essays\UseCases\CreateEssayCorrection;

use App\Modules\essays\Models\Essay;
use App\Modules\Essays\Repositories\EssaysRepository\Implementations\EssaysRepository;

class CreateEssayCorrectionUseCase {
    private $essaysRepository;

    public function __construct(
        EssaysRepository $essaysRepository
    )
    {
        $this->essaysRepository = $essaysRepository;
    }

    public function execute(IRequest $request): Essay {
        $essay = $this->essaysRepository->getEssayById($request->essay_id);

        $essay->teacher_id = $request->teacher_id;
        $essay->essay_correction = $request->essay_correction;
        $essay->confirmed = $request->confirmed;

        $this->essaysRepository->correctionEssay($essay);

        return $essay;
    }
}
