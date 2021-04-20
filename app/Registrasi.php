<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Registrasi extends Model
{
    use AutoNumberTrait;

    protected $table = 'registrasi';
    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'no_reg' => [
                'format' => 'REG?',
                'length' => 4
            ]
        ];
    }
}
