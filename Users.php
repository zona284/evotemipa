<?php
include_once 'db_connect.php';
class Users {

    private $db;

    // constructor
    function __construct() {
     
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     */
public function storeUser($nim, $password) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
		//$status = "belum";
        $result = mysql_query("INSERT INTO users(unique_id, nim, encrypted_password, salt, status, created_at) VALUES('$uuid', '$nim', '$encrypted_password', '$salt','belum', NOW())");
        // check for successful store
		// maintenance---
        if ($result) {
            // get user details 
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE uid = $uid");
            // return user details
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }
    
    /**
     * Get user by nim and password
     * Login
     */
    public function getUser($nim, $password) {
        $result = mysql_query("SELECT * FROM users WHERE nim = '$nim'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows == 1) {
            $result = mysql_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
				$_SESSION['login'] = true;
				$_SESSION['unique_id'] = $result['unique_id'];
				$last_login=mysql_query("UPDATE users SET updated_at=NOW() WHERE nim = '$nim' ") or die(mysql_error());
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }

    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM users");
        return $result;
    }
	// Getting name
	public function get_fullname($uid){
		$result = mysql_query("SELECT nim FROM users WHERE unique_id = '$uid'");
		$user_data = mysql_fetch_array($result);
		echo $user_data['nim'];
	}
	
	// Getting Last Loged in
	public function get_lastLogin($uid){
		$result = mysql_query("SELECT updated_at FROM users WHERE unique_id = '$uid'");
		$user_data = mysql_fetch_array($result);
		echo $user_data['updated_at'];
	}
	
	public function generate($password){
	
	}
	
    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT nim from users WHERE nim = '$nim'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }
    /*
	 * Encryption
	 */
    public function hashSSHA($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
 
    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {
        try{
            $hash = base64_encode(sha1($password . $salt, true) . $salt);
        }
        catch(Exception $e){
            return $e;
        }
        return $hash;
    }
	
	// Getting session 
	public function checkLogin(){
//		session_start();
		if (ISSET($_SESSION['login']))
		{
			header("location:index.php");
		}
		else if(!ISSET($_SESSION['login'])){
			header("location:login.php");
		}
		return this;
		
	}
	// Logout 
	public function user_logout(){
		$_SESSION['login'] = FALSE;
		session_destroy();
	} 

}

?>