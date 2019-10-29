<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="License",
 *      required={"license_key", "sold_in", "user_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="license_key",
 *          description="license_key",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sold_in",
 *          description="sold_in",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class License extends Model
{

    public $table = 'licenses';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user', 'transaction'];

    public $fillable = [
        'license_key',
        'sold_in',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'license_key' => 'string',
        'sold_in' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'license_key' => 'required',
        'sold_in' => 'required',
        'user_id' => 'required'
    ];
    
    /**
     * Get the user of license.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the user of license.
     */
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction', 'sold_in');
    }
    
}
