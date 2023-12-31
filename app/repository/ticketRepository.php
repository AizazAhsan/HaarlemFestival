<?php
require_once '../model/ticket.php';

include_once("baseRepository.php");

class ticketRepository extends \repository\baseRepository{

        public function getTicketById($id){
            $sql = "SELECT * FROM tickets WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['id' => $id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'ticket');

            $result = $stmt->fetch();
            return $result;
        }

        public function getTicketsByOrderId($order_id){
            $sql = "SELECT * FROM tickets WHERE order_id = :order_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['order_id' => $order_id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'ticket');

            $result = $stmt->fetchAll();
            return $result;
        }

        public function insertTicket($ticket){
            $sql = "INSERT INTO tickets (quantity, price, ";

            //update query with event type
            $sql .= $this->updateQueryWithEventType($ticket);
            $sql .= "status, order_id, user_id, vat_id) VALUES (:quantity, :price, ";

            //update query with values
            $sql .= $this->updateQueryWithValues($ticket);

            $sql .= ":status, :order_id, :user_id, :vat_id)";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':quantity', $ticket->quantity);
            $stmt->bindParam(':price', $ticket->price);

            //update query with bind params
            $this->updateQueryWithBindParams($stmt, $ticket);

            $stmt->bindParam(':status', $ticket->status);
            $stmt->bindParam(':order_id', $ticket->order_id);
            $stmt->bindParam(':user_id', $ticket->user_id);
            $stmt->bindParam(':vat_id', $ticket->vat_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function scanTicket($ticket){

            if($ticket->status == 'Scanned'){
                return false;
            }
            $sql = "UPDATE tickets SET status = 'Scanned' WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['id' => $ticket->id]);
            return true;
        }

        //get all sold tickets for a specific dance event
        public function noOfTicketsForDanceEvent($event_id){
            $sql = "SELECT COUNT(*) AS ticket_count FROM tickets WHERE dance_event_id = :event_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['event_id' => $event_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['ticket_count'];
        }

        public function updateQueryWithEventType($ticket){
            $sql = "";
            if(isset($ticket->dance_event_id)){
                $sql = "dance_event_id, ";
            }
            else if(isset($ticket->yummy_event_id)){
                $sql = "yummy_event_id, ";
            }
            else if(isset($ticket->history_event_id)){
                $sql = "history_event_id, ";
            }
            else if(isset($ticket->access_pass_id)){
                $sql = "access_pass_id, ";
            }
            return $sql;
        }

        public function updateQueryWithValues($ticket){
            $sql = "";
            if(isset($ticket->dance_event_id)){
                $sql = ":dance_event_id, ";
            }
            else if(isset($ticket->yummy_event_id)){
                $sql = ":yummy_event_id, ";
            }
            else if(isset($ticket->history_event_id)){
                $sql = ":history_event_id, ";
            }
            else if(isset($ticket->access_pass_id)){
                $sql = ":access_pass_id, ";
            }
            return $sql;
        }

        public function updateQueryWithBindParams($stmt, $ticket){
            if(isset($ticket->dance_event_id)){
                $stmt->bindParam(':dance_event_id', $ticket->dance_event_id);
            }
            else if(isset($ticket->yummy_event_id)){
                $stmt->bindParam(':yummy_event_id', $ticket->yummy_event_id);
            }
            else if(isset($ticket->history_event_id)){
                $stmt->bindParam(':history_event_id', $ticket->history_event_id);
            }
            else if(isset($ticket->access_pass_id)){
                $stmt->bindParam(':access_pass_id', $ticket->access_pass_id);
            }
        }
}