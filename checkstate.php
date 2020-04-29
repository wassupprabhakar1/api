include('../admin_re/includes/functions.php');
  session_start();

  if(isset($_POST["getstate"]))
  {
    $response = array();
    $response["is_error"] = true;
    $response["message"] = "unkown";

    $query_getstate = "SELECT * FROM state ORDER BY state";
    $getstate_run = mysqli_query($con, $query_getstate);
    $count = mysqli_num_rows($getstate_run);
    if($count > 0)
    {
      $response["is_error"] = false;
      $response["message"] = $count."states_found";
      $response["state_count"] = $count;
      $response["data"] = mysqli_fetch_all($getstate_run);
    }
    else
    {
      $response["is_error"] = true;
      $response["message"] = "no_state_found";
    }
    echo json_encode($response);
  }
