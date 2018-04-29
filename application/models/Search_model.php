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
}
