
<br>

<style>
    h1 {
        text-align: center;
        text: bold;
    }
    form{
        text-align: center;
    }
</style>

<?php


//REQUIRES DEPENDENCIES
require_once('../functions/sessionHelper.php');
require_once('../database/settings.php');
require_once('header2.php');


//CHECKS IF USER IS AUTHENTICATED
session_start();
if (sessionHelper::check() == false){
    echo 'Please sign in.';
    header('../login/signin.php');
    die();
}

// CHECKS ROLE.
$query = $connection->prepare('SELECT Role FROM users WHERE User_ID = ?');                        
$query->execute([$_SESSION['userID']]);
$result = $query->fetch();



// IF Landlord
if ($result['Role'] == 0 || $result['Role'] == 3){
    $query = $connection->prepare('SELECT * FROM home WHERE Home_ID = ?');
    $query->execute([$_GET['Home_ID']]);
    $result = $query->fetch();
    
    //Available 
    if ($result['is_available'] == 0){
        $availabilityStatus = 'Available';
        $availabilityStatus2 = 'Rented';
    }

    if ($result['is_available'] == 1){
        $availabilityStatus = 'Rented';
        $availabilityStatus2 = 'Available';
    }


    if (count($_POST) > 0){


       if ($_POST['role'] == 'Rented'){
        $_POST['role'] = '1';
       }

       if ($_POST['role'] == 'Available'){
        $_POST['role'] = '0';
       }

        $query = $connection->prepare('UPDATE home SET Bio = ?, Picture = ?, Sq_Feet = ?, Bedrooms = ?, Baths = ?, Year_Built = ?, School_District = ?, is_available = ?, street = ?, city = ?, state = ?, zip = ? WHERE Home_ID = ?');
        $query->execute([$_POST['bio'], $_POST['pic'], $_POST['sqft'], $_POST['bedrooms'], $_POST['bathrooms'], $_POST['yearBuilt'], $_POST['school'], $_POST['role'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip'], $_GET['Home_ID']]);
        $query->fetch();
        header('location:index.php');
    }



    //WE NEED TO GET THE ROLE AUTO SELECTED. THAT IS THE VALUE FIELD NEEDS TO BE GENERATED BY PHP CODE.
?>

    <h1>Modify House</h1>
<form method="POST">
    <p>Square Feet</p>
    <input type="text" name="sqft" value="<?=$result['Sq_Feet']?>" />
    <br>
    <p>Bedrooms</p>
    <input type="number" name="bedrooms" value="<?=$result['Bedrooms']?>" />  
    <br>
    <p>Bathrooms</p>
    <input type="number" name="bathrooms" value="<?=$result['Baths']?>" />
    <br>
    <p>School District</p>
    <input type="text" name="school" value="<?=$result['School_District']?>" />
    <br>
    <p>Year Built</p>
    <input type="year" name="yearBuilt" value="<?=$result['Year_Built']?>" />
    <br>
    <p>Street</p>
    <input type="text" name="street" value="<?=$result['street']?>" />
    <br>
    <p>City</p>
    <input type="text" name="city" value="<?=$result['city']?>" />
    <br>
    <p>State</p>
    <input type="text" name="state" value="<?=$result['state']?>" />
    <br>
    <p>Zip</p>
    <input type="text" name="zip" value="<?=$result['zip']?>" />
    <br>
    <p>Bio</p>
    <input type="text" name="bio" value="<?=$result['Bio']?>" />
    <br>
    <p>Picture Url</p>
    <input type="url" name="pic" value="<?=$result['Picture']?>" />
    <br>
    <br>
    <label for="role">Choose a Role:</label>
    <select name="role" id="role">
        <option value="<?php echo $availabilityStatus?>"><?php echo $availabilityStatus?></option>
        <option value="<?php echo $availabilityStatus2?>"><?php echo $availabilityStatus2?></option>
    </select>
    <br>
    <button type="submit">Modify </button>
</form>


<?php
require_once('footer2.php');
}