<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
  public function __construct()
  {
    parent::__construct() ;
    $this->load->model('search_model') ;
  }


  public function Identity($slug = null){
    $data['cars'] = $this->search_model->get_carss($slug);
    $car_id = $data['cars'][0]['carID'];
    $data['page']='cart/cart2';
    $this->load->view('menu/content',$data);
  }
  public function ConfirmPayment($slug = null){
    $config['upload_path'] ='./driving_license/' ;
    $config['allowed_types'] = 'jpg|jpeg|png|gif' ;
    $config['file_name'] = $_FILES['driving_license']['name'] ;
    $config['max_size']   = 1000000;
    $config['max_width']  = 10240;
    $config['max_height'] = 7680;
    //Load upliad library and initialize configuration
    $this->load->library('upload',$config) ;
    $this->upload->initialize($config) ;
    $this->upload->do_upload('driving_license') ;
    $data_upload_file= $this->upload-> data() ;
    $image = $data_upload_file['file_name'] ;
    $license = array(
      'license' => $image
    ) ;

    $success = $this->search_model->confirmLicense($license) ;
    $data['cars'] = $this->search_model->get_carss($slug);
    $data['temporaryData'] = $this->search_model->get_temporary() ;
    $data['location'] = $this->search_model->get_location($slug) ;
    $car_id = $data['cars'][0]['carID'];
    $data['page']='cart/cart3';
    $this->load->view('menu/content',$data);
  }
  public function ConfirmMessage($slug = null){
    $booking = array(
      'carID' => $this->input->post('carID') ,
      'userID' => $this->input->post('userID'),
      'start_date' => $this->input->post('start_date'),
      'end_date' => $this->input->post('end_date'),
      'total_price' => $this->input->post('totalprice'),
      'location' => $this->input->post('location')
    ) ;
    $data['databooking'] = $this->search_model->confirmBooking($booking) ;
    $data['temporaryData'] = $this->search_model->get_temporary() ;
    $data['cars'] = $this->search_model->get_carss($slug);
    $car_id = $data['cars'][0]['carID'];
    $data['page']='cart/cart4';
    $this->load->view('menu/content',$data);
  }
  public function Cart5s(){
    $data['cars'] = $this->search_model->get_carss($slug);
    $data['temporaryData'] = $this->search_model->get_temporary() ;
    $data['page']='cart/cart5';
    $this->load->view('menu/content',$data);
  }
}
