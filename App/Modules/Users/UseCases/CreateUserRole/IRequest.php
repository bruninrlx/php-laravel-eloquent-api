<?php
namespace App\Modules\Users\UseCases\CreateUserRole;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class IRequest extends DataTransferObject{

    public string $name;

    public static function fromRequest(Request $request): IRequest{

        return new static([
            'name'=>$request->input('name')
        ]);
    }
}
