<?php
namespace App\Modules\Essays\Repositories\EssaysRepository;

use App\Modules\Essays\Dtos\ICorrectionEssayDTO;
use App\Modules\Essays\Dtos\ICreateEssayDTO;
use App\Modules\essays\Models\Essay;
use Illuminate\Database\Eloquent\Collection;

interface IEssaysRepository{
 function create(ICreateEssayDTO $data): Essay;
 function list(): Collection;
 function correctionEssay(Essay $entity): Void;
}
