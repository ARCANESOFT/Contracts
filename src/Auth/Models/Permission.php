<?php namespace Arcanesoft\Contracts\Auth\Models;

/**
 * Interface  Permission
 *
 * @package   Arcanesoft\Contracts\Auth\Models
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Permission
{
    /* ------------------------------------------------------------------------------------------------
     |  Relationships
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Permission belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();

    /* ------------------------------------------------------------------------------------------------
     |  Role CRUD Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Attach a role to a user.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Role|int  $role
     * @param  bool                                        $reload
     */
    public function attachRole($role, $reload = true);

    /**
     * Detach a role from a user.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Role|int  $role
     * @param  bool                                        $reload
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
     |  Check Functions
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
     * Check if user has a role by its slug.
     *
     * @param  string  $slug
     *
     * @return bool
     */
    public function is($slug);

    /**
     * Check if the permission has at least one role.
     *
     * @param  array  $roles
     * @param  array  &$failedRoles
     *
     * @return bool
     */
    public function isOne(array $roles, array &$failedRoles = []);

    /**
     * Check if the permission has all roles.
     *
     * @param  array  $roles
     * @param  array  &$failedRoles
     *
     * @return bool
     */
    public function isAll(array $roles, array &$failedRoles = []);
}
