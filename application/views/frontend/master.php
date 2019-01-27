
<?php $this->load->view('frontend/includes/header');?>

<?php 
  if($this->uri->uri_string() == ''){
    $this->load->view('frontend/includes/slider');
  }
?>
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
        <div class="group btmspace-15"> 
         
            <?php 
            	if(isset($content) && $content){
					$this->load->view('frontend/'.$content,TRUE);
				}

				$this->load->view('frontend/includes/rightSidebar')
			?>
        </div>
        <?php 
            if($this->uri->uri_string() == ''){
                $this->load->view('frontend/product/products');
            }
        ?>
        <?php $this->load->view('frontend/includes/galarySlider');?>
        <div class="clear"></div>
    </main>
  </div>
</div>
<?php $this->load->view('frontend/includes/footer');?>