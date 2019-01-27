<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Message</li>
    </ul>
  </div>
</div>

<!-- Menu Table start --><!-- Menu Table start --><!-- Menu Table start -->
<section>
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>All Message</h4>
          </div>
          <?php if($feedback = $this->session->flashdata('feedback')): 
                $feedback_class = $this->session->flashdata('feedback_class');
          ?>
                <div class="alert <?= $feedback_class ?>">
                  <?= $feedback ?>
                </div>
          <?php endif; ?>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($allFetchData)):
                        foreach ($allFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $data->message_id?></th>
                    <td><?php echo $data->name?></td>
                    <td>
                      <a href="mailto:<?= $data->email ?>"> <?php echo $data->email ?></a>

                      <?php //echo $data->email?>
                    </td>
                    <td><?php echo $data->subject?></td>
                    <td><?php echo $data->message?></td>

                    <td>
                      <a onclick="return confirm('Are you sure to delete ? ')" href="<?php echo base_url(); ?>DeleteMessage/<?php echo $data->message_id; ?>"  title="Delete This"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                    </td>
                  </tr>

                  <?php endforeach;?>
                  <?php else: ?>
                    <tr>
                      <td colspan="6"> No Record Found! </td>
                    </tr>
                <?php endif;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>