<?php namespace Arcanesoft\Contracts\Auth\Models;

use Arcanesoft\Contracts\Auth\Traits\Roleable;
use Arcanesoft\Contracts\Traits\Activatable;
use Arcanesoft\Contracts\Traits\SoftDeletes;

/**
 * Interface  User
 *
 * @package   Arcanesoft\Contracts\Auth\Models
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  int             id
 * @property  string          username
 * @property  string          first_name
 * @property  string          last_name
 * @property  string          full_name
 * @property  string          email
 * @property  string          password
 * @property  string          remember_token
 * @property  bool            is_admin
 * @property  bool            is_active
 * @property  bool            is_confirmed       (Optional)
 * @property  string          confirmation_code  (Optional)
 * @property  \Carbon\Carbon  confirmed_at       (Optional)
 * @property  \Carbon\Carbon  created_at
 * @property  \Carbon\Carbon  updated_at
 * @property  \Carbon\Carbon  deleted_at
 *
 * @property  \Illuminate\Database\Eloquent\Collection  permissions
 */
interface User extends Activatable, Roleable, Model, SoftDeletes
{
    /* -----------------------------------------------------------------
     |  Check Methods
     | -----------------------------------------------------------------
     */

    /**
     * Check if user is an administrator.
     *
     * @return bool
     */
    public function isAdmin();

    /**
     * Check if user is a moderator.
     *
     * @return bool
     */
    public function isModerator();

    /**
     * Check if user is a member.
     *
     * @return bool
     */
    public function isMember();

    /**
     * Check if user can be impersonated.
     *
     * @return bool
     */
    public function canBeImpersonated();

    /* -----------------------------------------------------------------
     |  Permission Check Methods
     | -----------------------------------------------------------------
     */

    /**
     * Check if has a permission.
     *
     * @param  string  $slug
     *
     * @return bool
     */
    public function may($slug);

    /**
     * Check if has at least one permission.
     *
     * @param  \Illuminate\Support\Collection|array  $permissions
     * @param  \Illuminate\Support\Collection        &$failed
     *
     * @return bool
     */
    public function mayOne($permissions, &$failed = null);

    /**
     * Check if has all permissions.
     *
     * @param  \Illuminate\Support\Collection|array  $permissions
     * @param  \Illuminate\Support\Collection        &$failed
     *
     * @return bool
     */
    public function mayAll($permissions, &$failed = null);
}
