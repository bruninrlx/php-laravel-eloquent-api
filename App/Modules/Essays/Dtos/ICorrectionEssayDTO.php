<?php

namespace App\Modules\Essays\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class ICorrectionEssayDTO extends DataTransferObject{
    public string $essay_correction;
    public int $id;
    public bool $confirmed;
}
