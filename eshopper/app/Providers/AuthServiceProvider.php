<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Services\PermissionGateAndPolicyAccess;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Define Permission
        $permissionGateAndPolicy=new PermissionGateAndPolicyAccess();
        $permissionGateAndPolicy->setGateAndPolicyAccess();
        
        Gate::define('menu-list', function (User $user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
         });
        //  Gate::define('product-list', function (User $user) {
        //     return $user->checkPermissionAccess('product_list');
        //  });
        //  Gate::define('product-edit', function (User $user,$id) {
        //      $product=Product::find($id);
        //      if ($user->checkPermissionAccess('product_edit') && $user->id===$product->user_id) {
        //         return true;
        //      }
        //      return false;
            
        //  });
    }
    
}
