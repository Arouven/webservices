<?php

require '../database.php';

class api
{
  private $db;
  private $format;
  function __construct($format = "json")
  {
    $this->db = new database();
    $this->format = $format;
  }

  function selectAllBooks()
  {
    $selectquery = "SELECT * FROM books;";
    $data = $this->db->select($selectquery);
    if ($this->format == "json") {
      return json_encode($data);
    }
  }

  function getBooksByTitle($title)
  {
    $selectquery = "SELECT * FROM books WHERE title = ?;";
    $selectparamType = "s";
    $selectparamArray = array(
      $title
    );
    $data = $this->db->select($selectquery, $selectparamType, $selectparamArray);
    if ($this->format == "json") {
      return json_encode($data);
    }
  }
  function getBooksByAuthor($author)
  {
    $selectquery = "SELECT * FROM books WHERE author = ?;";
    $selectparamType = "s";
    $selectparamArray = array(
      $author
    );
    $data = $this->db->select($selectquery, $selectparamType, $selectparamArray);
    if ($this->format == "json") {
      return json_encode($data);
    }
  }
  function getBooksByPublicationYear($year_published)
  {
    $selectquery = "SELECT * FROM books WHERE year_published = ?;";
    $selectparamType = "s";
    $selectparamArray = array(
      $year_published
    );
    $data = $this->db->select($selectquery, $selectparamType, $selectparamArray);
    if ($this->format == "json") {
      return json_encode($data);
    }
  }
  function getBooksByCategory($category)
  {
    $selectquery = "SELECT * FROM books WHERE category = ?;";
    $selectparamType = "s";
    $selectparamArray = array(
      $category
    );
    $data = $this->db->select($selectquery, $selectparamType, $selectparamArray);
    if ($this->format == "json") {
      return json_encode($data);
    }
  }
}
class xmlapi extends api
{
}
