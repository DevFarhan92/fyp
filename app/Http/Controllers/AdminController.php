<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;
use App\admin_login;
use App\dealers;
use App\employees;
use App\cash_management;
use App\dealer_balance;
use App\expenses;
use DB;
class AdminController extends Controller
{
    //

    public function login()
    {
    
    	return view('admin.login');
    }

    // public function register()
    // {
    //   $data = admin_login::create([
    //     'username' => 'Farhan',
    //     'password' => md5("farhan12345")
    //   ]);

    //   if(!empty($data)){
    //     return view('admin.login');

    //   }

    //   echo '<script>alert("something went wrong")</script>';
    	
    // }

    public function admin_login(Request $request)
    {

     
    
    	  if(admin_login::where('username', '=', $request->username)->where('password', '=', (md5($request->password)))->first())

               {
         
                          
                              

              $admin_id=admin_login::select('id')->where('username','=',$request->username)->pluck('id')->first();
              $role=admin_login::select('role')->where('username','=',$request->username)->pluck('role')->first();

                   Session::put('admin_id', $admin_id);
                   Session::put('role',$role);

                   
                    // return "Login";   
                          return Redirect::to('dashboard');
                            

                      
               }

             
            
               else{

                  return Redirect::to('/')->with('alert-invalid', 'Invalid Credentials.');
                

             
               }
    }



  
  public function logout()
  {
  	Session::forget('admin_id');
  	return Redirect::to('/');
  }



    public function dashboard()
    {
      $cash_management=cash_management::select('*')->where('id','=',1)->get();

    //Get Current Month Sales

      $currentMonth = date('m');
$total_blocks = DB::table("sales")->select('no_of_blocks')
            ->whereRaw('MONTH(date) = ?',[$currentMonth])
            ->sum('no_of_blocks');


   $total_amount = DB::table("sales")->select('total_price')
            ->whereRaw('MONTH(date) = ?',[$currentMonth])
            ->sum('total_price');         


//Get current month expense
             $total_expense = DB::table("expenses")->select('expense_amount')
            ->whereRaw('MONTH(date) = ?',[$currentMonth])
            ->sum('expense_amount'); 

//Get total balance of local dealers

            $local_balance=dealer_balance::leftjoin('dealers','dealers.dealer_id','=','dealer_balances.dealer_id')->where('dealers.dealer_type','=','Local')->select('new_balance')->sum('new_balance');

//Get total balance of fisheries
            $fisheries_balance=dealer_balance::leftjoin('dealers','dealers.dealer_id','=','dealer_balances.dealer_id')->where('dealers.dealer_type','=','Fisheries')->select('new_balance')->sum('new_balance');

           



    	return view('admin.dashboard',compact('cash_management','total_blocks','total_amount','local_balance','fisheries_balance','total_expense'));
    }



  public function add_new_dealer()
  {
    return view('admin.add_new_dealer');
  }

  public function dealer_add(Request $request)
  {
     $rules=array(
       
        'cnic' => 'unique:dealers,cnic',
 
            );

        $messages = array(

        //'email'=>'Invalid Email'
    );

        $validator = Validator::make(Input::all(),$rules,$messages);
        if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();
      //  return $messages;
        // redirect our user back to the form with the errors from the validator
        return Redirect::to('add_new_dealer')
            ->withErrors($validator)
            ->withInput(Input::all(),$rules);

    }

else
{
      $dealer_id=dealers::select('dealer_id')->orderby('dealer_id','desc')->pluck('dealer_id')->first();
    $dealer_id=$dealer_id+1;

        $dealer=new dealers;
        $dealer->dealer_id=$dealer_id;
        $dealer->dealer_name=$request->dealer_name;
        $dealer->cnic=$request->cnic;
        $dealer->email=$request->email;
        $dealer->phone=$request->phone;
        $dealer->dealer_type=$request->dealer_type;

    
       
        $dealer->save();

       // return "Success";
        if($request->dealer_type=='Local')
         { 
        return Redirect::to('view_dealers_local')->with('alert-success','Dealer Added Successfully');
    
}
else if ($request->dealer_type=='Fisheries')
{
  return Redirect::to('view_dealers_fisheries')->with('alert-success','Dealer Added Successfully');
}
    }
  }

  public function view_dealers_local()
  {
    $dealers=dealers::select('*')->where('dealer_type','=','Local')->get();

    return view('admin.view_dealers_local',compact('dealers'));
  }

   public function view_dealers_fisheries()
  {
    $dealers=dealers::select('*')->where('dealer_type','=','Fisheries')->get();

    return view('admin.view_dealers_fisheries',compact('dealers'));
  }




public function add_new_employee()
{
  return view('admin.add_new_employee');
}


public function employee_add(Request $request)
  {
     $rules=array(
       
        'cnic' => 'unique:employees,cnic',
 
            );

        $messages = array(

        //'email'=>'Invalid Email'
    );

        $validator = Validator::make(Input::all(),$rules,$messages);
        if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();
      //  return $messages;
        // redirect our user back to the form with the errors from the validator
        return Redirect::to('add_new_employee')
            ->withErrors($validator)
            ->withInput(Input::all(),$rules);

    }

else
{
      $employee_id=employees::select('employee_id')->orderby('employee_id','desc')->pluck('employee_id')->first();
    $employee_id=$employee_id+1;

        $employee=new employees;
        $employee->employee_id=$employee_id;
        $employee->employee_name=$request->employee_name;
        $employee->cnic=$request->cnic;
        $employee->employee_post=$request->employee_post;
        $employee->phone=$request->phone;
        $employee->salary=$request->salary;

    
       
        $employee->save();

       // return "Success";
        return Redirect::to('view_employees')->with('alert-success','Dealer Added Successfully');
    }
  }

public function view_employees()
  {
    $employees=employees::select('*')->get();

    return view('admin.view_employees',compact('employees'));
  }

public function delete_employee(Request $request)
{
employees::where('employee_id',$request->id)->delete();
}

public function delete_dealer(Request $request)
{
//  return $request->id;
 $x = dealers::where('dealer_id',$request->id)->delete();
}


public function pay_employee_salary(Request $request)
{


$expense_id=expenses::select('expense_id')->orderby('expense_id','desc')->pluck('expense_id')->first();
    $expense_id=$expense_id+1;

     $expense=new expenses;
     $expense->expense_id=$expense_id;
     $expense->date=$request->date;
     $expense->expense_discription=$request->employee_id;
     $expense->expense_amount=$request->expense_amount;
     $expense->expense_type='Salary';
     $expense->paid_through=$request->paid_through;
     
     

     //Update cash in factory and bank
     $paid_through=$request->paid_through;
     if($paid_through=='Cash')
     {
        $cash_in_factory=cash_management::select('cash_in_factory')->where('id',1)->pluck('cash_in_factory')->first();

        $expense_amount=$request->expense_amount;

        $updated_cash_in_factory=$cash_in_factory-$expense_amount;
        cash_management::where('id',1)->update(['cash_in_factory'=>$updated_cash_in_factory]);
     }

     else if($paid_through=='Cheque-Meezan')
     {
        $cash_in_bank=cash_management::select('cash_in_meezan')->where('id',1)->pluck('cash_in_meezan')->first();

        $expense_amount=$request->expense_amount;

        $updated_cash_in_bank=$cash_in_bank-$expense_amount;
        cash_management::where('id',1)->update(['cash_in_meezan'=>$updated_cash_in_bank]);
     }

      else if($paid_through=='Cheque-Soneri')
     {
        $cash_in_bank=cash_management::select('cash_in_soneri')->where('id',1)->pluck('cash_in_soneri')->first();

        $expense_amount=$request->expense_amount;

        $updated_cash_in_bank=$cash_in_bank-$expense_amount;
        cash_management::where('id',1)->update(['cash_in_soneri'=>$updated_cash_in_bank]);
     }

    
    $expense->save();
       return Redirect::to('view_employees')->with('alert-success','Salary Successfully Paid');

}

public function update_employee_salary(Request $request)
{
  employees::where('employee_id',$request->employee_id)->update(['salary'=>$request->salary]);
  return Redirect::to('view_employees')->with('alert-success','Salary record successfully updated');
}

}
