<?php
    require_once "dbusers.php";
    class Session {
        public $User;
        private $Timeout;
        public $GUID;

        public function getTimeout(): DateTime {
            return new DateTime($this->Timeout);
        }

        private function setTimeout(DateTime $Timeout) {
            $this->Timeout = $Timeout->format(DATE_ATOM);
        }

        public function __construct($User, $Timeout, $ID){
            $this->User = $User;
            $this->setTimeout($Timeout);
            $this->GUID = $ID;
        }

        public function update_timeout() {
            $db = new DBUsers();
            if ($this->getTimeout() < new DateTime()) {
                //session has ended
                $db->kill_session($this->$User);
            } else {
                //add 10 minutes to the session timeout
                $this->setTimeout(new DateTime())->modify("+10 minutes");
            }
        }

        public function is_valid() {
            $valid = False;
            $db = new DBUsers();
            if ($this->getTimeout() >= new DateTime() && $db->session_exists($this->User, $this->GUID)) {
                $valid = True;
            }

            return $valid;
        }
    }
?>