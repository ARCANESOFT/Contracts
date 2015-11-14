<?php namespace Arcanesoft\Contracts\Auth\Models;

/**
 * Interface  User
 *
 * @package   Arcanesoft\Contracts\Auth\Models
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface User
{
    /* ------------------------------------------------------------------------------------------------
    |  Relationships
    | ------------------------------------------------------------------------------------------------
    */
    /**
     * User belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();

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
     |  Role CRUD Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Attach a role to a user.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Role|int $role
     * @param  bool                                       $reload
     */
    public function attachRole($role, $reload = true);

    /**
     * Detach a role from a user.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Role|int $role
     * @param  bool                                       $reload
     *
     * @return int
     */
    public function detachRole($role, $reload = true);

    /**
     * Detach all roles from a user.
     *
     * @param  bool  $reload
     *
     * @return int
     */
    public function detachAllRoles($reload = true);

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
     * Check if user has an activated account.
     *
     * @return bool
     */
    public function isActive();

    /**
     * Check if user has a confirmed account.
     *
     * @return bool
     */
    public function isConfirmed();

    /**
     * Activate the user.
     *
     * @return bool
     */
    public function activate();

    /**
     * Deactivate the user.
     *
     * @return bool
     */
    public function deactivate();

    /* ------------------------------------------------------------------------------------------------
     |  Role Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if user has the given role (Role Model or Id).
     *
     * @param  mixed  $id
     *
     * @return bool
     */
    public function hasRole($id);

    /**
     * Check if has a role by its slug.
     *
     * @param  string  $slug
     *
     * @return bool
     */
    public function is($slug);

    /**
     * Check if has at least one role.
     *
     * @param  array  $roles
     * @param  array  &$failedRoles
     *
     * @return bool
     */
    public function isOne(array $roles, array &$failedRoles = []);

    /**
     * Check if has all roles.
     *
     * @param  array  $roles
     * @param  array  &$failedRoles
     *
     * @return bool
     */
    public function isAll(array $roles, array &$failedRoles = []);

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
