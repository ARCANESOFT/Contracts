<?php namespace Arcanesoft\Contracts\Auth\Models;

use Arcanesoft\Contracts\Auth\Bases\Roleable;
use Arcanesoft\Contracts\Traits\Activatable;

/**
 * Interface  User
 *
 * @package   Arcanesoft\Contracts\Auth\Models
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  int                                       id
 * @property  string                                    username
 * @property  string                                    first_name
 * @property  string                                    last_name
 * @property  string                                    full_name
 * @property  string                                    email
 * @property  string                                    password
 * @property  string                                    remember_token
 * @property  bool                                      is_admin
 * @property  bool                                      is_active
 * @property  bool                                      is_confirmed       (Optional)
 * @property  string                                    confirmation_code  (Optional)
 * @property  \Carbon\Carbon                            confirmed_at       (Optional)
 * @property  \Carbon\Carbon                            created_at
 * @property  \Carbon\Carbon                            updated_at
 * @property  \Carbon\Carbon                            deleted_at
 * @property  \Illuminate\Database\Eloquent\Collection  permissions
 *
 * @method  static  bool                                   insert(array $values)
 * @method          \Illuminate\Database\Eloquent\Builder  unconfirmed(string $code)
 */
interface User extends Activatable, Roleable
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters and Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Set a given attribute on the user model.
     *
     * @param  string  $key
     * @param  mixed   $value
     *
     * @return \Arcanesoft\Contracts\Auth\Models\User
     */
    public function setAttribute($key, $value);

    /* ------------------------------------------------------------------------------------------------
     |  User CRUD Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Save the user model to the database.
     *
     * @param  array  $options
     *
     * @return bool
     */
    public function save(array $options = []);

    /* ------------------------------------------------------------------------------------------------
     |  User Check Functions
     | ------------------------------------------------------------------------------------------------
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
     * Check if user has a confirmed account.
     *
     * @return bool
     */
    public function isConfirmed();

    /* ------------------------------------------------------------------------------------------------
     |  Permission Check Functions
     | ------------------------------------------------------------------------------------------------
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
     * @param  array  $permissions
     * @param  array  $failedPermissions
     *
     * @return bool
     */
    public function mayOne(array $permissions, array &$failedPermissions = []);

    /**
     * Check if has all permissions.
     *
     * @param  array  $permissions
     * @param  array  $failedPermissions
     *
     * @return bool
     */
    public function mayAll(array $permissions, array &$failedPermissions = []);
}
