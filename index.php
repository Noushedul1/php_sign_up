<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   function validate($str){
       return trim(htmlspecialchars($str));
   }

   if(empty($_POST['fname'])){
       $fnameError = 'fname is wrong';
   }else{
       $fname = validate($_POST['fname']);
       if(!preg_match("/^[a-zA-Z]*$/",$fname)){
           $fnameError = 'only letter use';
       }
   }

   if(empty($_POST['lname'])){
       $lnameError = 'lname is wrong';
   }else{
       $lname = validate($_POST['lname']);
   }

   if(empty($_POST['password'])){
       $passwordError = 'password is empty';
   }else{
       $password = validate($_POST['password']);
       if(strlen($password)<6){
           $passwordError = 'password must more than 6';
       }
   }

   if(empty($_POST['email'])){
       $emailError = 'empty email';
   }
   else{
       $email = validate($_POST['email']);
       if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
           $emailError = 'email is not valid';
       }
   }

   if(empty($_POST['gender'])){
       $genderError = 'gender must not be empty';
   }else{
       $gender = validate($_POST['gender']);
   }

   if(empty($_POST['skills'])){
       $skillsError = 'skils must not be empty';
   }
   else{
       $skills = validate($_POST['skills']);
   }

   if(empty($_POST['language'])){
    $languageError = 'language must not be empty';
    }
    else{
        $language = validate($_POST['language']);
    }

    if(empty($_POST['message'])){
        $messageError = '';
    }
    else{
        $message = validate($_POST['message']);
    }
}
?>
<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .error{
            color: red;
            padding: 5px;
            text-transform: uppercase;
        }
        form{
            background: #ddd;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">First name : </label>
                        <input type="text" name="fname" class="form-control">
                        <span class="error"><?php if(isset($fnameError)){echo $fnameError;} ?></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Last name : </label>
                        <input type="text" name="lname" class="form-control">
                        <span class="error"><?php if(isset($lnameError)){echo $lnameError;} ?></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password : </label>
                        <input type="text" name="password" class="form-control">
                        <span class="error"><?php if(isset($passwordError)){
                            echo $passwordError;
                        } ?></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email: </label>
                        <input type="text" name="email" class="form-control">
                        <span class="error"><?php if(isset($emailError)){
                            echo $emailError;
                        } ?></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            <input type="radio" name="gender" value="male">
                            Male
                        </label>
                        <label for="" class="form-label">
                            <input type="radio" name="gender" value="female">
                            Female
                        </label>
                        <span class="error"><?php if(isset($genderError)){
                            echo $genderError;
                        } ?></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Skills : </label>
                        <select name="skills" id="">
                            <option value="js">js</option>
                            <option value="css">css</option>
                            <option value="php">php</option>
                            <option value="vue">vue</option>
                        </select>
                        <span class="error"><?php if(isset($skillsError)){
                            echo $skillsError;
                        } ?></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            <input type="checkbox" name="language" value="bangla">
                            Bangla
                        </label>
                        <label for="" class="form-label">
                            <input type="checkbox" name="language" value="english">
                            English
                        </label>
                        <label for="" class="form-label">
                            <input type="checkbox" name="language" value="arabic">
                            Arabic
                        </label>
                        <label for="" class="form-label">
                            <input type="checkbox" name="language" value="hindi">
                            Hindi
                        </label>
                        <span class="error"><?php if(isset($languageError)){
                            echo $languageError;
                        } ?></span><br>
                    </div>
                    <div class="mb-3">
                        <div>
                        <label for="" class="form-label">Message : </label>
                        </div>            
                        <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>