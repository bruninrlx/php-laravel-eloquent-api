<?php
namespace App\Modules\Essays\Repositories\EssaysRepository\Implementations;

use App\Modules\Essays\Dtos\ICorrectionEssayDTO;
use App\Modules\Essays\Dtos\ICreateEssayDTO;
use App\Modules\essays\Models\Essay;
use App\Modules\Essays\Repositories\EssaysRepository\IEssaysRepository;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Void_;

class EssaysRepository implements IEssaysRepository{

  function create(ICreateEssayDTO $data): Essay {
    return Essay::create([
			'essay'=>$data->essay,
			'essay_correction'=>$data->essay_correction,
			'teacher_id'=>$data->teacher_id,
			'student_id'=>$data->student_id,
			'confirmed'=>$data->confirmed
    ]);
  }

  function list(): Collection {
    return Essay::all();
  }

  function getEssayById(int $id): Essay {
    return Essay::find($id);
  }

  function correctionEssay(Essay $entity): void {
    $entity->save();
  }
}

