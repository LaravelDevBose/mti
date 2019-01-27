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
            <h4>Update</h4>
          </div>

          <?php if($feedback = $this->session->flashdata('feedback')):
           $feedback_class = $this->session->flashdata('feedback_class');
          ?>
          <div class="alert <?= $feedback_class?>">
            <?= $feedback; ?>
          </div>
        <?php endif;?>


          <div class="card-body">
            <?php echo form_open('UpdateContactCrud/'.$allFetchData->contact_id,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Phone</label>
                <div class="col-sm-10">
                  <?php 
                  $contact_phone = array(
                    'name'          => 'contact_phone',
                    'class'         => 'form-control',
                    'value'         => set_value('contact_phone',$allFetchData->contact_phone),  
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
                    'value'         => set_value('contact_email',$allFetchData->contact_email),  
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
                    'id'          => 'contact_location',
                    'class'         => 'form-control',
                    'value'         => set_value('contact_location',strip_tags($allFetchData->contact_location)),  
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
