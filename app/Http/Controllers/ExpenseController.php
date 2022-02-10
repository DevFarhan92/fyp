<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;
use App\expenses;
use App\cash_management;
class ExpenseController extends Controller
{
    //

    public function add_new_expense()
    {
    	return view('admin.add_new_expense');
    }

    public function expense_add(Request $request)
    {
    
     $expense_id=expenses::select('expense_id')->orderby('expense_id','desc')->pluck('expense_id')->first();
    $expense_id=$expense_id+1;

     $expense=new expenses;
     $expense->expense_id=$expense_id;
     $expense->date=$request->date;
     $expense->expense_discription=$request->expense_discription;
     $expense->expense_amount=$request->expense_amount;
     $expense->expense_type=$request->expense_type;
     $expense->paid_through=$request->paid_through;
     $expense->cheque_number=$request->cheque_number;
     


    $expense_attachment=$request->expense_attachment;
if($expense_attachment !='')
{
 $destinationPath = 'attachments/expense'; // upload path
          $file_name = $expense_attachment -> getClientOriginalName();
          $file_name = uniqid().$file_name;
          $file_name = preg_replace('/\s+/', '', $file_name);
          $extension = $expense_attachment->getClientOriginalExtension(); // getting image extension

        
          $expense_attachment->move($destinationPath, $file_name); 


          $expense->expense_attachment=$file_name;

}

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
       return Redirect::to('add_new_expense')->with('alert-success','Expense Added Successfully');
    }


    public function view_expenses()
    {
    	$expenses=expenses::select('*')->get();
    	return view('admin.view_expenses',compact('expenses'));
    }


    public function view_expense_report()
    {
        return view('admin.reports.view_expense_report');
    }

    public function expense_report_details(Request $request)
   {
    $start_date1 = date("d-F-Y", strtotime($request->start_date));
  $end_date1 = date("d-F-Y", strtotime($request->end_date));

  $start_date=$request->start_date;
  $end_date=$request->end_date;


  //get month name

  $month_name=date("F", strtotime($request->start_date));


  
    $overall_expense=expenses::select('*')->whereBetween('date', [$start_date, $end_date])->get();
    
     
     

     //Get total sale amount
     
     $total_expense=expenses::whereBetween('date', [$start_date, $end_date])->sum('expense_amount');
   
      return view('admin.reports.expense_report_details',compact('overall_expense','total_expense','start_date1','end_date1','month_name'));
   }

}
