<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Transaction",
 *      required={"transaction_number", "customer_id", "shop_id", "status"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="transaction_number",
 *          description="transaction_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="customer_id",
 *          description="customer_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="shop_id",
 *          description="shop_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="grand_total",
 *          description="grand_total",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="payment_img",
 *          description="payment_img",
 *          type="string",
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
class Transaction extends Model
{

    public $table = 'transactions';
    
    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['customer', 'seller', 'package', 'status'];



    public $fillable = [
        'transaction_number',
        'customer_id',
        'shop_id',
        'grand_total',
        'package_id',
        'status_id',
        'payment_img',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaction_number' => 'string',
        'customer_id' => 'integer',
        'shop_id' => 'integer',
        'grand_total' => 'integer',
        'package_id' => 'integer',
        'status_id' => 'integer',
        'payment_img' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transaction_number' => 'required',
        'customer_id' => 'required',
        'shop_id' => 'required',
        'grand_total' => 'numeric',
        'package_id' => 'required',
        'status_id' => 'required',
        'payment_img' => '',
    ];

    /**
     * Get the customer data in user table.
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id');
    }

    /**
     * Get the seller data in user table.
     */
    public function seller()
    {
        return $this->belongsTo('App\Models\User', 'shop_id');
    }

    /**
     * Get the package data in package table.
     */
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }

    /**
     * Get the status data in package table.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\TransactionStatus');
    }

    /**
     * Get the license record associated with the transaction.
     */
    public function license()
    {
        return $this->hasMany('App\Models\License', 'sold_in');
    }
}
