<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Product</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Update Product</h1>
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
            <?php echo form_open_multipart('Product/Update/'.$allFetchData->id.'/'.$allFetchData->img,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Company Type</label>
                <div class="col-sm-10 mb-3">

                  <select name="c_id" class="form-control">
                    <?php $this->Companymodel->findOrFail($allFetchData->c_id)->title ?>

                    <option value="<?= $allFetchData->c_id?>">
                      <?php echo $this->Companymodel->findOrFail($allFetchData->c_id)->title ?></option>
                    <?php 
                      $allCompanies = $this->Companymodel->get_not_where_not_in($allFetchData->c_id);
                      if (isset($allCompanies)):
                        foreach($allCompanies as $company):?>

                    <option value="<?php echo $company->id;?>">
                                   <?php echo $company->title;?>
                    </option>

                        <?php endforeach;?>
                      <?php endif;?>
                  </select>

                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('c_id')?>
                  </span>
                </div>
              </div> 


              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Product Title</label>
                <div class="col-sm-10">
                  <?php 
                  $title = array(
                    'name'          => 'title',
                    'class'         => 'form-control',
                    'value'         => set_value('title',$allFetchData->title),  
                  );

                  echo form_input($title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('title')?>
                  </span>
                </div>
              </div>
             
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Description</label>
                <div class="col-sm-10">
                  <?php 
                  $des = array(
                    'name'          => 'des',
                    'id'            => 'des',
                    'class'         => 'form-control',
                    'value'         => set_value('des',$allFetchData->des),  
                  );

                  echo form_textarea($des);
                  ?>
                   <script>
                    CKEDITOR.replace('des');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('des')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Image (260 X 250)</label>
                <div class="col-sm-8">
                  <?php 
                  $img = array(
                    'name'          => 'img',
                    'class'         => 'form-control product_img',
                    // 'required'      => 'required',
                    'value'         => set_value('img'), 
                  );

                  echo form_upload($img);
                  ?>

                  <span class="text-small text-gray help-block-none">
                    <?php if(isset($error)) echo $error;?>
                  </span>
                </div>
                <div class="col-sm-2">
                  <img src="<?php echo base_url('uploads/product/'.$allFetchData->img)?>" height=100 width=100>
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

