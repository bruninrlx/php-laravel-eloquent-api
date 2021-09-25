<?php

namespace App\Modules\Essays\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class ICreateEssayDTO extends DataTransferObject {
   public ?int $id;
   public string $essay;
   public ?string $essay_correction;
   public ?int $teacher_id;
   public int $student_id;
   public ?bool $confirmed;
}
