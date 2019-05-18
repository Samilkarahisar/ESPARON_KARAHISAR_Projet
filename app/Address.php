<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    protected $table = 'addresses';

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
        'first_name', 'last_name', 'street_1', 'street_2', 'street_3', 'zip_code', 'city', 'country'
    ];

    /**
     * Get the user that owns the address.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}