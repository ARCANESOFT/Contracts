<?php namespace Arcanesoft\Contracts\Auth\Models;

/**
 * Interface  Role
 *
 * @package   Arcanesoft\Contracts\Auth\Models
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Role
{
    /* ------------------------------------------------------------------------------------------------
     |  Relationships
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Role belongs to many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users();

    /**
     * Role belongs to many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions();

    /* ------------------------------------------------------------------------------------------------
     |  CRUD Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Attach a permission to a role.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\User|int  $user
     * @param  bool                                    $reload
     */
    public function attachUser($user, $reload = true);

    /**
     * Detach a user from a role.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\User|int  $user
     * @param  bool                                    $reload
     *
     * @return int
     */
    public function detachUser($user, $reload = true);

    /**
     * Detach all users from a role.
     *
     * @param  bool  $reload
     *
     * @return int
     */
    public function detachAllUsers($reload = true);

    /**
     * Check if role has the given user (User Model or Id).
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\User|int  $id
     *
     * @return bool
     */
    public function hasUser($id);

    /**
     * Attach a permission to a role.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Permission|int  $permission
     * @param  bool                                          $reload
     */
    public function attachPermission($permission, $reload = true);

    /**
     * Detach a permission from a role.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Permission|int  $permission
     * @param  bool                                              $reload
     *
     * @return int
     */
    public function detachPermission($permission, $reload = true);

    /**
     * Detach all permissions from a role.
     *
     * @param  bool  $reload
     *
     * @return int
     */
    public function detachAllPermissions($reload = true);

    /**
     * Check if role has the given permission (Permission Model or Id).
     *
     * @param  mixed  $id
     *
     * @return bool
     */
    public function hasPermission($id);

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if role is associated with a permission by slug.
     *
     * @param  string  $slug
     *
     * @return bool
     */
    public function can($slug);

    /**
     * Check if a role is associated with any of given permissions.
     *
     * @param  array  $permissions
     * @param  array  &$failedPermissions
     *
     * @return bool
     */
    public function canAny(array $permissions, array &$failedPermissions = []);

    /**
     * Check if role is associated with all given permissions.
     *
     * @param  array  $permissions
     * @param  array  &$failedPermissions
     *
     * @return bool
     */
    public function canAll(array $permissions, array &$failedPermissions = []);
}
