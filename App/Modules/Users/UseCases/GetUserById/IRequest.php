<?php
namespace App\Modules\Users\UseCases\GetUserById;

use Illuminate\Http\Client\Request;
use Spatie\DataTransferObject\DataTransferObject;

class IRequest extends DataTransferObject{
    public int $id;
    public static function fromRequest($id): IRequest{
        return new static([
            'id'=>$id,
        ]);
    }
}
