<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ItemController extends Controller
{
    function showItems(Request $request){
      // $all_items = \App\Item::all();
      // $all_items= \App\Item::orderby('created_at','desc')->limit('3')->get();
      $all_items= \App\Item::orderby('created_at')->where('reserve_id', '0')->paginate(12);
      return view('inventory.items', compact('all_items'));
    }


    function create(){
   		return view('inventory.items_create');
    }

    function store(Request $request){
        $name= $request->post('name');
        $category= $request->post('category');
        $itemdescription= $request->post('itemdescription');
        $discount= $request->post('discount');
        $firstimage= $request->file('1stimage');
        $secondimage= $request->file('2ndimage');
        $thirdimage= $request->file('3rdimage');
        $itemlevel= '0';
        $reserve_id= '0';
         

        // 1st IMAGE going to the folder
        $file1 = $firstimage;
        $namefile1 = $file1->getClientOriginalName();
        $finalfilename1 = time(). '1stitem'. $namefile1 ;
        $destinationPath = 'uploads/item';
        $file1->move($destinationPath,$finalfilename1);

        // 1stimage going to the database
        $imageName1 = $firstimage->getClientOriginalName();
        $imagedata1 = 'uploads/item/'. time(). '1stitem' .$imageName1 ;

        // 2nd IMAGE 
        if($secondimage != null){
        $file2 = $secondimage;
        $namefile2 = $file2->getClientOriginalName();
        $finalfilename2 = time() . '2nditem'. $namefile2 ;
        $destinationPath = 'uploads/item';
        $file2->move($destinationPath,$finalfilename2);


        $imageName2 = $secondimage->getClientOriginalName();
        $imagedata2 = 'uploads/item/'. time() . '2nditem' .$imageName2 ;
        } else {
        	$imagedata2 = '0';
        }

        // 3rd IMAGE
        if($thirdimage != null){
        $file3 = $thirdimage;
        $namefile3 = $file3->getClientOriginalName();
        $finalfilename3 = time() . '3rditem' . $namefile3 ;
        $destinationPath = 'uploads/item';
        $file3->move($destinationPath,$finalfilename3);


        $imageName3 = $thirdimage->getClientOriginalName();
        $imagedata3 = 'uploads/item/'. time() . '3rditem' .$imageName3 ;
        } else {
        	$imagedata3 = '0';
        }


        $rules = array(
          'name' => 'required | min:3 | max:191 | regex:/^[A-Za-z0-9\-\s ]+$/' ,
          'category' => 'required | not_in:0', 
          'itemdescription' => 'required',
          'discount' => 'required | max:2', 
          '1stimage' => '',
          '2ndimage' => '',
          '3rdimage' => '', 
        );

      $this -> validate($request,$rules);

      $item_obj = new \App\Item();
      $item_obj ->itemname = $name;
      $item_obj ->itemdescription = $itemdescription;
      $item_obj ->category = $category;
      $item_obj ->itemimage1 = $imagedata1;
      $item_obj ->itemimage2 = $imagedata2;
      $item_obj ->itemimage3 = $imagedata3;
      $item_obj ->reserve_id = $reserve_id;
      $item_obj ->itemlevel = $itemlevel;
      $item_obj ->discount = $discount;
      $item_obj ->save();

      

      // dd($request);

      return redirect("catalogue");
      
    }

    function delete($id){

      $item_to_delete = \App\Item::find($id);

      $item_to_delete -> delete();
      // what is this(below comment)
      // $all_items = Item::all();
      return redirect("catalogue")->with("deleted","Item has been deleted");
    }

    function update($id){

      $all_items =\App\Item::find($id);
      return view('inventory.updateitem', compact('all_items'));
    }

    function updatedata(Request $request, $id){
        $name= $request->post('name');
        $category= $request->post('category');
        $itemdescription= $request->post('itemdescription');
        $discount= $request->post('discount');
        $firstimage= $request->file('1stimage');
        $secondimage= $request->file('2ndimage');
        $thirdimage= $request->file('3rdimage');
        $itemlevel= '0';
        $reserve_id= '0';
         
        $item_obj = \App\Item::find($id);
        // 1st IMAGE going to the folder
        if($firstimage != null){
        $file1 = $firstimage;
        $namefile1 = $file1->getClientOriginalName();
        $finalfilename1 = time(). '1stitem'. $namefile1 ;
        $destinationPath = 'uploads/item';
        $file1->move($destinationPath,$finalfilename1);

        // 1stimage going to the database
        $imageName1 = $firstimage->getClientOriginalName();
        $imagedata1 = 'uploads/item/'. time(). '1stitem' .$imageName1 ;
        $item_obj ->itemimage1 = $imagedata1;
        }

        // 2nd IMAGE 
        if($secondimage != null){
        $file2 = $secondimage;
        $namefile2 = $file2->getClientOriginalName();
        $finalfilename2 = time() . '2nditem'. $namefile2 ;
        $destinationPath = 'uploads/item';
        $file2->move($destinationPath,$finalfilename2);


        $imageName2 = $secondimage->getClientOriginalName();
        $imagedata2 = 'uploads/item/'. time() . '2nditem' .$imageName2 ;
        $item_obj ->itemimage2 = $imagedata2;
        }

        // 3rd IMAGE
        if($thirdimage != null){
        $file3 = $thirdimage;
        $namefile3 = $file3->getClientOriginalName();
        $finalfilename3 = time() . '3rditem' . $namefile3 ;
        $destinationPath = 'uploads/item';
        $file3->move($destinationPath,$finalfilename3);


        $imageName3 = $thirdimage->getClientOriginalName();
        $imagedata3 = 'uploads/item/'. time() . '3rditem' .$imageName3 ;

        $item_obj ->itemimage3 = $imagedata3;
        }


        $rules = array(
          'name' => 'required | min:3 | max:191 | regex:/^[A-Za-z0-9\-\s ]+$/',
          'category' => 'required | not_in:0', 
          'itemdescription' => 'required',
          'discount' => 'required | max:2', 
          '1stimage' => '',
          '2ndimage' => '',
          '3rdimage' => '', 
        );

      $this -> validate($request,$rules);

      
      $item_obj ->itemname = $name;
      $item_obj ->itemdescription = $itemdescription;
      $item_obj ->category = $category;

      $item_obj ->reserve_id = $reserve_id;
      $item_obj ->itemlevel = $itemlevel;
      $item_obj ->discount = $discount;
      $item_obj ->save();

      

      

      return redirect("catalogue");
      
    }

    //categorylist

    // function categorycall(Request $request){
      
    // // $request->all()->post('category'); 
    // return redirect("/catalogue/category/$request->category");
    // }

    function categorylist(Request $request){
      // dd($request->category);
      //$category = $request-> get('category');
      $mycategories = $request->input('category');
      

      if(count($mycategories) == 1){
        $all_items = \App\Item::select('*')->paginate(12);
      } elseif(count($mycategories) == 2) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->paginate(12);
      } elseif(count($mycategories) == 3) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->paginate(12);
      } elseif(count($mycategories) == 4) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->orWhere('category', $mycategories[3])
                                  ->paginate(12);
      } elseif(count($mycategories) == 5) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->orWhere('category', $mycategories[3])
                                  ->orWhere('category', $mycategories[4])
                                  ->paginate(12);
      } elseif(count($mycategories) == 6) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->orWhere('category', $mycategories[3])
                                  ->orWhere('category', $mycategories[4])
                                  ->orWhere('category', $mycategories[5])
                                  ->paginate(12);
      } else {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->orWhere('category', $mycategories[3])
                                  ->orWhere('category', $mycategories[4])
                                  ->orWhere('category', $mycategories[5])
                                  ->orWhere('category', $mycategories[6])
                                  ->paginate(12);
      }

     // // // dd($all_items);
     // //  // $request->session()->put('category',$category);


      
      return view('inventory.item_category', compact('all_items', 'mycategories'));
    }


    function reserve($id){

      $reserve_item =\App\Item::find($id);
      
      return view('messages.messaging_create', compact('id','reserve_item'));
    }


    function showReserve(Request $request){
      $all_items= \App\Item::orderby('created_at')->where('reserve_id', '>' ,'0')->paginate(12);


      $nameofuser = DB::table('items')
            ->join('users', 'items.reserve_id', '=', 'users.id')
            ->select('users.name')
            ->first();

      if($nameofuser != null){
      $nameofuser = $nameofuser->name;
      } else {
        $nameofuser = 0;
      }

      return view('inventory.reserve_item', compact('all_items', 'nameofuser'));
    }

    // Search
      public function search(Request $request) {
        $keyword = $request->input('search');
        $all_items = \App\Item::where('itemname', 'LIKE', '%'.$keyword.'%')->orWhere('itemdescription', 'LIKE', '%'.$keyword.'%')->paginate(12);
        return view('inventory.searchitem', compact('all_items', 'keyword'));
      }

    function solditem($id){
        

        $itemlevel = 1;

        if(Auth::user()->role == 'admin'){
        $item_obj = \App\Item::find($id);
        $item_obj ->itemlevel = $itemlevel;
        $item_obj ->save();
        }


      return back();
    }

    function unreserve($id){
       

        $unreserve = 0;

        if(Auth::user()->role == 'admin'){
        $item_obj = \App\Item::find($id);
        $item_obj ->reserve_id = $unreserve;
        $item_obj ->save();
        }


      return back();
    }


}
