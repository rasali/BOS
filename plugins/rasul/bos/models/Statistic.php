<?php namespace Rasul\Bos\Models;

use Model;

/**
 * Model
 */
class Statistic extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'rasul_bos_statistics';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
