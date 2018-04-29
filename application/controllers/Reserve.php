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
    $data['car_id'] = $data['cars'][0]['carID'];
    $data['page']='reserve/reserve';
    $this->load->view('menu/content',$data);
  }
  public function car($slug = null)
  {
    $data['cars'] = $this->search_model->get_carss($slug);
    $car_id = $data['cars'][0]['carID'];
    $data['page'] = 'cart/cart';
    $this->load->view('menu/content', $data);
  }
}
