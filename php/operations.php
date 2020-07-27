<?php

require_once("component.php");
require_once("db.php");

$con = CreateDb();

if (isset($_POST['create'])) {
    createData();
}

if (isset($_POST['update'])) {
    UpdateData();
}

if(isset($_POST['delete'])){
    DeleteRecord();
}

function createData()
{
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if ($bookname && $bookpublisher && $bookprice) {

        $sql = "INSERT INTO books(book_name, book_publisher, book_price) VALUES('$bookname', '$bookpublisher', '$bookprice')";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("background-color: lightgreen; padding:1em", "Record Added Successfully");
        } else {
            echo "error";
        }
    } else {
        TextNode("background-color: tomato; padding:1em", "Provide Data in the Text Box");
    }
}

function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
}

// Message

function TextNode($style, $msg)
{
    $element = "<h6 style='$style'>$msg</h6>";
    echo $element;
}

// get Data from mysql database

function getData()
{
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// update data
function UpdateData()
{
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if ($bookname && $bookpublisher && $bookprice) {
        $sql = "
            UPDATE books SET book_name = '$bookname', book_publisher = '$bookpublisher', book_price = '$bookprice' WHERE id='$bookid';
        ";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("background-color: lightgreen; padding:1em", "Data Successfully Updated");
        } else {
            TextNode("background-color: tomato; padding:1em", "Enable To Update Data");
        }
    } else {
        TextNode("background-color: tomato; padding:1em", "Select Data Using Edit Icon");
    }
}


// Delete Records
function DeleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM books where id=$bookid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("background-color: lightgreen; padding:1em", "Data Deleted Successfully");
    } else {
        TextNode("background-color: tomato; padding:1em", "Enable To Delete Data");
    }
}

function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i >= 3){
                buttonElement("btn-deleteall", "btn btn-danger", "<i class='fa fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}