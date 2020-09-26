<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Redirect;
use Hash;
use DataTables;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id = null) {

        $this->validate($request, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:255',
            //'userName' => 'required|alpha_num|max:30',
            'password' => 'required|min:6|same:confirmpassword',
            'gender' => 'required',
            'phone' => 'numeric',
        ]);

        try {
            if (isset($id)) {
                $user = User::findOrFail($id);
                $msg = 'User updated successfully';
            } else {
                $user = new User;
                $msg = 'User added successfully';
            }
            $user->name = $request->name;
            //$user->username = $request->userName;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $allowedExtensions = ['jpg', 'png', 'gif', 'tif', 'bmp'];
            // upload user avatar
            if ($request->hasFile('avatar')) {
                $destinationPath = public_path('/images/users');
                if (isset($id) && file_exists($destinationPath . '/' . $user->avatar)) {
                    @unlink($destinationPath . '/' . $user->avatar);
                }
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(10000, 99999) . '.' . $extension;
                if (in_array($extension, $allowedExtensions)) {

                    $file->move($destinationPath, $fileName);
                }
                $user->avatar = $fileName;
            }
            $user->email_verified_at = \Carbon\Carbon::now();
            $user->save();
            return Redirect::to('/admin/user_list')->with('success', $msg);
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('admin.edit_profile', ['userData' => getUserDetailsById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $user = User::findOrFail($id);
            $destinationPath = public_path('/images/users');
            if (file_exists($destinationPath . '/' . $user->avatar)) {
                @unlink($destinationPath . '/' . $user->avatar);
            }
            $user->delete();
            return Redirect::back()->with('success', 'User Deleted Successfully');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
        }
    }

    /**
     * List all the registered user on admin Panel
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_list($type = null) {
        return view('admin.user_list', ['type' => $type]);
    }

    /**
     * Fetch all the users from database table.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchUsers(Request $request, $type = null) {
        $input = $request->all();
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : 0;      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "";
        $where = '';

        // Datatable column number to table column name mapping
        $arr = array(
            0 => 'id',
            1 => 'name',
            //2 => 't1.username',
            2 => 'email',
            3 => 'phone',
            4 => 'gender',
            5 => 'created_at',
        );

        $user_type = ($type == 'student') ? 4 : 2;

        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $users = User::where('name', 'like', '%' . $sSearch . '%')
                ->where('id', '!=', 1);
        if (!empty($type)) {
            $users = $users->where('user_type', $user_type);
        }
        $users = $users->orderBy($sortBy, $sortType)
                ->limit($length)
                ->offset($start)
                ->get();

        $iTotal = User::where('name', 'like', '%' . $sSearch . '%');
        if (!empty($type)) {
            $iTotal = $iTotal->where('user_type', $user_type);
        }
        $iTotal = $iTotal->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $k = 0;
        if (count($users) > 0) {
            foreach ($users as $user) {
                $type = ($user->user_type == 2) ? 'Learning-Center' : 'Student';
                $imgFolder = ($user->user_type == 2) ? 'tutor' : 'student';
                $img = !empty($user->avatar) ? "public/sites/images/$imgFolder/$user->id/$user->avatar" : "public/sites/images/dummy.jpg";
                $email_verified_at = !empty($user->email_verified_at) ? "<span style='color:green'>Verified</span>" : "<span style='color:red'>Not Verified</span>";

                $src = '<img src="' . url($img) . '"  height="50" width="50"> ';
                $response['aaData'][$k] = [$k + 1, $src, $user->name, $user->email, $user->phone, $user->gender, $type, $email_verified_at, $user->created_at];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Fetch Student List Datables Ajax Request
    public function fetchesUsers(Request $request) {

        $usersQuery = [];
        $usersQuery = User::query();
        $usersQuery->select('id', 'fname', 'lname', 'avatar', 'email', 'address', 'phone', 'gender')->where('user_type', 2);
        $users = $usersQuery->select('*');
        return DataTables::of($users)->make(true);
    }

    /**
     * for upload student by CSV.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadStudentByCsv(Request $request) {
        if ($request->file('csv_student') !== null) {
            $file = $request->file('csv_student');

            if ($_FILES["csv_student"]["size"] > 0) {
                $fileName = $_FILES["csv_student"]["tmp_name"];
                $file = fopen($fileName, "r");
                $i = 0;
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    if ($i != 0) {
                        DB::table('users')->insert([
                                ['name' => $column[1] . ' ' . $column[2], 'fname' => $column[1], 'lname' => $column[2], 'email' => $column[3], 'phone' => $column[4], 'gender' => $column[5], 'address' => $column[6], 'dob' => $column[7], 'password' => Hash::make(123456)]
                        ]);
                    }
                    $i++;
                }
            }
        }
    }

}
