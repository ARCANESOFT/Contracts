<?php namespace Arcanesoft\Contracts\Auth\Traits;

/**
 * Interface  Roleable
 *
 * @package   Arcanesoft\Contracts\Auth\Bases
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  \Illuminate\Database\Eloquent\Collection  roles
 */
interface Roleable
{
    /* -----------------------------------------------------------------
     |  Relationships
     | -----------------------------------------------------------------
     */

    /**
     * Roles relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Attach a role.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Role|int  $role
     * @param  bool                                        $reload
     */
    public function attachRole($role, $reload = true);

    /**
     * Sync the roles by its slugs.
     *
     * @param  array|\Illuminate\Support\Collection  $slugs
     * @param  bool                                  $reload
     *
     * @return array
     */
    public function syncRoles($slugs, $reload = true);

    /**
     * Detach a role.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Role|int  $role
     * @param  bool                                        $reload
     *
     * @return int
     */
    public function detachRole($role, $reload = true);

    /**
     * Detach all roles.
     *
     * @param  bool  $reload
     *
     * @return int
     */
    public function detachAllRoles($reload = true);

    /* -----------------------------------------------------------------
     |  Check Methods
     | -----------------------------------------------------------------
     */

    /**
     * Check if has the given role (Role Model or Id).
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
    public function hasRoleSlug($slug);

    /**
     * Check if has at least one role.
     *
     * @param  \Illuminate\Support\Collection|array  $roles
     * @param  \Illuminate\Support\Collection        &$failed
     *
     * @return bool
     */
    public function isOne($roles, &$failed = null);

    /**
     * Check if has all roles.
     *
     * @param  \Illuminate\Support\Collection|array  $roles
     * @param  \Illuminate\Support\Collection        &$failed
     *
     * @return bool
     */
    public function isAll($roles, &$failed = null);
}
