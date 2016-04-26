<?php
 class Database {
   var $link;  
   var $errors = array();
   var $debug = false;
	var $host = SERVER;
	var $user = USER;
	 var $pass = PASSWORD;
	  var $db = DB_NAME;
	  
   function __construct( ) {
	   $this->connect();
   }
   function __destruct( ) {
	   $this->close();
   }
    
   function connect() {
      $link = mysqli_connect($this-> host, $this-> user, $this-> pass );
      if ( ! $link ) {
        $this->setError("Couldn't connect to database server");
        return false;
      }
       if ( ! mysqli_select_db( $link , $this->db) ) { 
        $this->setError("Couldn't select database: ".$this->db);
        return false;
      }
	  mysqli_set_charset( $link, "utf8");
      $this->link = $link;
      return true;  
   }
   
    function close() {
     mysqli_close($this->link);
      }
 
   function getError( ) {
      return $this->errors[count($this->errors)-1];
    }
  
    function setError( $str ) {
      array_push( $this->errors, $str );
	  foreach ($this->errors as $error){
		  echo $error."<br />";
	  }
    }
  
    function _query( $query ) {
      if ( ! $this->link ) {
        $this->setError("No active db connection");
        return false;
     }
      $result = mysqli_query( $this->link,$query );
      if ( ! $result )
        $this->setError("error: ".mysqli_error($this->link)."<br />Query: ".$query);
      return $result;
    }
  
    function setQuery( $query ) {
        if (! $result = $this->_query( $query ) ) 
        return false;  
      return mysqli_affected_rows( $this->link );
    }
  
    function getQuery( $query, $multiple=true ) {
        if (! $result = $this->_query( $query ) ) 
        return false;  
      $ret = array();
	  if($multiple){
      while ( $row = mysqli_fetch_assoc( $result ) )
       $ret[] = $row;
      return $ret;
	  }
	  else{
		  $row = mysqli_fetch_assoc( $result );
		   return $row;
	  }
    }
 
    function getResource( ) {
      return $this->link;
    }
	 function InsertID( ) {
		 $id = mysqli_insert_id($this->link);
      return $id;
    }
  
    function select($multiple, $table, $condition="", $sort="", $column="") {
		if(empty($column)) $column = "*";
          $query = "SELECT $column FROM $table";
      $query .= $this->_makeWhereList( $condition );  
      if ( $sort != "" )
        $query .= " order by $sort";
      $this->debug( $query );
          return $this->getQuery( $query, $multiple );
    }
  
   function insert( $table, $add_array ) {
          $add_array = $this->_quote_vals( $add_array );
          $keys = "(".implode( array_keys( $add_array ), ", ").")";
          $values = "values (".implode( array_values( $add_array ), ", ").")";
          $query = "INSERT INTO $table $keys $values";
      $this->debug( $query );
          return $this->setQuery( $query );
    }
  
   function update( $table, $update_column, $condition="" ) {
	    $query = "UPDATE $table set ";
		if(is_array($update_column)){
      $update_pairs=array();
      foreach( $update_column as $field=>$val )
       array_push( $update_pairs, "$field=".$this->_quote_val( $val ) );
      $query .= implode( ", ", $update_pairs );
      $query .= $this->_makeWhereList( $condition );  
		}
		else{
			$query .= $update_column;
			$query .= $this->_makeWhereList( $condition ); 
		}
     $this->debug( $query );
          return $this->setQuery( $query );
    }
  
    function delete( $table, $condition="" ) {
          $query = "DELETE FROM $table";
      $query .= $this->_makeWhereList( $condition );  
      $this->debug( $query );
          return $this->setQuery( $query );
    }
    
   function debug( $msg ) {
     if ( $this->debug )
       print "$msg<br>";
   }

   function _makeWhereList( $condition ) {
     if ( empty( $condition ) )
       return "";
     $retstr = " WHERE ";
     if ( is_array( $condition ) ) {
       $cond_pairs=array();
       foreach( $condition as $field=>$val )
         array_push( $cond_pairs, "$field=".$this->_quote_val( $val ) );
       $retstr .= implode( " and ", $cond_pairs );
     } elseif ( is_string( $condition ) && ! empty( $condition ) )
       $retstr .= $condition;
     return $retstr;
   }
 
   function _quote_val( $val ) {
     if ( is_numeric( $val ) )
       return $val;
     return "'".addslashes($val)."'";
   }
 
   function _quote_vals( $array ) {
     foreach( $array as $key=>$val )
       $ret[$key]=$this->_quote_val( $val );
     return $ret;
   }
 }  
 ?>