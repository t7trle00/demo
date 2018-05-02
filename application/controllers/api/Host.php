<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Host extends REST_Controller
{
  public function __construct()
  {
    parent::__construct() ;
    $this->load->model('Host_model') ;
  }

  public function listinguniqu_get()
  {
    $listing = $this->Host_model->get_listinguniq() ;
    $userID = $this->get('userid');
    $carID = $this->get('carid') ;

    if ($carID === NULL)
    {
      if($userID === NULL)
      {
        if($listing)
        {
          $this->response($listing, REST_Controller::HTTP_OK);
        }
        else {
          // Set the response and exit
          $this->response([
              'status' => FALSE,
              'message' => 'No listings were found'
          ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
      }
      else {
        $userlisting = $this->Host_model->get_userlisting($userID) ;
        $this->response($userlisting, REST_Controller::HTTP_OK) ;
      }
    }
    else {
      $carlisting = $this->Host_model->get_car($carID) ;
      $this->response($carlisting, REST_Controller::HTTP_OK) ;
    }

      // Check if the users data store contains users (in case the database result returns NULL)
      if ($listing)
      {
          // Set the response and exit
          $this->response($listing, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
      }
      else
      {

      }

    $userID = (int) $userID ;
    $carID = (int) $carID ;
    if ($carID <= 0)
    {
        if($userID <= 0)
        {
          $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        $userlisting = $this->Host_model->get_userlisting($userID) ;

    }
    $carlisting = NULL ;
    $userlisting = NULL ;
    if (!empty($listing))
    {
      $userlisting = $this->Host_model->get_userlisting($userID) ;
      if (!empty($userlisting))
      {
        $carlisting = $this->Host_model->get_car($carID) ;
      }
    }
    if (!empty($carlisting))
    {
      $this->response($carlisting,REST_Controller::HTTP_OK) ;
    }
    else
    {
        // Set the response and exit
        $this->response([
            'status' => FALSE,
            'message' => 'No car was found'
        ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    }
  }
  public function listing_get()
  {
    $listing = $this->Host_model->get_listing() ;
    $userID = $this->get('userid');

    if ($userID === NULL)
    {
      // Check if the users data store contains users (in case the database result returns NULL)
      if ($listing)
      {
          // Set the response and exit
          $this->response($listing, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
      }
      else
      {
          // Set the response and exit
          $this->response([
              'status' => FALSE,
              'message' => 'No users were found'
          ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
      }
    }
    $userID = (int) $userID ;
    if ($userID <= 0)
    {
        // Invalid id, set the response and exit.
        $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
    }
    $SpeListing = NULL ;
    if (!empty($listing))
    {
         $SpeListing = $this->Host_model->get_car($userID) ;
    }
    if (!empty($SpeListing))
    {
        $this->set_response($SpeListing, REST_Controller::HTTP_OK);

    }
    else
    {
        // Set the response and exit
        $this->response([
            'status' => FALSE,
            'message' => 'No users were found'
        ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    }
  }
  public function listing_post()
  {

      $config['upload_path'] ='./cover_gallery/' ;
      $config['allowed_types'] = 'jpg|jpeg|png|gif' ;
      $config['file_name'] = $_FILES['cover_photo']['name'] ;
      $config['max_size']   = 1000000;
      $config['max_width']  = 10240;
      $config['max_height'] = 7680;

      //Load upliad library and initialize configuration
      $this->load->library('upload',$config) ;
      $this->upload->initialize($config) ;

      $this->upload->do_upload('cover_photo') ;
      $data_upload_file = $this->upload-> data() ;

      $image = $data_upload_file['file_name'] ;

      $insert_data = array(
        'userID' => $this->post('userID'),
        'title' => $this->post('title') ,
        'description' => $this->post('description') ,
        'cover_photo' => $image ,
        'type_of_car' => $this->post('type_of_car') ,
        'price' => $this->post('price'),
        'year' => $this->post('year') ,
        'cancellation_policy' => $this->post('cancellation_policy')

      ) ;
      $this->Host_model->add_listing($insert_data) ;
      //data to send to images table
      $number_of_files = sizeof($_FILES['other_photo']['name']) ;
      $files = $_FILES['other_photo'];
      $config['upload_path'] = './other_gallery' ;
      $config['allowed_types'] = 'jpg|jpeg|png|gif' ;
      $config['max_size']   = 1000000000;
      $config['max_width']  = 1024000;
      $config['max_height'] = 768000;
      for ($i = 0 ; $i < $number_of_files ; $i ++)
      {
        $_FILES['other_photo']['name'] =$files['name'][$i] ;
        $_FILES['other_photo']['type'] =$files['type'][$i] ;
        $_FILES['other_photo']['tmp_name'] =$files['tmp_name'][$i] ;
        $_FILES['other_photo']['error'] =$files['error'][$i] ;
        $_FILES['other_photo']['size'] =$files['size'][$i] ;
        $this->upload->initialize($config) ;
        $this->upload->do_upload('other_photo') ;
        $data = $this->upload->data() ;
        $other_photo[$i]['photo'] = $data['file_name'] ;
      }
      $last_insert_id = $this->db->insert_id() ;
      //add other_photo to images table
      $images_list=array_map(
        function($addID) use ($last_insert_id)
          {
            $addID['carID']=$last_insert_id ; return $addID ;
          },
          $other_photo) ;

      $this->Host_model->add_photo($images_list) ;
      // add calendar
      $calendar = array(
        'start_date' => $this->post('check_in') ,
        'end_date'=> $this->post('check_out'),
        'carID' => $last_insert_id
      );

      $this->Host_model->add_calendar($calendar) ;
      $message =
      [
          'userID' => $this->post('userID'),
          'title' => $this->post('title'), // Automatically generated by the model
          'description' => $this->post('description'),
          'cover_photo' => $image,
          'start_date' => $this->post('check_in'),
          'end_date' => $this->post('check_out'),
          'price' => $this->post('price'),
          'type_of_car'=> $this->post('type_of_car'),
          'year' => $this->post('year')
      ];

        $this->set_response($message, REST_Controller::HTTP_CREATED);
  }

//  public function listing_delete()
  public function listinguniqu_delete()
  {
    $carID = (int) $this->get('carid');
    if ( $carID <= 0)
    {
      // Set the response and exit
      $this->response("NULL", REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
    }
    $carlisting=$this->Host_model->get_car($carID) ;
    if(!empty($carlisting[0]['carID']))
    {
      $this->Host_model->get_delete_images($carID) ;
      $this->Host_model->get_delete_calendar($carID) ;
      $this->Host_model->get_delete_listing($carID) ;
      $message = [
          'carId' => $carID,
          'message' => 'Deleted the resource'
      ];
      $this->set_response($message, REST_Controller::HTTP_OK);
    }
    else {
      $message='Error' ;
      $this->set_response($message, REST_Controller::HTTP_NO_CONTENT);
    }
  }
  // public function listing_put()
  // {
  //   $carID = $this->get('carid') ;
  //   $config['file_name'] = basename($this->put('cover_photo')) ;
  //   $config['upload_path'] ='./cover_gallery/' ;
  //   $config['allowed_types'] = 'jpg|jpeg|png|gif' ;
  //   $config['max_size']   = 1000000;
  //   $config['max_width']  = 10240;
  //   $config['max_height'] = 7680;
  //   // $config['file_name'] = basename($_FILES['cover_photo_update']['name']) ;
  //   $this->load->library('upload',$config) ;
  //   $this->upload->initialize($config) ;
  //   $this->upload->do_upload('cover_photo') ;
  //   $data_upload_file = $this->upload-> data() ;
  //   $image = $data_upload_file['file_name'] ;
  //   if(!empty($image))
  //   {
  //     $update_data = array(
  //       'title' => $this->put('title') ,
  //       'description' => $this->put('description') ,
  //       'cover_photo' => $image ,
  //       'type_of_car' => $this->put('type_of_car') ,
  //       'year' => $this->put('year') ,
  //       'cancellation_policy' => $this->put('cancellation_policy')
  //
  //       ) ;
  //   }
  //   else {
  //     $update_data = array(
  //       'title' => $this->put('title') ,
  //       'description' => $this->put('description') ,
  //       'type_of_car' => $this->put('type_of_car') ,
  //       'year' => $this->put('year') ,
  //       'cancellation_policy' => $this->put('cancellation_policy')
  //
  //     ) ;
  //   }
  //   $this->Host_model->get_update($carID,$update_data) ;
  //
  //   $message = [
  //             'carID' => $carID ,
  //             'title' => $this->put('title') ,
  //             'description' => $this->put('description') ,
  //             'cover_photo' => $image ,
  //             'type_of_car' => $this->put('type_of_car') ,
  //             'year' => $this->put('year') ,
  //             'cancellation_policy' => $this->put('cancellation_policy')
  //           ];
  //   $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
  // }




  }
