<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'total'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
        'registered' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function billingAddress()
    {
        return $this->hasOne('App\Address');
    }

    public function shippingAddress()
    {
        return $this->hasOne('App\Address');
    }

    public function paymentMethod()
    {
        return $this->hasOne('App\PaymentMethod');
    }

    /**
     * The products that belong to the order.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'orders_products')->withPivot('id', 'quantity');
    }
}
