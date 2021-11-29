<?php
namespace App\Services;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess{
 public function setGateAndPolicyAccess()
    {
        $this->defineGateCategory();
        $this->defineGateProduct();
        $this->defineGateSlider();
        $this->defineGateSetting();
    }
    public function defineGateCategory()
    {
        Gate::define('category-list','App\Policies\CategoryPolicy@view');
        Gate::define('category-add','App\Policies\CategoryPolicy@create');
        Gate::define('category-edit','App\Policies\CategoryPolicy@update');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');

    }
    public function defineGateProduct()
    {
        Gate::define('product-list','App\Policies\ProductPolicy@view');
        Gate::define('product-add','App\Policies\ProductPolicy@create');
        Gate::define('product-edit','App\Policies\ProductPolicy@update');
        Gate::define('product-delete','App\Policies\ProductPolicy@delete');

    }
    public function defineGateSlider()
    {
        Gate::define('slider-list','App\Policies\SliderPolicy@view');
        Gate::define('slider-add','App\Policies\SliderPolicy@create');
        Gate::define('slider-edit','App\Policies\SliderPolicy@update');
        Gate::define('slider-delete','App\Policies\SliderPolicy@delete');

    }
    public function defineGateSetting()
    {
        Gate::define('setting-list','App\Policies\SettingPolicy@view');
        Gate::define('setting-add','App\Policies\SettingPolicy@create');
        Gate::define('setting-edit','App\Policies\SettingPolicy@update');
        Gate::define('setting-delete','App\Policies\SettingPolicy@delete');

    }
}