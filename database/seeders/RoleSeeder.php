<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Add use lines
use Illuminate\Support\Str;
use Laravel\Prompts\Output\ConsoleOutput;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Helper\ProgressBar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $start = now();

        // Reset the cache of the Spaties' permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // All permissions that will be created by the seeder
        $seedPermissions = [
            'permission browse',
            'permission read',
            'permission edit',
            'permission add',
            'permission delete',

            'role browse',
            'role read',
            'role edit',
            'role add',
            'role delete',
            'role permission update',

            'user browse',
            'user read',
            'user edit',
            'user add',
            'user delete',

            'post browse',
            'post add',

            'post any read',
            'post any read unpublished',
            'post any edit',
            'post any delete',
            'post any publish',
            'post any restore',
            'post any trash',

            'post own read',
            'post own read unpublished',
            'post own edit',
            'post own delete',
            'post own publish',
            'post own restore',
            'post own trash',

            // New 2 more permissions
            'date-backup',
            'data-restore'
        ];

        // To display the progress bar
        $output = new ConsoleOutput();
        $progress = new ProgressBar($output, count($seedPermissions));
        $output->writeln("");
        $output->writeln('Seed Permissions');
        $progress->start();

        // Create the permissions one by one
        foreach ($seedPermissions as $newPermission) {

            // change the name (eg, "post own read" -> "post-own-read")
            $newPermission = Str::of($newPermission)->kebab();
            // If the permission has already existed, it will not be created
            $permission = Permission::firstOrCreate(['name' => $newPermission]);

            $progress->advance();
        }

        $progress->finish();
        $output->writeln('');

        $output->writeln('Create Roles with Permissions');
        $output->writeln(' ');

        // 5 counts progress bar, because of giving the permissions to the 5 roles
        $progress = new ProgressBar($output, 5);
        $output->writeln(" ");
        $output->writeln('Grant Permissions to Roles');
        $progress->start();

        /*
         * -----
         *  Create Super-Admin Role and Sync Permissions
         * -----
        */
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'super-user']);

        // All permissions
        $permissions = Permission::all();
        $roleSuperAdmin->syncPermissions($permissions);
        $progress->advance();

        /*
         * -----
         * Create Admin Role and Sync Permissions
         * -----
        */
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);

        // the permissions that admin role have ( fewer than super admin)
        $adminPermissions = [
            'permission browse',
            'permission read',
            'permission edit',
            'permission add',
            'permission delete',

            'role browse',
            'role read',
            'role edit',
            'role add',
            'role delete',

            'user browse',
            'user read',
            'user edit',
            'user add',
            'user delete',

            'post browse',
            'post any read',
            'post own read',
            'post any read unpublished',
            'post own read unpublished',
            'post any edit',
            'post own edit',
            'post add ',
            'post any delete',
            'post own delete',
            'post any publish',
            'post own publish',
            'post any restore',
            'post own restore',
            'post any trash',
            'post own trash',
        ];

        // change each name (eg, "post own read" -> "post-own-read")
        foreach ($adminPermissions as $key => $permission) {
            $adminPermissions[$key] = Str::of($permission)->kebab();
        }

        // Get the Permission Model from the database
        $permissionsCollection = Permission::whereIn('name', $adminPermissions)
            ->get()
            ->pluck('id', 'id');
        // giving the permissions to the admin role
        $roleAdmin->syncPermissions($permissionsCollection);
        $progress->advance();

        /*
         * -----
         * Create Staff Role and Sync Permissions
         * -----
         * */
        $roleStaff = Role::firstOrCreate(['name' => 'staff']);

        // These are the permissions that the staff role can have (fewer than Admin role)
        $staffPermissions = [
            'user browse',
            'user read',
            'user edit',
            'user add',
            'user delete',

            'permission browse',
            'permission read',

            'role browse',
            'role read',

            'post browse',
            'post add',

            'post any read',
            'post any read unpublished',
            'post any edit',
            'post any delete',
            'post any publish',
            'post any restore',
            'post any trash',

            'post own restore',
            'post own read',
            'post own read unpublished',
            'post own delete',
            'post own edit',
            'post own publish',
            'post own trash',
        ];

        foreach ($staffPermissions as $key => $permission) {
            $staffPermissions[$key] = Str::of($permission)->kebab();
        }

        $permissionsCollection = Permission::whereIn('name', $staffPermissions)
            ->get()
            ->pluck('id', 'id');
        $roleStaff->syncPermissions($permissionsCollection);
        $progress->advance();

        /*
         * -----
         * Create Client Role and Sync Permissions
         * -----
         */
        $roleClient = Role::firstOrCreate(['name' => 'client']);

        $clientPermissions = [
            'post browse',
            'post add',

            'post own read',
            'post own read unpublished',
            'post own edit',
            'post own delete',
            'post own publish',
            'post own restore',
            'post own trash',
        ];

        foreach ($clientPermissions as $key => $permission) {
            $clientPermissions[$key] = Str::of($permission)->kebab();
        }

        $permissionsCollection = Permission::whereIn('name', $clientPermissions)
            ->get()
            ->pluck('id', 'id');
        $roleClient->syncPermissions($permissionsCollection);
        $progress->advance();

        /*
         * -----
         * Permission-less Roles (Guest Role)
         * -----
         */
        $seedRoles = [
            ['name' => 'guest'],
        ];

        foreach ($seedRoles as $seedRole) {
            Role::create($seedRole);
        }
        $progress->advance();
        $progress->finish();
        $output->writeln('');


        $time = $start->diffInSeconds(now());
        $output->writeln("Roles & Permissions completed: $time seconds");
        $output->writeln(" ");
    }
}
