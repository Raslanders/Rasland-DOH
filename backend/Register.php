require_once('database');
<?php
Class Register {
    private $request
    function __construct($request) {
        $this->request = $request;
    }
    
    public function process() {
        //Put the new user in the database
        $database = new database();
        if(isset($request['flightnumber']) && isset($request['goal'])) {
            
        }
        else {
            return(array('statusCode' => '400', 'message' => 'Arguments are invalid'));
        }
    }
    
}


?>