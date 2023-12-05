<?php

@include 'config.php';





if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['name'] = $firstname . ' ' . $surname;
    $_SESSION['gradeLevel'] = $grade_level;
    $_SESSION['address'] = $address;

    $LRN = $_POST['LRN'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $address = $_POST['address'];
    $contact_number = $_POST['number'];
    $age = $_POST['age'];
    $birthdate = $_POST['date'];
    $birthplace = $_POST['birthplace'];
    $last_school_attended = $_POST['lastschool'];
    $school_year = $_POST['sy'];
    $parent_name = $_POST['parentname'];
    $occupation = $_POST['occupation'];
    $parent_address = $_POST['parentaddress'];
    $parent_contact_number = $_POST['parentnum'];
    $card_138 = isset($_FILES['138card']['name']) ? $_FILES['138card']['name'] : '';
    $good_moral = isset($_FILES['goodmoral']['name']) ? $_FILES['goodmoral']['name'] : '';
    $psa = isset($_FILES['psa']['name']) ? $_FILES['psa']['name'] : '';
    $grantee = isset($_POST['grantee']) ? implode(', ', $_POST['grantee']) : '';
    $other_specify = isset($_POST['other_specify']) ? $_POST['other_specify'] : '';
    $grade_level = $_POST['level'];
    $email = $_POST['email'];
    $misc = $_POST['status'];
    $tuition = $_POST['status'];
    $others = $_POST['status'];



    move_uploaded_file(isset($_FILES['138card']['tmp_name']) ? $_FILES['138card']['tmp_name'] : '', 'uploads/' . $card_138);
    move_uploaded_file(isset($_FILES['goodmoral']['tmp_name']) ? $_FILES['goodmoral']['tmp_name'] : '', 'uploads/' . $good_moral);
    move_uploaded_file(isset($_FILES['psa']['tmp_name']) ? $_FILES['psa']['tmp_name'] : '', 'uploads/' . $psa);


    $stmt = $conn->prepare("INSERT INTO enrollment_form (
        LRN, surname, firstname, middlename, address, contact_number, 
        age, birthdate, birthplace, last_school_attended, school_year, 
        parent_name, occupation, parent_address, parent_contact_number, 
        card_138, good_moral, psa, grantee, other_specify, grade_level, email
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param(
        "ssssssssssssssssssssss",
        $LRN,
        $surname,
        $firstname,
        $middlename,
        $address,
        $contact_number,
        $age,
        $birthdate,
        $birthplace,
        $last_school_attended,
        $school_year,
        $parent_name,
        $occupation,
        $parent_address,
        $parent_contact_number,
        $card_138,
        $good_moral,
        $psa,
        $grantee,
        $other_specify,
        $grade_level,
        $email
    );

    $stmt->execute();

    $stmt->close();

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];
    $name = $firstname . " " . $surname;

    $stmt_user = $conn->prepare("INSERT INTO user (lrn, name, email, password, user_type) VALUES (?, ?, ?, ?, ?)");
    $stmt_user->bind_param("sssss", $LRN, $firstname, $email, $password, $user_type);
    $stmt_user->execute();
    $stmt_user->close();

    $stmt_payment = $conn->prepare("INSERT INTO payment (lrn, name, misc, tuition, others) VALUES (?, ?, ?, ?, ?)");
    $stmt_payment->bind_param("sssss", $LRN, $name, $misc, $tuition, $others);
    $stmt_payment->execute();
    $stmt_payment->close();

    $conn->close();


    header('location: invoice/index.html');


    exit();
}
