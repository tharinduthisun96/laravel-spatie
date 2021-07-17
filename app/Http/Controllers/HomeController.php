<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
	public function test()
	{
		$all_roles = auth()->user()->getRoleNames();
		//$all_permissions = auth()->user()->getPermissionNames;
		$test = auth()->user()->roles[0]->can('edit.post');
		var_dump($test);die;
		return "Done Test";
	}
	
	public function test_auth()
	{
		//$role = Role::create(['name' => 'admin']);
		//$role = Role::create(['name' => 'user']);
		//$permission = Permission::create(['guard_name' => 'web', 'name' => 'edit_post']);
		//auth()->user()->givePermissionTo("edit.post");
		//auth()->user()->assignRole("user");
		//$role = Role::find(['name' => 'user'])->first;
		//$role->givePermissionTo('edit.post');
		
		
		return "test_auth";
	}
	
	public function add_roles(){
		
		$role = Role::create(['name'=> 'admin']);
		$role = Role::create(['name'=> 'user']);
		$role = Role::create(['name'=> 'temp']);
		$role = Role::create(['name'=> 'test']);		
	}
	
	public function add_permissions(){
		
		$permission = Permission::create(['guard_name' => 'web', 'name' => 'edit_post']);
		$permission = Permission::create(['guard_name' => 'web', 'name' => 'create_post']);
		$permission = Permission::create(['guard_name' => 'web', 'name' => 'delete_post']);
		$permission = Permission::create(['guard_name' => 'web', 'name' => 'edit_user']);
		$permission = Permission::create(['guard_name' => 'web', 'name' => 'create_user']);
		$permission = Permission::create(['guard_name' => 'web', 'name' => 'delete_user']);
		
	}
	
	public function assign_role(){
		
	//	auth()->user()->assignRole("test");
		$all_roles = auth()->user()->getRoleNames();
		$all_permissions = auth()->user()->getPermissionNames();
		var_dump($all_roles);echo "<br>";
		var_dump($all_permissions);die;
	}
	
	public function assign_permission(){
		
		auth()->user()->givePermissionTo("edit_post");
		auth()->user()->givePermissionTo("edit_user");
		$all_roles = auth()->user()->getRoleNames();
		$all_permissions = auth()->user()->getPermissionNames;
		var_dump($all_roles);echo "<br>";
		var_dump($all_permissions);die;
	}
	
	public function role_permission(){
		
		$role = Role::find(['name'=>'test'])->first; // not woring for givePermissionTo use  Role::findByName('test')
		$role->givePermissionTo('edit_post');
		$role->givePermissionTo('edit_user');
		$all_roles = auth()->user()->getRoleNames();
		$all_permissions = auth()->user()->getPermissionNames();
		var_dump($all_roles);echo "<br>";
		//var_dump($all_permissions);die;
	}
	public function user_permission(){
		//auth()->user()->givePermissionTo("edit_post");
		$all_roles = auth()->user()->getRoleNames();
		$all_permissions = auth()->user()->getPermissionNames();
		var_dump($all_roles);echo "<br>";
		var_dump($all_permissions);die;
	}
	public function other_assign_role(){
		
		auth()->user()->assignRole("test");
		$all_roles = auth()->user()->getRoleNames();
		$all_permissions = auth()->user()->getPermissionNames();
		var_dump($all_roles);echo "<br>";
		var_dump($all_permissions);die;
	}
	public function hasPermissionTo(){
		
		//$role = Role::findByName('test');
		//$role->givePermissionTo('edit_post');

		auth()->user()->assignRole('test');

		//auth()->user()->givePermissionTo('edit_post');
		//auth()->user()->hasAllDirectPermissions(['edit_post']);
		
		dd(auth()->user()->can('edit_post'));
		
	}
	
}
