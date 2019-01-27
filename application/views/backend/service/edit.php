<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Services</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Production</h1>
    </header>
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4>Update Production</h4>
          </div>

          <?php if($feedback = $this->session->flashdata('feedback')):
           $feedback_class = $this->session->flashdata('feedback_class');
          ?>
          <div class="alert <?= $feedback_class?>">
            <?= $feedback; ?>
          </div>
        <?php endif;?>


          <div class="card-body">
            <?php echo form_open('UpdateService/'.$allFetchData->service_id,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Production Title</label>
                <div class="col-sm-10">
                  <?php 
                  $service_title = array(
                    'name'          => 'service_title',
                    'class'         => 'form-control',
                    'value'         => set_value('service_title',$allFetchData->service_title),  
                  );

                  echo form_input($service_title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('service_title')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Production Description</label>
                <div class="col-sm-10">
                  <?php 
                  $service_des = array(
                    'name'          => 'service_des',
                    'id'          => 'service_des',
                    'class'         => 'form-control',
                    'value'         => set_value('service_des',strip_tags($allFetchData->service_des)),  
                  );

                  echo form_textarea($service_des);
                  ?>
                   <script>
                    CKEDITOR.replace('service_des');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('service_des')?>
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



