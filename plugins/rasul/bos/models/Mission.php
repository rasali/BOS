<?php namespace Rasul\Bos\Models;

use Model;

/**
 * Model
 */
class Mission extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'rasul_bos_missions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'icon' => 'System\Models\File',
    ];

}
