<?php namespace Arcanesoft\Contracts\Auth\Models;

/**
 * Interface  Model
 *
 * @package   Arcanesoft\Contracts\Auth\Models
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
interface Model
{
    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     */
    public function getKey();
}
