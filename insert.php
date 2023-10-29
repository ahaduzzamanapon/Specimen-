<?php
include("connction.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $project_name = $_POST['project_name'];
    $tso_name = $_POST['tso_name'];
    $zoon_aria = $_POST['zoon_aria'];
    $division_name = $_POST['division_name'];
    $region_name = $_POST['region_name'];
    // array data
    $teacher_name = $_POST['teacher_name'];
    $designation = $_POST['designation'];
    $subject = $_POST['subject'];
    $institute_name = $_POST['institute_name'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $sp_qty = $_POST['sp_qty'];
    $additional_specimen = $_POST['additional_specimen'];
    $dataarry=[];
    foreach($teacher_name as $key => $value){
        $dataarry[$key]['teacher_name'] = $value;
        $dataarry[$key]['designation'] = $designation[$key];
        $dataarry[$key]['subject'] = $subject[$key];
        $dataarry[$key]['institute_name'] = $institute_name[$key];
        $dataarry[$key]['address'] = $address[$key];
        $dataarry[$key]['contact_number'] = $contact_number[$key];
        $dataarry[$key]['sp_qty'] = $sp_qty[$key];
        $dataarry[$key]['additional_specimen'] = $additional_specimen[$key];
    }

    $data = json_encode($dataarry);

    // Insert the form data into the database

        // Table created successfully, now insert the form data
        $insert_sql = "INSERT INTO form_data (title, project_name, tso_name, zoon_aria, division_name, region_name, data) 
                      VALUES ('$title', '$project_name', '$tso_name', '$zoon_aria', '$division_name', '$region_name', '$data')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Form data submitted and table created successfully.";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    $conn->close();
    header("Location: list.php");
}
?>