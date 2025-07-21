
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<h1>
    Brochure Requests
</h1>

<?php
    global $wpdb;
    $requests = $wpdb->get_results("SELECT * FROM brochure_request");
?>

<div >
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Model Name</th>
      <th scope="col">Title</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Communications</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($requests as $key=>$request){ ?>
        <tr>
            <th scope="row"><?php echo $key+1; ?></th>
            <td>
                <?php echo $request->model; ?>
            </td>
            <td>
                <?php echo $request->title; ?>
            </td>
            <td>
                <?php echo $request->first_name." ".$request->last_name; ?>
            </td>
            <td>
                <?php echo $request->mobile; ?>
            </td>
            <td>
                <?php echo $request->email; ?>
            </td>
            <td>
                <?php
                    if($request->email_comm == 1)
                        echo "(email) ";
                    if($request->phone_comm == 1)
                        echo "(phone) ";
                    if($request->sms_comm == 1)
                        echo "(sms) ";
                ?>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
</div>