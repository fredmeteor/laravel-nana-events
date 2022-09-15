<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
//use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bio',
        'email',
        'first_name',
        'last_name',
        'timezone',
        'title',
        'zip'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];




    /**
     * Accessors and Mutators
     *
     */

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getTimezoneAbbreviationAttribute()
    {
        return Carbon::now($this->timezone)->format('T');
    }


      /**
     * Relationships
     *
     */

    /**
     * Each user resides in a U.S. state
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state() {
        return $this->belongsTo('App\State');
    }

    /**
     * A user can host multiple events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hostedEvents() {
        return $this->hasMany('App\Event')->withoutGlobalScopes();
    }

    /**
     * A user can favorite multiple events
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favoriteEvents()
    {
        return $this->belongsToMany('App\Event', 'favorite_events');
    }

    public function upcomingEvents() {
        return $this->belongsToMany('App\Event', 'tickets')
            ->withPivot('approved', 'approved_at')
            ->whereNull('tickets.deleted_at')
            ->withTimestamps();
    }

    /**
     * Instance Methods
     *
     *
     */

    /**
     * Has the user favorited a particular event?
     *
     * @param $eventID
     *
     * @return bool
     */
    public function favoritedEvent($eventID) {

        return $this->favoriteEvents()->where('event_id', $eventID)->count() == 1;

    }

    public function isOrganizer($event)
    {
        return $this->id == $event->user_id;
    }

    public function isAttending($event)
    {
        return $this->upcomingEvents()->where('event_id', $event->id)->whereNull('tickets.deleted_at')->exists();
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
