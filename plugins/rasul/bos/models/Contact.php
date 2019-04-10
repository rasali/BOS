<?php namespace Rasul\Bos\Models;

use Model;

/**
 * Model
 */
class Contact extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'rasul_bos_contacts';


    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
