<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model {

    /**
     * @var array
     * Fillable field dor a flyer
     */

    protected $fillable = [

        'street',
        'city',
        'state',
        'country',
        'zip',
        'price',
        'description',

    ];

    /**
     * @param string $zip
     * @param string $street
     * @return mixed
     */

    public static function locatedAt($zip, $street)
    {

        $street = str_replace('-', ' ', $street);

        return static::where(compact('zip', 'street'))->firstOrFail();
    }

    /**
     * @param $price
     * @return string
     */

    public function getPriceAttribute($price)
    {

        return '$ ' . number_format($price);
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
     * A flyer is composed of many photos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {

        return $this->hasMany('App\Photo');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function owner(){

        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Determine if the given user created the flyer.
     *
     * @param User $user
     * @return bool
     */
    public function ownedBy(User $user){

        return $this->id == $user->user_id;
    }
    

}
