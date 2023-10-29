<?php
include("connction.php");
$id = $_GET['id'];
$get_data="SELECT * FROM form_data WHERE id=$id";
$result = $conn->query($get_data);
$row = $result->fetch_assoc();
$data=$row['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .flex {
            display: flex;
            flex-direction: row;
        }

        @media screen and (max-width: 800px) {
            .flex {
                display: flex;
                flex-direction: column;
            }
        }

        .box {
            margin: 10px;
            border-radius: 5px;
            background-color: #f2f2f2;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>
<body>
<div class="container col-md-12">
    <h2>Specimen Distribution Report</h2>
</div>
<div>
    <form action="./update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="container col-md-12 mt-5" style="padding:0px">
            <div class="form-group col-md-4">
                <label for="">Page Title</label>
                <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" class="form-control">
            </div>
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="col-md-12 flex" style="padding:0px">
                        <div class="form-group col col-md-3 col-sm-12">
                            <label for="">Project name</label>
                            <input type="text" value="<?php echo $row['project_name']; ?>" name="project_name" id="project_name" class="form-control">
                        </div>
                        <div class="form-group col col-md-3 col-sm-12">
                            <label for="">Tso name</label>
                            <input type="text" value="<?php echo $row['tso_name']; ?>" name="tso_name" id="tso_name" class="form-control">
                        </div>
                        <div class="form-group col col-md-3 col-sm-12">
                            <label for="">Zoon/Aria</label>
                            <input type="text" value="<?php echo $row['zoon_aria']; ?>" name="zoon_aria" id="zoon_aria" class="form-control">
                        </div>
                        <div class="form-group col col-md-3 col-sm-12">
                            <label for="">Division</label>
                            <input type="text" value="<?php echo $row['division_name']; ?>" name="division_name" id="division_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 flex" style="padding:0px">
                        <div class="form-group col col-md-3 col-sm-12">
                            <label for="">Region</label>
                            <input type="text" value="<?php echo $row['region_name']; ?>" name="region_name" id="region_name" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <div id="section_add" style="padding:0px; display: flex; flex-direction: column">
                    <!-- Existing section template -->
                    <?php
                        
                        $data_array = json_decode($data);
                        $countdata=count($data_array);
                        foreach($data_array as $key => $value){
                        ?>
                        <section class="col-md-12 box" style="padding:13px">
                            <p>Number <span><?php echo $key+1; ?></span></p>
                            <div class="col-md-12 flex" style="padding:0px">
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Teacher name</label>
                                    <input type="text" name="teacher_name[]" value="<?php echo $value->teacher_name; ?>" class="teacher_name form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Designation</label>
                                    <input type="text" name="designation[]" value="<?php echo $value->designation; ?>" class="designation form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Subject</label>
                                    <input type="text" name="subject[]" value="<?php echo $value->subject; ?>" class="subject form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Institute name</label>
                                    <input type="text" name="institute_name[]" value="<?php echo $value->institute_name;;?>" class="institute_name form-control">
                                </div>
                            </div>
                            <div class="col-md-12 flex" style="padding:0px">
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Address</label>
                                    <input type="text" name="address[]" value="<?php echo $value->address; ?>" class="address form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Contact number</label>
                                    <input type="text" name="contact_number[]" value="<?php echo $value->contact_number; ?>" class="contact_number form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">SP QTY</label>
                                    <input type="number" name="sp_qty[]" value="<?php echo $value->sp_qty; ?>" class="sp_qty form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Additional Specimen</label>
                                    <input type="text" name="additional_specimen[]" value="<?php echo $value->additional_specimen; ?>" class="additional_specimen form-control">
                                </div>
                            </div>
                        </section>
                        <?php
                        }
                        ?>
                        <?php if($countdata>=16){ ?>
                          
                            <div id="existing_section">
                        <section class="col-md-12 box" style="padding:13px">
                            <p>Number <span><?php echo $countdata+1; ?></span></p>
                            <div class="col-md-12 flex" style="padding:0px">
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Teacher name</label>
                                    <input type="text" name="teacher_name[]" class="teacher_name form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Designation</label>
                                    <input type="text" name="designation[]" class="designation form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Subject</label>
                                    <input type="text" name="subject[]" class="subject form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Institute name</label>
                                    <input type="text" name="institute_name[]" class="institute_name form-control">
                                </div>
                            </div>
                            <div class="col-md-12 flex" style="padding:0px">
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Address</label>
                                    <input type="text" name="address[]" class="address form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Contact number</label>
                                    <input type="text" name="contact_number[]" class="contact_number form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">SP QTY</label>
                                    <input type="number" name="sp_qty[]" class="sp_qty form-control">
                                </div>
                                <div class="form-group col col-md-3 col-sm-12">
                                    <label for="">Additional Specimen</label>
                                    <input type="text" name="additional_specimen[]" class="additional_specimen form-control">
                                </div>
                            </div>
                        </section>
                    </div>
                        <?php
                        }
                        ?>
                     
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary col-md-3">Submit</button>
                    <a class="btn btn-primary col-md-3" onclick="add_more()">Add more</a>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script>
    let sectionNumber = <?=$countdata+1; ?>;

    function add_more() {

        
        var section_add = document.getElementById('section_add');
        var existing_section = document.getElementById('existing_section');
        sectionNumber++; // Increment the section number
      
        if (sectionNumber >= 16) {
            alert("You can't add more than 15 sections");
            return;
        }else{
        // Clone the existing section and append it
        var clonedSection = existing_section.cloneNode(true);
        section_add.appendChild(clonedSection);

        // Update the section number
        var sectionNumbers = section_add.querySelectorAll("section");
        var lastSection = sectionNumbers[sectionNumbers.length - 1];
        lastSection.querySelector("span").textContent = sectionNumber;
    }
    }
</script>
</body>
</html>
