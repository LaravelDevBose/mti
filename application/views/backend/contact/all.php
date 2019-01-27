<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Contact</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Contact</h1>
    </header>
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4>Create New</h4>
          </div>

          <?php if($feedback = $this->session->flashdata('feedback')):
           $feedback_class = $this->session->flashdata('feedback_class');
          ?>
          <div class="alert <?= $feedback_class?>">
            <?= $feedback; ?>
          </div>
        <?php endif;?>


          <div class="card-body">
            <?php echo form_open('CreateContactCrud',['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Phone</label>
                <div class="col-sm-10">
                  <?php 
                  $contact_phone = array(
                    'name'          => 'contact_phone',
                    'class'         => 'form-control',
                    'value'         => set_value('contact_phone'),  
                  );

                  echo form_input($contact_phone);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('contact_phone')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Email</label>
                <div class="col-sm-10">
                  <?php 
                  $contact_email = array(
                    'name'          => 'contact_email',
                    'class'         => 'form-control',
                    'value'         => set_value('contact_email'),  
                  );

                  echo form_input($contact_email);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('contact_email')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Location</label>
                <div class="col-sm-10">
                  <?php 
                  $contact_location = array(
                    'name'          => 'contact_location',
                    'id'            => 'contact_location',
                    'class'         => 'form-control',
                    'value'         => set_value('contact_location'),  
                  );

                  echo form_textarea($contact_location);
                  ?>
                   <script>
                    CKEDITOR.replace('contact_location');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('contact_location')?>
                  </span>
                </div>
              </div>



              <div class="form-group row">
                <div class="col-sm-4 offset-sm-2">


                  <?php 
                  $submit = array(
                    'name'          => 'submit',
                    'class'         => 'btn btn-primary',
                    'value'         => 'Save', 
                  );

                  echo form_submit($submit);
                  ?>
                </div>
              </div>
           <?php echo  form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Menu Table start --><!-- Menu Table start --><!-- Menu Table start -->
<section>
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>All Contacts</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Edit|Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($allFetchData)):
                        foreach ($allFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $data->contact_id?></th>
                    <td><?php echo $data->contact_phone?></td>
                    <td><?php echo $data->contact_email?></td>
                    <td><?php echo $data->contact_location?></td>

                    <td>
                      <a href="<?php echo base_url(); ?>EditContactCrud/<?php echo $data->contact_id; ?>" class="btn btn-success btn-sm" d ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <a onclick="return confirm('Are you sure to delete ? ')" href="<?php echo base_url(); ?>DeleteContactCrud/<?php echo $data->contact_id; ?>"  title="Delete This"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                    </td>
                  </tr>

                  <?php endforeach;?>
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