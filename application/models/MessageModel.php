<?php


class MessageModel extends CI_Model
{

    function is_message_exist($name, $email, $phone, $subject, $message){
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('sender_name', $name);
        $this->db->where('sender_email', $email);
        $this->db->where('sender_phone', $phone);
        $this->db->where('sender_message_subject', $subject);
        $this->db->where('sender_message', $message);

        $result = $this->db->get()->result();

        if($result == null){
            return true;
        }else{
            return false;
        }
    }

    function saveMessage($message){
        $result = $this->db->insert('tbl_message', $message);

        if($result){
            return true;
        }else{
            return false;
        }
    }


    function getMessagesForTable($param){
        $filter = $param['search'];
        $id = $param['id'];

        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where("(`tbl_message.message_id` LIKE '%$filter%'");
        $this->db->or_where("`tbl_message.sender_name` LIKE '%$filter%'");
        $this->db->or_where("`tbl_message.sender_email` LIKE '%$filter%'");
        $this->db->or_where("`tbl_message.sender_phone` LIKE '%$filter%'");
        $this->db->or_where("`tbl_message.message_status` LIKE '%$filter%')");
        $this->db->limit($param['length'],$param['start']);
        $query = $this->db->get();
        $result = $query->result();

        $returnData['data'] =  $result;
        $returnData['recordsTotal'] = $this->getRowCountOfGetMessagesForTable($id);
        $returnData['draw'] = $param['draw'];

        if($filter == null)
            $returnData['recordsFiltered'] = $this->getRowCountOfGetMessagesForTable($id);
        else
            $returnData['recordsFiltered'] = $query->num_rows();

        return $returnData;
    }

    function getRowCountOfGetMessagesForTable($id){

        $this->db->select('*');
        $this->db->from('tbl_message');
        $query = $this->db->get();

        return $query->num_rows();
    }

    function deleteMessage($id){

        $this->db->where('message_id', $id);
        $this->db->delete('tbl_message');

        return $this->db->affected_rows();

    }

    function viewMessage($id){
        $this->db->select('sender_message_subject, sender_message');
        $this->db->from('tbl_message');
        $this->db->where('message_id', $id);

        $result = $this->db->get()->result();

        if($result != null){
            $this->updateMessage($id);
            return $result;
        }else{
            return null;
        }
    }

    function updateMessage($id){
        $this->db->set('message_status', 'READ');
        $this->db->where('message_id', $id);
        $this->db->update('tbl_message');

        $result = $this->db->affected_rows();

        return $result;
    }

    function getCountOfMessage(){
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('message_status', 'NEW');
        $query = $this->db->get();

        return $query->num_rows();
    }

}