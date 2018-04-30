<?php
/**
 *
 */
class Search_model extends CI_model
{
  public function __construct(){
    $this->load->database();
  }
  public function get_carss($slug=FALSE)
  {
    if($slug === FALSE){
        $this->db->select('*') ;
        $this->db->from('carsphoto') ;
				$query = $this->db->get();
				return $query->result_array();
			}
			$query = $this->db->get_where('carsphoto', array('carID' => $slug));
			return $query->result_array();
		}
  public function get_calendar($carID)
  {
    $this->db->select('*') ;
    $this->db->from('calendar') ;
    $this->db->where('carID',$carID) ;
    return $this->db->get()->result_array() ;
  }
  public function get_location($carID)
  {
    $this->db->select('city') ;
    $this->db->from('users') ;
    $this->db->join('cars','users.id = cars.userID','inner') ;
    $this->db->where('carID',$carID) ;
    $get_id = $this->db->get()->result_array() ;
    $this->db->select('city, title, cover_photo,carID') ;
    $this->db->from('users') ;
    $this->db->join('cars','users.id = cars.userID','inner') ;
    $this->db->where('users.city',$get_id[0]['city']) ;
    return $this->db->get()->result_array() ;
  }
  public function save_temporary($temporary)
  {
    $this->db->insert('temporary',$temporary) ;
  }
  public function get_temporary()
  {
    $this->db->select('*') ;
    $this->db->from('temporary') ;
    return $this->db->get()->result_array() ;
  }

  public function confirmLicense($license)
  {
    $this->db->insert('licenses',$license) ;
  }
  public function get_license()
  {
    $this->db->select('*') ;
    $this->db->from('licenses') ;
    $this->db->get()->result_array() ;
  }
  public function confirmBooking($booking)
  {
    $this->db->insert('bookings',$booking) ;
    $this->db->select('*') ;
    $this->db->from('bookings') ;
    return $this->db->get()->result_array() ;
  }
}
