<?php
/**
 *
 */
class Host_model extends CI_model
{

  public function get_listinguniq()
  {
    $this->db->select('*') ;
    $this->db->from('cars') ;
    $this->db->join('calendar','calendar.carID = cars.carID','left') ;
    return $this->db->get()->result_array() ;
  }
  public function get_userlisting($userID)
  {
    $this->db->select('*') ;
    $this->db->from('cars') ;
    $this->db->join('calendar','calendar.carID = cars.carID','left') ;
    $this->db->where('userID',$userID) ;
    return $this->db->get()->result_array() ;
  }
  public function get_car($carID)
  {
    $this->db->select('*') ;
    $this->db->from('carsphoto') ;
    $this->db->join('calendar','calendar.carID = carsphoto.carID','left') ;
    $this->db->where('carsphoto.carID',$carID) ;
    return $this->db->get()->result_array() ;
  }


  public function get_listing()
  {
    $this->db->select('carsphoto.carID,userID,title,description,cover_photo,type_of_car,year,cancellation_policy,photo,price,calenID,start_date,end_date') ;
    $this->db->from('carsphoto') ;
    $this->db->join('calendar','calendar.carID = carsphoto.carID','left') ;
    return $this->db->get()->result_array() ;
  }
  public function add_listing($insert_data)
  {
    return $this->db->insert('cars',$insert_data) ;
  }

  public function add_photo($images_list)
  {
    return $this->db->insert_batch('images',$images_list) ;
  }
  public function add_calendar($calendar)
  {
    return $this->db->insert('calendar',$calendar) ;
  }
  public function get_delete_images($carID)
  {
    $this->db->where('carID',$carID) ;
    $this->db->delete('images') ;
  }
  public function get_delete_listing($carID)
  {
    $this->db->where('carID',$carID) ;
    $this->db->delete('cars') ;
  }
  public function get_delete_calendar($carID)
  {
    $this->db->where('carID',$carID) ;
    $this->db->delete('calendar') ;
  }
  public function get_cover_photo()
  {
    $this->db->select('carID, title, cover_photo') ;
    $this->db->from('cars') ;
    return $this->db->get()->result_array() ;
  }

  public function getImage($last_insert_id)
  {
    $this->db->select('photo') ;
    $this->db->from('images') ;
    $this->db->where('carID',$last_insert_id) ;
    return $this->db->get()->result_array() ;
  }
  public function get_update($carID,$update_data)
  {
    $this->db->where('carID',$carID) ;
    return $this->db->update('cars',$update_data) ;
  }
  public function update_calendar($calenID,$calendar)
  {
    $this->db->where('calenID',$calenID) ;
    return $this->db->update('calendar',$calendar) ;
  }


 }
