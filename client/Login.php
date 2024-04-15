<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {

            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {

                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        //die;
                    }
                }
            }
        }else
        {
        echo "<a>Wrong username or password.</a>";
        }
    }

?>

<section class="vh-100" style="background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 ">
        <div class="card text-dark" style="background-color: #08AEEA;background-image: linear-gradient(180deg, #08AEEA 0%, #2AF598 100%);border-radius: 25px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase text-white">Login</h2>
              <p class="text-dark-50 mb-5">Please enter your username and password!</p>

              <form method="post">
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeEmailX" name="user_name" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
              </form>
            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="index.php?prog=SignUp.php" class="text-white-50 fw-bold" style="color: black;">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>