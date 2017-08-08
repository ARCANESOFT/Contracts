<?php namespace Arcanesoft\Contracts\Auth\Models;

/**
 * Interface  PermissionsGroup
 *
 * @package   Arcanesoft\Contracts\Auth\Models
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  int             id
 * @property  string          name
 * @property  string          slug
 * @property  string          description
 * @property  \Carbon\Carbon  created_at
 * @property  \Carbon\Carbon  updated_at
 *
 * @property  \Illuminate\Database\Eloquent\Collection  permissions
 */
interface PermissionsGroup extends Model
{
    /* -----------------------------------------------------------------
     |  Relationships
     | -----------------------------------------------------------------
     */

    /**
     * Permissions Groups has many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions();

    /* -----------------------------------------------------------------
     |  CRUD Functions
     | -----------------------------------------------------------------
     */

    /**
     * Create and attach a permission.
     *
     * @param  array  $attributes
     * @param  bool   $reload
     */
    public function createPermission(array $attributes, $reload = true);

    /**
     * Attach the permission to a group.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Permission  $permission
     * @param  bool                                          $reload
     */
    public function attachPermission(&$permission, $reload = true);

    /**
     * Attach the permission by id to a group.
     *
     * @param  int   $id
     * @param  bool  $reload
     *
     * @return \Arcanesoft\Contracts\Auth\Models\Permission
     */
    public function attachPermissionById($id, $reload = true);

    /**
     * Attach a collection of permissions to the group.
     *
     * @param  \Illuminate\Database\Eloquent\Collection|array  $permissions
     * @param  bool                                            $reload
     *
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function attachPermissions($permissions, $reload = true);

    /**
     * Attach the permission from a group.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Permission  $permission
     * @param  bool                                          $reload
     */
    public function detachPermission(&$permission, $reload = true);

    /**
     * Attach the permission by id to a group.
     *
     * @param  int   $id
     * @param  bool  $reload
     *
     * @return \Arcanesoft\Contracts\Auth\Models\Permission
     */
    public function detachPermissionById($id, $reload = true);

    /**
     * Detach multiple permissions by ids.
     *
     * @param  array  $ids
     * @param  bool   $reload
     *
     * @return int
     */
    public function detachPermissions(array $ids, $reload = true);

    /**
     * Detach all permissions from the group.
     *
     * @param  bool  $reload
     *
     * @return int
     */
    public function detachAllPermissions($reload = true);

    /* -----------------------------------------------------------------
     |  Check Functions
     | -----------------------------------------------------------------
     */

    /**
     * Check if group has the given permission (Permission Model or Id).
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\Permission|int  $id
     *
     * @return bool
     */
    public function hasPermission($id);
}
