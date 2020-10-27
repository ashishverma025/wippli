<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

use App\BusinessDetail;
use App\ContactDetail;
use App\User;
use Auth,
DB,
Hash,
Session;
use DataTables;

class UsersController extends Controller {

    public function saveContactDetails( Request $request ) {

        if ( Auth::check() ) {
            // prd( $request->post() );

            $userDetails = getUserDetails();
            $postData = $request->post();

            if ( empty( $postData ) ) {
                $request->session()->flash( 'message.level', 'danger' );
                $request->session()->flash( 'message.content', 'Error!' );
                return redirect( '/business-details' );

            }
            $contactId = !empty( $postData['contact_id'] ) ? $postData['contact_id'] : '';
            $contactDetails = empty( $postData['contact_id'] ) ? new ContactDetail() : ContactDetail::where( ['id' => $contactId] )->first();
            // prd( $postData );

            $contactDetails->parent_id = !empty( $userDetails['id'] ) ? $userDetails['id'] :'';
            $contactDetails->first_name = !empty( $postData['first_name'] ) ? $postData['first_name'] : $contactDetails->first_name;
            $contactDetails->surname = $postData['surname'] ? $postData['surname'] : $contactDetails->surname;
            $contactDetails->known_as = $postData['known_as'] ? $postData['known_as'] : $contactDetails->known_as;
            $contactDetails->initials = $postData['initials'] ? $postData['initials'] : $contactDetails->initials;
            $contactDetails->positions = $postData['positions'] ? ( $postData['positions'] ) : $contactDetails->positions;
            $contactDetails->department = @$postData['department'] ? $postData['department'] : $contactDetails->department;
            $contactDetails->email = @$postData['email'] ? $postData['email'] : $contactDetails->email;
            $contactDetails->phone = @$postData['phone'] ? $postData['phone'] : $contactDetails->phone;
            $contactDetails->mobile =  @$postData['mobile'] ? $postData['mobile'] : $contactDetails->mobile;
            $contactDetails->tbc =  @$postData['tbc'] ? $postData['tbc'] : $contactDetails->tbc;

            $contactDetails->country = @$postData['country'] ? $postData['country']: $contactDetails->country;
            $contactDetails->state = @$postData['state'] ? $postData['state']: $contactDetails->state;
            $contactDetails->address1 = @$postData['address1'] ? $postData['address1']: $contactDetails->address1;
            $contactDetails->address2 = @$postData['address2'] ? $postData['address2']: $contactDetails->address2;
            $contactDetails->city = @$postData['city'] ? $postData['city']: $contactDetails->city;
            $contactDetails->post_code = @$postData['post_code'] ? $postData['post_code']: $contactDetails->post_code;

            $contactDetails->role = @$postData['role'] ? $postData['role']: $contactDetails->role;
            $contactDetails->email_notification = @$postData['email_notification'] ? $postData['email_notification']: $contactDetails->email_notification;
            $contactDetails->linkedin = @$postData['linkedin'] ? $postData['linkedin']: $contactDetails->linkedin;
            $contactDetails->twitter = @$postData['twitter'] ? $postData['twitter']: $contactDetails->twitter;
            $contactDetails->instagram = @$postData['instagram'] ? $postData['instagram']: $contactDetails->instagram;
            $contactDetails->facebook = @$postData['facebook'] ? $postData['facebook']: $contactDetails->facebook;
            $contactDetails->youtube = @$postData['youtube'] ? $postData['youtube']: $contactDetails->youtube;
            $contactDetails->anythingelse = @$postData['anythingelse'] ? $postData['anythingelse']: $contactDetails->anythingelse;

            $contactDetails->colourslogo_file = @$postData['colourslogo_file'] ? $postData['colourslogo_file']: $contactDetails->colorlogo_file;
            $contactDetails->coloricon_file = @$postData['coloricon_file'] ? $postData['coloricon_file']: $contactDetails->coloricon_file;
            $contactDetails->negativelogo_file = @$postData['negativelogo_file'] ? $postData['negativelogo_file']: $contactDetails->negativelogo_file;
            $contactDetails->negativeicon_file = @$postData['negativeicon_file'] ? $postData['negativeicon_file']: $contactDetails->negativeicon_file;
            $contactDetails->gdrive_dir = @$postData['gdrive_dir'] ? $postData['gdrive_dir']: $contactDetails->gdrive_dir;
            $contactDetails->dropbox_dir = @$postData['dropbox_dir'] ? $postData['dropbox_dir']: $contactDetails->dropbox_dir;
            $contactDetails->organisation = @$postData['organisation'] ? $postData['organisation']: $contactDetails->organisation;
            $contactDetails->branch = @$postData['branch'] ? $postData['branch']: $contactDetails->branch;
            // prd( $contactDetails );
            if ( empty( $postData['contact_id'] ) ) {
                $contactDetails->created_at = date( 'Y-m-d H:i:s' );
                $contactDetails->save();

                $userID = $this->createUser( $postData, $contactDetails->id, $userDetails['id'] );
                if ( $userID != 'error') {
                    $contactDetail = ContactDetail::where(['id' => $contactDetails->id])->first();
                    $contactDetail->user_id = $userID;
                    $contactDetail->update();
                    $request->session()->flash( 'message.level', 'success' );
                    $request->session()->flash( 'message.content', 'Contact added successfully!' );
                }else{
                    $request->session()->flash( 'message.level', 'error' );
                    $request->session()->flash( 'message.content', 'User not created !' );
                }
            } else {
                $contactDetails->updated_at = date( 'Y-m-d H:i:s' );
                $contactDetails->update();
                $request->session()->flash( 'message.level', 'success' );
                $request->session()->flash( 'message.content', 'Contact updated successfully!' );

            }

            return redirect( '/brannium-clients-contacts' );
        }
    }

    public function createUser( $postData, $lastInsertId, $userId ) {
        $User = new User();
        $User->name     = $postData['first_name'] ? $postData['first_name'] . ' ' . $postData['surname'] : $User->name;
        $User->fname = $postData['first_name'] ? $postData['first_name'] : $User->fname;
        $User->lname = $postData['surname'] ? $postData['surname'] : $User->lname;
        $User->password = Hash::make( 'wippli@123' );
        $User->email = $postData['email'] ? $postData['email'] : $User->email;
        $User->phone = $postData['phone'] ? $postData['phone'] : $User->phone;
        $User->address = $postData['address1'] ? $postData['address1'] : $User->address;
        $User->contact_id = $lastInsertId;
        $User->user_type = 5;
        $User->email_verified_at =  date( 'Y-m-d H:i:s' );
        $User->created_at = date( 'Y-m-d H:i:s' );

        // prd( $postData );
        if ( $User->save() ) {
            return $User->id;
        } else {
            return 'error';
        }
    }

    public function saveBusinessDetails( Request $request ) {
        if ( Auth::check() ) {

            $userDetails = getUserDetails();
            $postData = $request->post();
            if ( empty( $postData ) ) {
                $request->session()->flash( 'message.level', 'danger' );
                $request->session()->flash( 'message.content', 'Error!' );
                return redirect( '/business-details' );

            }
            $businesId = !empty( $postData['business_id'] ) ? $postData['business_id'] : '';
            $businessDetails = empty( $postData['business_id'] ) ? new BusinessDetail() : BusinessDetail::where( ['id' => $businesId] )->first();

            $businessDetails->user_id = !empty( $userDetails['id'] ) ? $userDetails['id'] :'';
            $businessDetails->business_name = !empty( $postData['business_name'] ) ? $postData['business_name'] : $businessDetails->business_name;
            $businessDetails->business_legal_name = $postData['business_legal_name'] ? $postData['business_legal_name'] : $businessDetails->business_legal_name;
            $businessDetails->business_branch = $postData['business_branch'] ? $postData['business_branch'] : $businessDetails->business_branch;
            $businessDetails->industry = $postData['industry'] ? $postData['industry'] : $businessDetails->industry;
            $businessDetails->business_sort_name = $postData['business_sort_name'] ? ( $postData['business_sort_name'] ) : $businessDetails->business_sort_name;
            $businessDetails->business_initials = @$postData['business_initials'] ? $postData['business_initials'] : $businessDetails->business_initials;
            $businessDetails->business_number = @$postData['business_number'] ? $postData['business_number'] : $businessDetails->business_number;
            $businessDetails->business_number_type = @$postData['business_number_type'] ? $postData['business_number_type'] : $businessDetails->business_number_type;
            $businessDetails->tax_number = @$postData['tax_number'] ? $postData['tax_number'] : $businessDetails->tax_number;
            $businessDetails->tax_number_type =  @$postData['tax_number_type'] ? $postData['tax_number_type'] : $businessDetails->tax_number_type;

            $businessDetails->country = @$postData['country'] ? $postData['country']: $businessDetails->country;
            $businessDetails->state = @$postData['state'] ? $postData['state']: $businessDetails->state;
            $businessDetails->address1 = @$postData['address1'] ? $postData['address1']: $businessDetails->address1;
            $businessDetails->address2 = @$postData['address2'] ? $postData['address2']: $businessDetails->address2;
            $businessDetails->city = @$postData['city'] ? $postData['city']: $businessDetails->city;
            $businessDetails->post_code = @$postData['post_code'] ? $postData['post_code']: $businessDetails->post_code;

            $businessDetails->email = @$postData['email'] ? $postData['email']: $businessDetails->email;
            $businessDetails->contact = @$postData['contact'] ? $postData['contact']: $businessDetails->contact;
            $businessDetails->business_type	 = @$postData['business_type	'] ? $postData['business_type	']: $businessDetails->business_type	;

            $businessDetails->linkedin = @$postData['linkedin'] ? $postData['linkedin']: $businessDetails->linkedin;
            $businessDetails->twitter = @$postData['twitter'] ? $postData['twitter']: $businessDetails->twitter;
            $businessDetails->instagram = @$postData['instagram'] ? $postData['instagram']: $businessDetails->instagram;
            $businessDetails->facebook = @$postData['facebook'] ? $postData['facebook']: $businessDetails->facebook;
            $businessDetails->youtube = @$postData['youtube'] ? $postData['youtube']: $businessDetails->youtube;
            $businessDetails->anythingelse = @$postData['anythingelse'] ? $postData['anythingelse']: $businessDetails->anythingelse;
            $businessDetails->logocolours = @$postData['logocolours'] ? $postData['logocolours']: $businessDetails->logocolours;
            $businessDetails->coloricon = @$postData['coloricon'] ? $postData['coloricon']: $businessDetails->coloricon;
            $businessDetails->iconnegative = @$postData['iconnegative'] ? $postData['iconnegative']: $businessDetails->iconnegative;
            $businessDetails->primarydarkcolour1 = @$postData['primarydarkcolour1'] ? $postData['primarydarkcolour1']: $businessDetails->primarydarkcolour1;
            $businessDetails->primarydarkcolour2 = @$postData['primarydarkcolour2'] ? $postData['primarydarkcolour2']: $businessDetails->primarydarkcolour2;
            $businessDetails->primarylightcolour1 = @$postData['primarylightcolour1'] ? $postData['primarylightcolour1']: $businessDetails->primarylightcolour1;
            $businessDetails->primarylightcolour2 = @$postData['primarylightcolour2'] ? $postData['primarylightcolour2']: $businessDetails->primarylightcolour2;
            $businessDetails->businessdrive = @$postData['businessdrive'] ? $postData['businessdrive']: $businessDetails->businessdrive;
            $businessDetails->businessdropbox = @$postData['businessdropbox'] ? $postData['businessdropbox']: $businessDetails->businessdropbox;

            if ( empty( $postData['business_id'] ) ) {
                $businessDetails->created_at = date( 'Y-m-d H:i:s' );
                $businessDetails->save();

                $request->session()->flash( 'message.level', 'success' );
                $request->session()->flash( 'message.content', 'Contact added successfully!' );
            } else {
                $businessDetails->updated_at = date( 'Y-m-d H:i:s' );
                $businessDetails->update();

                $request->session()->flash( 'message.level', 'success' );
                $request->session()->flash( 'message.content', 'Contact updated successfully!' );
            }
            return redirect( '/brannium-clients-contacts' );
        }
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function becomeTutor() {
        if ( Auth::check() ) {
            $LcId = getUser_Detail_ByParam( 'id' );
            $SubjectSyllabus = DB::table( 'subjects' )->get()->toArray();
            $BecomeaTutor = BecomeaTutor::where( ['user_id' => $LcId] )->first();
            $Institute = new Institute();
            $Institutes = $Institute->getAllInstitute();
            //            pr( $Institutes );
            $BecomeaTutor = !empty( $BecomeaTutor ) ? $BecomeaTutor : '';
            $SyllabusDetails = isset( $BecomeaTutor->syllabus_details ) ? json_decode( $BecomeaTutor->syllabus_details ) : '';

            $ResumeDetails = isset( $BecomeaTutor->resume_details ) ? json_decode( $BecomeaTutor->resume_details ) : [];
            $Services = isset( $BecomeaTutor->lession_ids ) ? json_decode( $BecomeaTutor->lession_ids ) : [];
            $TeachingLocations = isset( $BecomeaTutor->loc_ids ) ? json_decode( $BecomeaTutor->loc_ids ) : [];
            $FeeCollection = isset( $BecomeaTutor->fee_collect_id ) ? json_decode( $BecomeaTutor->fee_collect_id ) : [];
            $Languages = isset( $BecomeaTutor->language_id ) ? json_decode( $BecomeaTutor->language_id ) : [];
            //            pr( $insData );

            return view( 'sites.become-tutor', [
                'Tutordetail' => $BecomeaTutor,
                'SyllabusDetails' => $SyllabusDetails,
                'Services' => $Services,
                'teachingLocations' => $TeachingLocations,
                'feeCollection' => $FeeCollection,
                'languages' => $Languages,
                'tutorId' => $LcId,
                'SubjectSyllabus' => $SubjectSyllabus,
                'active' => 'profile',
                'sideActive' => 'becomeTutor',
                'Institutes' => $Institutes,
                'ResumeDetails' => $ResumeDetails,
            ] );
        }
        return redirect( '/' );
    }

    public function becomeaTutor( Request $request ) {

        $userId = getUser_Detail_ByParam( 'id' );
        $isExist = BecomeaTutor::where( ['user_id' => $userId] )->first();
        $postData = $request->all();

        $BecomeaTutor = empty( $isExist ) ? new BecomeaTutor() : BecomeaTutor::where( ['user_id' => $userId] )->first();
        $BecomeaTutor->user_id = empty( $isExist ) ? $userId : $BecomeaTutor->user_id;

        /* Save Summary */
        if ( $postData['saveButton'] == 'saveSummary' ) {
            $BecomeaTutor->profile_description = $request->input( 'profile_desc' ) ? $request->input( 'profile_desc' ) : $BecomeaTutor->profile_description;
            $BecomeaTutor->teaching_style = $request->input( 'teaching-style' ) ? $request->input( 'teaching-style' ) : $BecomeaTutor->teaching_style;
        }
        /* Save Resume */
        if ( $postData['saveButton'] == 'saveResume' ) {

            $BecomeaTutor->qualification_title = $request->input( 'qualification_title' ) ? $request->input( 'qualification_title' ) : $BecomeaTutor->qualification_title;
            $BecomeaTutor->resume_details = $request->input( 'Qualification' ) ? json_encode( $request->input( 'Qualification' ) ) : $BecomeaTutor->resume_details;
        }

        /* Save Subject */
        if ( $postData['saveButton'] == 'saveSubject' ) {
            $BecomeaTutor->syllabus_details = $request->input( 'syllabus_details' ) ? json_encode( $request->input( 'syllabus_details' ) ) : $BecomeaTutor->syllabus_details;
            $BecomeaTutor->subjects = $request->input( 's_id' ) ? json_encode( $request->input( 's_id' ) ) : $BecomeaTutor->subjects;
        }
        /* Save Option */
        if ( $postData['saveButton'] == 'saveOption' ) {
            $BecomeaTutor->lession_ids = $request->input( 'lession_ids' ) ? json_encode( $request->input( 'lession_ids' ) ) : $BecomeaTutor->lession_ids;
            $BecomeaTutor->loc_ids = $request->input( 'loc_ids' ) ? json_encode( $request->input( 'loc_ids' ) ) : $BecomeaTutor->loc_ids;
            $BecomeaTutor->fee_collect_id = $request->input( 'fee_collect_id' ) ? json_encode( $request->input( 'fee_collect_id' ) ) : $BecomeaTutor->fee_collect_id;
            $BecomeaTutor->language_id = $request->input( 'language_id' ) ? json_encode( $request->input( 'language_id' ) ) : $BecomeaTutor->language_id;
        }
        //        prd( $BecomeaTutor->resume_details );

        if ( empty( $isExist ) ) {
            $BecomeaTutor->created_at = date( 'Y-m-d H:i:s' );
            $BecomeaTutor->save();
            set_flash_message( 'Become a tutor added successfully', 'alert-success' );
        } else {
            $BecomeaTutor->updated_at = date( 'Y-m-d H:i:s' );
            $BecomeaTutor->update();
            set_flash_message( 'Become a tutor updated successfully', 'alert-success' );
        }
        return redirect( '/becometutor' );
    }

    public function editprofile( Request $request, $LcId = null ) {
        if ( Auth::check() ) {
            if ( $LcId == getUser_Detail_ByParam( 'id' ) ) {
                $profileDetails = getUserDetails();
                $imgFolder = ( $profileDetails->user_type == 4 ) ? 'student' : 'tutor';
                $disabled = ( $profileDetails->verifyOtp == 'verified' ) ? 'disabled' : '';
                $dob = ( $profileDetails->dob == 'verified' ) ? explode( '-', $profileDetails->dob ) : '';
                $years = @$dob[0];
                $months = @$dob[1];
                $days = @$dob[2];
                $phoneValidate = !empty( $profileDetails->verifyOtp ) ? ( $profileDetails->verifyOtp == 'verified' ? 'validate' : 'notvalidate' ) : '';

                if ( !empty( $LcId ) ) {
                    $userType = getUser_Detail_ByParam( 'user_type' );
                    $view = ( $userType == 4 ) ? 'sites.edit_profile' : 'sites.updateProfile';
                    return view( $view, ['tutorId' => $LcId, 'active' => 'editprofile', 'imgFolder' => $imgFolder, 'disabled' => $disabled, 'phoneValidate' => $phoneValidate] );
                } else {
                    return view( 'error404' );
                }
            } else {
                return view( 'error404' );
            }
        }
        return redirect( '/' );
    }

    public function viewProfile( Request $request ) {
        if ( Auth::check() ) {
            $profileDetails = getUserDetails();
            $imgFolder = ( $profileDetails->user_type == 4 ) ? 'student' : 'tutor';

            $userType = getUser_Detail_ByParam( 'user_type' );
            //                    $view = ( $userType == 4 ) ? 'sites-student.userProfile' : 'sites.updateProfile';
            $view = 'sites-student.userProfile';
            return view( $view, ['active' => 'userProfile', 'imgFolder' => $imgFolder, 'userDetails' => $profileDetails] );
        }
        return redirect( '/' );
    }

    public function changeCoverBanner( Request $request ) {
        if ( Auth::check() ) {

            $profileDetails = getUserDetails();

            $imgFolder = 'CoverBanner';
            $userId = getUser_Detail_ByParam( 'id' );

            $User = User::where( ['id' => $userId] )->first();
            //            prd( $User );
            if ( $file = $request->hasFile( 'cover_image' ) ) {
                $file = $request->file( 'cover_image' );
                $User->cover_image = upload_site_images( $userId, $file, $imgFolder );
                if ( $User->update() ) {
                    $response['resCode'] = 200;
                    $response['resMsg'] = 'Cover Image updated successfully';
                    set_flash_message( 'Cover Image updated successfully', 'alert-success' );
                } else {
                    $response['resCode'] = 500;
                    $response['resMsg'] = 'Internal server error';
                    set_flash_message( 'Internal server error.', 'alert-danger' );
                }
                return response()->json( $response );
            }
        }
    }

    /**
    * Function to update user profile
    * @param void
    * @return array
    */

    public function updateProfile( Request $request ) {
        // Get the formData
        $userDetails = $request->post();
        $response = [];
        $image = $request->file( 'profile_image' );

        $this->validate( $request, [
            //'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id . ',id',
        ] );

        if ( !empty( $userDetails['user_id'] ) ) {
            // Existing record, update it
            $User = User::where( ['id' => $userDetails['user_id']] )->first();
            $imgFolder = ( $User->user_type == 4 ) ? 'student' : 'tutor';
            $User->name = $userDetails['fname'] . ' ' . $userDetails['lname'];
            //            $User->username = $userDetails['fname'] . '_' . $userDetails['lname'];
            $User->fname = $userDetails['fname'];
            $User->lname = $userDetails['lname'];
            $User->alternatephone = $userDetails['alternatephone'];
            $User->phone = ( $User->verifyOtp != 'verified' ) ? @$userDetails['contact'] : $User->phone;
            $User->address = $userDetails['address'];
            $User->gender = $userDetails['gender'];
            $User->dob = $userDetails['years'] . '-' . $userDetails['months'] . '-' . $userDetails['days'];
            $User->updated_at = date( 'Y-m-d H:i:s' );
            //            pr( $request->file( 'user_image' ) );

            //            prd( $userDetails );
            if ( $file = $request->hasFile( 'user_image' ) ) {
                $file = $request->file( 'user_image' );
                $User->avatar = upload_site_images( $userDetails['user_id'], $file, $imgFolder );
            }

            if ( $User->update() ) {
                $response['resCode'] = 0;
                $response['resMsg'] = 'Profile updated successfully';
                set_flash_message( 'Profile updated successfully.', 'alert-success' );
            } else {
                $response['resCode'] = 2;
                $response['resMsg'] = 'Internal server error';
                set_flash_message( 'Internal server error.', 'alert-danger' );
            }
        }
        return response()->json( $response );
    }

    public function rate_saler() {

        $user = DB::table( 'users' )->where( 'id', 7 )->first();
        //echo '<pre>';
        print_r( $user->id );
        die;
        return view( 'ratesaller', compact( 'user' ) );
    }

    //GET SUBJECT SYLLABUS LIST DATA BY SUBJECT ID AJAX REQUEST

    public function getSubjectSyllabusListById( Request $request ) {
        $response = [];
        $subjectSyllabus = $request->post();
        $subject_id = $subjectSyllabus['subject_id'];
        $subject_name = $subjectSyllabus['subject_name'];
        $html = 'not found';
        $data = DB::table( 'subjects' )->where( 'subjects_name', $subject_name )->where( 'id', $subject_id )->first();
        if ( !empty( $data ) ) {
            $response['c_id'] = $data->id;
            $response['c_name'] = $data->subjects_name;
            $syllabus = DB::table( 'syllabuslists' )->where( 'subject_id', $subject_id )->select( 'id AS s_id', 'syllabus_name AS s_name' )->pluck( 's_name', 's_id' );
            if ( count( $syllabus ) != 0 ) {
                //            prd( count( $syllabus ) );
                $html = View::make( 'sites.syllabus-rendor', compact( ['syllabus', 'subject_name', 'subject_id'] ) )->render();
            }
            $response['syllabus'] = $syllabus;
        }
        return $html;
        //        return response()->json( [$response] );
    }

    //BECOME A EDUCATION PARTNER BY GET REQUEST

    public function becomeaEducationPartner( Request $request, $type = null ) {
        if ( Auth::check() ) {
            $uType = getUser_Detail_ByParam( 'user_type' );

            $LcId = getUser_Detail_ByParam( 'id' );
            $LearningCenterDetails = findData( 'learning_centers', '*', 'user_id', $LcId );
            $tutorStudents = TutorStudents::where( ['student_id' => $LcId] )->first();
            //            pr( $tutorStudents );
            $BecomeaTutor = findData( 'learningcenter_details', '*', 'user_id', $LcId );
            if ( ( $uType == 4 ) && !empty( $tutorStudents ) ) {
                return redirect( 'student/dashboard' );
            }
            //            if ( !empty( $BecomeaTutor ) ) {
            //                return redirect( '/becometutor' );
            //            }

            $EducationButtons = [];
            $EducationButtons['Button']['FreeTutor'] = 'I am a Freelance Tutor';
            $EducationButtons['Button']['LearningCentre'] = 'I manage a Learning Centre';
            $EducationButtons['FormShow'] = ( $type == 'LearningCentre' ) ? 'LearningCentre' : '';
            $EducationButtons['LearningCenterDetails'] = isset( $LearningCenterDetails[0] ) ? $LearningCenterDetails[0] : '';

            return view( 'sites.become-education-partner-step1', ['EducationButtons' => $EducationButtons, 'active' => 'profile', 'sideActive' => 'becomeEdu'] );
        }
        return redirect( '/' );
    }

    //SAVE LEARNING CENTER DATA BY POST REQUEST

    public function createLearningCenter( Request $request ) {
        //        prd( $request->all() );
        if ( Auth::check() ) {
            $LcId = getUser_Detail_ByParam( 'id' );
            $isExist = findData( 'learning_centers', '*', 'user_id', $LcId );
            if ( empty( $isExist ) ) {
                // New record, save it
                $LearningCenter = new LearningCenter();
                $LearningCenter->user_id = $LcId;
                $LearningCenter->lc_name = $request->input( 'lc_name' );
                $LearningCenter->lc_address = $request->input( 'lc_address' );
                $LearningCenter->lc_contact = $request->input( 'lc_contact' );
                $LearningCenter->lc_description = $request->input( 'lc_description' );
                $LearningCenter->lc_status = 1;
                $LearningCenter->created_at = date( 'Y-m-d H:i:s' );

                if ( $file = $request->hasFile( 'tutor_logo' ) ) {
                    $file = $request->file( 'tutor_logo' );
                    $LearningCenter->tutor_logo = upload_site_images( $LcId, $file, 'tutor' );
                }
                if ( !empty( $LcId ) ) {
                    $LcUser = User::where( ['id' => $LcId] )->first();
                    $LcUser->user_type = 2;
                    $LcUser->update();
                }
                set_flash_message( 'Thank you for collaborating with us.You are now registered as a Learning Center.', 'alert-success' );
                $LearningCenter->save();
            } else {
                $LearningCenter = LearningCenter::where( ['user_id' => $LcId] )->first();
                $LearningCenter->user_id = $LcId;
                $LearningCenter->lc_name = $request->input( 'lc_name' );
                $LearningCenter->lc_address = $request->input( 'lc_address' );
                $LearningCenter->lc_contact = $request->input( 'lc_contact' );
                $LearningCenter->lc_description = $request->input( 'lc_description' );
                $LearningCenter->lc_status = 1;
                $LearningCenter->updated_at = date( 'Y-m-d H:i:s' );

                if ( $file = $request->hasFile( 'tutor_logo' ) ) {
                    $file = $request->file( 'tutor_logo' );
                    $LearningCenter->tutor_logo = upload_site_images( $LcId, $file, 'tutor' );
                }
                $LearningCenter->update();
                set_flash_message( 'Learning Center Updated successfully', 'alert-success' );
            }
            return redirect( '/becomeaeducation_partner/LearningCentre' );
        }
        return redirect( '/' );
    }

    //GET TUTOR STUDENTS LIST POST REQUEST

    public function isEmailExist( Request $request ) {
        $response = [];
        $postData = $request->post();
        $email_id = $postData['email'];
        return is_email_exist( $email_id );
    }

    public function change_pwd() {
        return view( 'sites.change_pwd' );
    }

    public function update_changed_pwd( Request $request ) {
        $this->validate( $request, [
            'current-password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ] );
        $request_data = $request->All();
        $current_password = Auth::User()->password;

        if ( Hash::check( $request_data['current-password'], $current_password ) ) {
            $user_id = Auth::User()->id;
            $obj_user = User::find( $user_id );
            $obj_user->password = Hash::make( $request_data['password'] );
            $obj_user->save();
            return redirect()->back()->with( 'success', 'Password changed successfully!' );
        } else {
            return redirect()->back()->with( 'error', 'Please enter correct current password' );
        }
    }

    //GET TUTOR STUDENTS LIST POST REQUEST

    public function emailverify( Request $request, $userId, $LcId = null ) {
        $res = is_email_verified( $userId );
        //        prd( $res );
        if ( !empty( $userId ) ) {
            //TUTOR STUDENTS MAP DATA SAVE
            $tutorStudent = TutorStudents::where( ['lc_id' => $LcId, 'student_id' => $userId] )->first();
            if ( !empty( $tutorStudent ) ) {
                $tutorStudent->status = '1';
                $tutorStudent->update();
                if ( $res == 'verified' ) {
                    return redirect( '/home' );
                } else {
                    $user = User::where( ['id' => $userId] )->first();
                    $user->email_verified_at = date( 'Y-m-d H:i:s' );
                    $user->update();
                    set_flash_message( 'Your e-mail is verified. You can now login', 'alert-success' );
                    return redirect( '/login' );
                }
            } else {
                return view( 'error404' );
            }
        }
    }

    public function sendOtp( Request $request ) {
        $postData = $request->post();

        $mobile = $postData['phone'];
        $response = response()->json( ['Status' => 'Error', 'Details' => 'Please enter valid mobile number'] );
        if ( !empty( $mobile ) ) {
            $api = '2e04c982-5863-11ea-9fa5-0200cd936042';
            $otp = rand( 111111, 999999 );
            $userId = getUser_Detail_ByParam( 'id' );
            $user = User::where( ['id' => $userId] )->first();
            $user->verifyOtp = $otp;
            if ( $user->verifyOtp != 'verified' ) {
                //                prd( $user->verifyOtp );
                $url = "https://2factor.in/API/V1/$api/SMS/+91$mobile/$otp";
                $response = json_decode( file_get_contents( $url ), true );
            }
            $user->update();
        }
        return $response;
    }

    public function validateOtp( Request $request ) {
        $postData = $request->post();
        $response = response()->json( ['Status' => 'Error', 'Details' => 'OTP Mismatch'] );

        $otp = $postData['otp'];
        if ( !empty( $otp ) ) {
            $userId = getUser_Detail_ByParam( 'id' );
            $user = User::where( ['id' => $userId] )->first();
            if ( $user->verifyOtp == $otp ) {
                $user->verifyOtp = 'verified';
                $user->update();
                //            prd( $user );
                $response = response()->json( ['Status' => 'Success', 'Details' => 'OTP Matched'] );
            }
        }
        return $response;
    }

}
?>

