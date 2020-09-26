<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Author,
    App\Tutorclass,
    App\ListingRequest,
    App\ListingClass,
    App\TutorStudents,
    App\Attendance,
    App\ClassStudent,
    App\LearningCenter,
    App\Subject;
use App\User;
use Auth,
    DB,
    Hash,
    Session;
use DataTables;

class ListingController extends Controller {

//GET TUTOR STUDENTS LIST POST REQUEST
    public function listingRequest(Request $request, $id = null) {
        if (Auth::check()) {
            $postData = $request->all();
            $userId = getUser_Detail_ByParam('id');

            /* GET LISTING REQUEST PAGE */
            $requestId = !empty($id) ? decode($id) : @$postData['requestId'];

            if ($request->isMethod('get')) {
                $SubjectSyllabus = DB::table('subjects')->get()->toArray();
                $ListingRequest = ListingRequest::where(['user_id' => $userId])->get()->toArray();
                $ListingRequest = !empty($ListingRequest) ? $ListingRequest : "";

                $editRequest = ListingRequest::where(['id' => $requestId])->first();
                $SyllabusDetails = isset($editRequest->syllabus_details) ? json_decode($editRequest->syllabus_details) : "";
//                pr($SyllabusDetails);

                $SubjectModal = new Subject();
                $SubjectSyllabusDetails = $SubjectModal->getSubjectSyllabusList();

                $P_range = isset($editRequest->p_range) ? explode(',', $editRequest->p_range) : [];
                return view('sites-student.listingRequest', [
                    'active' => 'listing',
                    'ListingRequest' => $ListingRequest,
                    'editRequest' => $editRequest,
                    'userId' => $userId,
                    'SubjectSyllabus' => $SubjectSyllabus,
                    'SyllabusDetails' => $SyllabusDetails,
                    'requestId' => $requestId,
                    'SubjectSyllabusDetails' => $SubjectSyllabusDetails,
                    'min' => isset($P_range[0]) ? $P_range[0] : 0,
                    'max' => isset($P_range[1]) ? $P_range[1] : 10000,
                ]);
            }

            /* ADD/UPDATE LISTING REQUEST DATA */

            if ($request->isMethod('post')) {
                $ListingRequest = ($postData['submit'] == 'add') ? new ListingRequest() : ListingRequest::where(['id' => $requestId])->first();

                $ListingRequest->title = $request->input('title') ? $request->input('title') : $ListingRequest->title;
                $ListingRequest->description = $request->input('description') ? $request->input('description') : $ListingRequest->description;
                $ListingRequest->no_of_tutor = $request->input('no_of_tutor') ? $request->input('no_of_tutor') : $ListingRequest->no_of_tutor;
                $ListingRequest->gender = $request->input('gender') ? $request->input('gender') : $ListingRequest->gender;
                $ListingRequest->age = $request->input('age') ? $request->input('age') : $ListingRequest->age;
                $ListingRequest->guest = $request->input('guest') ? $request->input('guest') : $ListingRequest->guest;
                $ListingRequest->p_range = $request->input('p_range') ? $request->input('p_range') : $ListingRequest->fees;

                $ListingRequest->tutor_status = $request->input('tutor_status') ? json_encode($request->input('tutor_status')) : $ListingRequest->tutor_status;
                $ListingRequest->category = $request->input('category') ? json_encode($request->input('category')) : $ListingRequest->category;
                $ListingRequest->syllabus_details = $request->input('syllabus_details') ? json_encode($request->input('syllabus_details')) : $ListingRequest->syllabus_details;
                $ListingRequest->lession_ids = $request->input('lession_ids') ? json_encode($request->input('lession_ids')) : $ListingRequest->lession_ids;
                $ListingRequest->language_id = $request->input('language_id') ? json_encode($request->input('language_id')) : $ListingRequest->language_id;
                $ListingRequest->fee_collect_id = $request->input('fee_collect_id') ? json_encode($request->input('fee_collect_id')) : $ListingRequest->fee_collect_id;
                $ListingRequest->loc_ids = $request->input('loc_ids') ? json_encode($request->input('loc_ids')) : $ListingRequest->loc_ids;
//                prd($postData);
                if (empty($id) && ($postData['submit'] == 'add')) {
                    $ListingRequest->user_id = $userId;
                    $ListingRequest->created_at = date('Y-m-d H:i:s');
                    $ListingRequest->save();
                    set_flash_message('Your request has been send successfully', 'alert-success');
                } else {
                    $ListingRequest->updated_at = date('Y-m-d H:i:s');
                    if ($ListingRequest->update()) {
                        set_flash_message('Your request has been updated successfully', 'alert-success');
                    } else {
                        set_flash_message('Some error occur', 'alert-danger');
                    }
                }
            }

            return redirect('/listing/listing_request');
        }
        return redirect('/');
    }

    //DELETE REQUEST
    public function deleteRequest(Request $request, $id = null) {
        if (Auth::check()) {
            $id = $id ? ($id) : '';
            if (!empty($id)) {
                DB::table('listing_requests')->where('id', $id)->delete();
                set_flash_message('Request has been deleted successfully', 'alert-success');
                return redirect('/listing/listing_request');
            } else {
                set_flash_message('Something went wrong', 'alert-danger');
            }
        }
        return redirect('/');
    }

    //DUPLICATE REQUEST
    public function duplicateRequest(Request $request, $id = null) {
        if (Auth::check()) {
            $id = $id ? ($id) : '';
            if (!empty($id)) {
                $findData = ListingRequest::find($id);
                $copyData = $findData->replicate();
//                prd($copyData);
                $copyData->save();
                set_flash_message('Duplicata data save successfully', 'alert-success');
                return redirect('/listing/listing_request');
            } else {
                set_flash_message('Something went wrong', 'alert-danger');
            }
        }
        return redirect('/');
    }

    /* TUTOR LIST CLASS GET REQUEST */
    public function listingClass(Request $request, $id = null) {
        if (Auth::check()) {

            $postData = $request->all();
            $userId = getUser_Detail_ByParam('id');
            /* GET LISTING REQUEST PAGE */
            $classtId = !empty($id) ? decode($id) : @$postData['classtId'];

            if ($request->isMethod('get')) {
                $SubjectSyllabus = DB::table('subjects')->get()->toArray();
                $ListingClasses = ListingClass::where(['user_id' => $userId])->get()->toArray();
                $ListingClasses = !empty($ListingClasses) ? $ListingClasses : "";

                $editClass = ListingClass::where(['id' => $classtId])->first();
                $SyllabusDetails = isset($editClass->syllabus_details) ? json_decode($editClass->syllabus_details) : "";
//                pr($ListingClasses);
                $SubjectModal = new Subject();
                $SubjectSyllabusDetails = $SubjectModal->getSubjectSyllabusList();

                $P_range = isset($editClass->p_range) ? explode(',', $editClass->p_range) : [];
                return view('sites-student.listingClasses', [
                    'active' => 'listing',
                    'ListingClasses' => $ListingClasses,
                    'editClass' => $editClass,
                    'userId' => $userId,
                    'SubjectSyllabus' => $SubjectSyllabus,
                    'classtId' => $classtId,
                    'SubjectSyllabusDetails' => $SubjectSyllabusDetails,
                    'SyllabusDetails' => $SyllabusDetails,
                    'min' => isset($P_range[0]) ? $P_range[0] : 0,
                    'max' => isset($P_range[1]) ? $P_range[1] : 10000,
                ]);
            }

            if ($request->isMethod('post')) {
                $ListingClass = ($postData['submit'] == 'add') ? new ListingClass() : ListingClass::where(['id' => $classtId])->first();

                $ListingClass->title = $request->input('title') ? $request->input('title') : $ListingClass->title;
                $ListingClass->description = $request->input('description') ? $request->input('description') : $ListingClass->description;
                $ListingClass->p_range = $request->input('p_range') ? $request->input('p_range') : $ListingClass->fees;
                $ListingClass->syllabus_details = $request->input('syllabus_details') ? json_encode($request->input('syllabus_details')) : $ListingClass->syllabus_details;
                $ListingClass->lession_ids = $request->input('lession_ids') ? json_encode($request->input('lession_ids')) : $ListingClass->lession_ids;
                $ListingClass->language_id = $request->input('language_id') ? json_encode($request->input('language_id')) : $ListingClass->language_id;
                $ListingClass->fee_collect_id = $request->input('fee_collect_id') ? json_encode($request->input('fee_collect_id')) : $ListingClass->fee_collect_id;
                $ListingClass->loc_ids = $request->input('loc_ids') ? json_encode($request->input('loc_ids')) : $ListingClass->loc_ids;
//                    prd($postData);
                if (empty($id) && ($postData['submit'] == 'add')) {
                    $ListingClass->user_id = $userId;
                    $ListingClass->created_at = date('Y-m-d H:i:s');
                    $ListingClass->save();
                    set_flash_message('Your class has been send successfully', 'alert-success');
                } else {
                    $ListingClass->updated_at = date('Y-m-d H:i:s');
                    if ($ListingClass->update()) {
                        set_flash_message('Your class has been updated successfully', 'alert-success');
                    } else {
                        set_flash_message('Some error occur', 'alert-danger');
                    }
                }
                return redirect('/listing/listing_class');
            }
        }
        return redirect('/');
    }

    //DUPLICATE CLASS
    public function duplicateClass(Request $request, $id = null) {
        if (Auth::check()) {
            $id = $id ? decode($id) : '';
            if (!empty($id)) {
                $findData = ListingClass::find($id);
                $copyData = $findData->replicate();
//                prd($copyData);
                $copyData->save();
                set_flash_message('Duplicata data save successfully', 'alert-success');
                return redirect('/listing/listing_class');
            } else {
                set_flash_message('Something went wrong', 'alert-danger');
            }
        }
        return redirect('/');
    }

    //DELETE CLASS
    public function deleteClass(Request $request, $id = null) {
        if (Auth::check()) {
            $id = $id ? ($id) : '';
            if (!empty($id)) {
                DB::table('listing_classes')->where('id', $id)->delete();
                set_flash_message('Class has been deleted successfully', 'alert-success');
                return redirect('/listing/listing_class');
            } else {
                set_flash_message('Something went wrong', 'alert-danger');
            }
        }
        return redirect('/');
    }

//TUTOR LIST Resources GET REQUEST
    public function listingResources(Request $request, $type = null) {
        if (Auth::check()) {
            $input = $request->all();
            $LcId = getUser_Detail_ByParam('id');
            $students = TutorStudents::where(['tutor_id' => $LcId])->first();
            $classes = DB::table("tutorclasses")
//                    ->where('status', '=', '1')
                    ->where('tutor_id', '=', $LcId)
                    ->pluck("class_name", 'id');

            $class = !empty($input['class']) ? $input['class'] : "";
            $date = !empty($input['date']) ? $input['date'] : "";
            return view('sites-student.listingResources', ['active' => 'listingClass', 'students' => $students, 'classes' => $classes, 'classfilter' => $class, 'dateFilter' => $date]);
        }
        return redirect('/');
    }

}
?>


