<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\UserServices;
use App\Services\Admin\ShoppingService;
use App\Services\WalletServices;
use App\Services\FranchiseeServices;
use App\Models\User;

class EmployeeManagement extends Controller
{
    private $userservices, $shoppingservices, $walletservices, $franchiseeservices;

    function __construct(UserServices $userservice, ShoppingService $shoppingservice, WalletServices $walletservice, FranchiseeServices $franchiseeservice)
    {
        $this->userservices = $userservice;
        $this->shoppingservices = $shoppingservice;
        $this->walletservices = $walletservice;
        $this->franchiseeservices = $franchiseeservice;
    }

    //index
    public function index()
    {
        $list = $this->userservices->pendingKyc();
        return view('employee.pending-kyc', ['active' => 'kyc', 'lists' => $list]);
    }

    //pending kycs
    public function kyc()
    {
        $list = $this->userservices->pendingKyc();
        return view('employee.pending-kyc', ['active' => 'kyc', 'lists' => $list]);
    }

    //users
    public function users()
    {
        $list = $this->userservices->usersList();
        return view('employee.users', ['active'=> 'users', 'users' => $list]);
    }

    //memberStatusChnage
    public function memberStatusChnage($id, $status)
    {
        $response = (object) $this->userservices->userStatusChange($id, $status);
        if($response->status == 1)
        {
            return back()->with('success', $response->msg);
        }
        else
        {
            return back()->with('error', $response->msg);
        }
    }

    //View Edit
    public function viewUser($id)
    {
        $response = (object) $this->userservices->getUserById($id);
        if($response->status == 1)
        {
            return view('employee.edit-user', ['active' => 'members', 'user' => $response->msg]);
        }
        else
        {
            return back()->with('error', $response->msg);
        }        
    }

    //admin upate user details
    public function updateUserDetails($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            ]);
        if ($validator->fails())
        {
           return back()->withErrors($validator);
        }

        $response = (object) $this->userservices->updateUserDetails($id, $request);

        if($response->status == 1)
        {
            return back()->with('success', $response->msg);
        }

        return back()->with('error', $response->msg);
    }

    //update user kyc status
    public function updateUserKycDetails($kyc_id, $status)
    {
        $response = (object) $this->userservices->updateUserKycDetails($kyc_id, $status);

        if($response->status == 1)
        {
            return back()->with('success', $response->msg);
        }

        return back()->with('error', $response->msg);
    }

    public function products()
    {
        $list = $this->shoppingservices->ProductList();
        return view('employee.products', ['products' => $list, 'active' => 'products']);
    }

    public function changePassword()
    {
        return view('employee.change-password', ['active' => 'nill']);
    }

    public function productadd()
    {
        $category = $this->shoppingservices->CategoryList();
        return view('employee.add-product', ['active' => 'add-product', 'categories' => $category]);
    }

    public function productupdate($id)
    {
        $category = $this->shoppingservices->CategoryList();
        $product = $this->shoppingservices->GetProductById($id);
        return view('employee.edit-product', ['active' => 'products', 'categories' => $category, 'product' => $product]);
    }

    public function list()
    {
        $list = $this->shoppingservices->CategoryList();
        return view('employee.categories', ['active' => ['shopping', 'category'], 'categories' => $list]);
    }

    public function sub_cat_list()
    {
        $list = $this->shoppingservices->SubcategoryList();
        $list_Cat = $this->shoppingservices->CategoryList();
        return view('employee.sub-category', ['active' => ['shopping', 'subcategory'], 'categories' => $list, 'cats' => $list_Cat]);
    }

    public function request_fund_admin()
    {
        $fundrequests = $this->walletservices->getFundRequests();
        return view('employee.fund-requests', ['active' => 'fund-request', 'fundrequests' => $fundrequests]);
    }

    public function withdrawalRequestIndex()
    {
        $list = $this->walletservices->withdrawalRequestList();
        return view('employee.withdrawal', ['active' => 'withdrawal', 'requests' => $list]);
    }

    //Admin Franchisee Request
    public function franchiseeRequests()
    {
        $list = $this->franchiseeservices->userFranchiseeRequestOrderByDesc();
        return view('employee.franchisee-requests', ['active' => 'request', 'list' => $list]);
    }

    public function package()
    {
        $list = $this->franchiseeservices->list();
        return view('employee.franchisee-package', ['active' => ['franchisee', 'package'], 'packages' => $list]);
    }

    //adminsidefranchiseeorders
    public function adminFranchiseeOrders()
    {
        $response = $this->franchiseeservices->adminFranchiseeOrdersList();
        return view('employee.franchisee-orders', ['active' => ['franchisee', 'franchisee-orders'], 'orders' => $response]);
    }
}
