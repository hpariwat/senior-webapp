<?php


class Change_email_model extends CI_Model
{
	public function changemail($oldmail, $newmail, $verification_key){
		return $this->db->set(array('email'=>$newmail, 'is_email_verified'=> 'no', 'verification_key'=> $verification_key))->where('email', $oldmail)->update('caregiver');
	}

}
