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
      <h1 class="h3 display">New Product</h1>
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
            <?php echo form_open_multipart('Product/Create',['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Company Type</label>
                <div class="col-sm-10 mb-3">

                  <select name="c_id" class="form-control">
                    <option value="">---Select One---</option>
                    <?php 
                      if (isset($companies)):
                        foreach($companies as $company):?>

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
                    'value'         => set_value('title'),  
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
                    'id'          => 'des',
                    'class'         => 'form-control',
                    'value'         => set_value('des'),  
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
                <div class="col-sm-10">
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
            <h4>All Product</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Company</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Edit|Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($allFetchData)):
                        foreach ($allFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $data->id?></th>
                    
                    <td>
                      <?php echo $this->Companymodel->findOrFail($data->c_id)->title; ?>
                    </td>


                    <td>
                      <?php if(! is_null($data->img)):?>
                    <img src="<?php echo base_url('uploads/product/'.$data->img)?>" height=50 width=50>
                      <?php endif;?>
                    </td>

                    <td><?php echo $data->title?></td>
                    <td><?php echo $data->des?></td>

                    <td>
                      <a href="<?php echo base_url('Product/Edit/'.$data->id); ?>" class="btn btn-success btn-sm" d ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <a onclick="return confirm('Are you sure to delete ? ')" href="<?php echo base_url('Product/Delete/'.$data->id); ?>"  title="Delete This"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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