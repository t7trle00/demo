<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserve extends CI_Controller {
  public function __construct()
  {
    parent::__construct() ;
    $this->load->model('search_model') ;
  }

  public function Reserves($slug = null){
    $data['cars'] = $this->search_model->get_carss($slug);
    $data['calendar'] = $this->search_model->get_calendar($slug) ;
    $data['location'] = $this->search_model->get_location($slug) ;
    $data['car_id'] = $data['cars'][0]['carID'];
    $data['page']='reserve/reserve';
    $this->load->view('menu/content',$data);
  }
  public function identity($slug = null)
  {
    if( $this->input->post('carID') != null)
    {
      $temporary = array(
        'carID' => $this->input->post('carID'),
        'start_date' => $this->input->post('check_in') ,
        'end_date' => $this->input->post('check_out') ,
        'totalprice' => (int) $this->input->post('totalprices')
      ) ;
      $this->search_model->save_temporary($temporary) ;
    }


    $data['cars'] = $this->search_model->get_carss($slug);
    $data['location'] = $this->search_model->get_location($slug) ;
    $car_id = $data['cars'][0]['carID'];
    $data['page'] = 'cart/cart2';
    $this->load->view('menu/content', $data);
  }
}
