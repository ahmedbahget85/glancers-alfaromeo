<?php 
/*
Template Name: Brochure Form
*/
get_header(); ?>

<?php if(isset($_GET['module-name'])){ ?>
    <div class="alert alert-primary text-center" role="alert">
        This form submitted successfully
    </div>
<?php } ?>


<?php
if(isset($_POST['module-name'])){
    $thanks = true;
}
else$thanks=false;
?>
<!-- content-inner -->
<div class="form-container">
    <div class="left extended" style="background-image: url('<?php bloginfo('template_directory'); ?>/asset/images/req-brou@2x.png');">
        <div class="head">
            <span class="font-sm light uppercase">Alfa Romeo</span>
            <h1 class="bold">Request Brochure</h1>
        </div>
    </div>
    <div class="right">
        <form id="main-form" method="post">
            <div class="tab-content">
                <?php 
                if($thanks){ ?>
                <div class="form-section" id="select-section">
                <?php } else{ ?>
                <div class="form-section current" id="select-section">
                <?php } ?>
                    <div class="form-section-inner">
                        <div class="form-head">
                            <h3 class="uppercase section-title pb-2">select model of interest</h3>
                            <!-- <p class="light">Which Car Model You’re Interested to request brochure?</p> -->
                        </div>
                        <div class="content">
                            <div class="selected-model">


                            <?php $args = array( 'post_type' => 'models', 'posts_per_page' => 10 );
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                            ?>
                                <div class="input-model">
                                    <div class="input-container">
                                        <div class="model-image"
                                            style="background-image: url('<?php echo the_cfc_field( 'model-content' , 'front-image' , get_the_ID()); ?>');">
                                        </div>
                                        <label class="form-check-label" for="<?php echo the_cfc_field( 'model-content' , 'name' , get_the_ID()); ?>"
                                            style="background-image: url('<?php echo the_cfc_field( 'model-content' , 'description-image' , get_the_ID()); ?>');">
                                        </label>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                                

                            </div>
                            <div class="inputs">

                            <?php $args = array( 'post_type' => 'models', 'posts_per_page' => 10 );
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                            ?>
                                <div class="input-model">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="module-name"
                                            id="<?php echo the_cfc_field( 'model-content' , 'name' , get_the_ID()); ?>" value="<?php echo the_cfc_field( 'model-content' , 'name' , get_the_ID()); ?>" autocomplete="off">
                                        <div class="input-container">
                                            <div class="model-image"
                                                style="background-image: url('<?php echo the_cfc_field( 'model-content' , 'main-image' , get_the_ID()); ?>');">
                                            </div>
                                            <label class="form-check-label" for="<?php echo the_cfc_field( 'model-content' , 'name' , get_the_ID()); ?>"
                                                style="background-image: url('<?php echo the_cfc_field( 'model-content' , 'description-image' , get_the_ID()); ?>');">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                            
                            </div>

                        </div>


                        <div class="buttons-inner">
                            <button id="inner-next-btn" type="button" class="btn next-btn">next
                                <img alt="carousel-indicator" class="img-fluid pl-3" src="<?php bloginfo('template_directory'); ?>/asset/icons/carousel-indicator.svg">
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-section" id="info-section">
                    <div class="form-section-inner">
                        <div class="form-head">
                            <h3 class="uppercase section-title pb-2">tell us more about</h3>
                        </div>
                        <div class="content">
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-xlg-2 col-form-label">title</label>
                                <div class="col-sm-8">
                                    <select class="form-control my-1 mr-sm-2" name="title" id="title">
                                        <option value="Mr">Mr</option>
                                        <option value="Ms">Ms</option>
                                        <option value="Miss">Miss</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="firtsName" class="col-sm-3 col-xlg-2 col-form-label">first name
                                    <span>*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="firtsName"
                                        placeholder="first name" name="firstName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName" class="col-sm-3 col-xlg-2 col-form-label">last name
                                    <span>*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="lastName"
                                        placeholder="last name" name="lastName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-sm-3 col-xlg-2 col-form-label">mobile no.
                                    <span>*</span></label>
                                <div class="col-sm-8">
                                <div id='mobile-container'>
                                    <input type="text" class="form-control" id="mobile" 
                                        name="mobile" onkeypress="return isNumberKey(event)" required>
                                        <label class='not-valid' style="display:none;color:red;text-transform:none">this number is not valid</label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-xlg-2 col-form-label">email
                                    <span>*</span></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" placeholder="example@info.com"
                                        name="email">
                                </div>
                            </div>
                        </div>
                        <div class="buttons-inner">
                            <button type="button" class="btn prev-btn">
                                <img  alt="carousel-indicator" class="img-fluid pl-3" src="<?php bloginfo('template_directory'); ?>/asset/icons/carousel-indicator.svg">
                                previous
                            </button>
                            <button id="info-next-btn" type="button" class="btn next-btn">next
                                <img alt="carousel-indicator" class="img-fluid pl-3" src="<?php bloginfo('template_directory'); ?>/asset/icons/carousel-indicator.svg">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-section" id="news-section">
                    <div class="form-section-inner">
                        <div class="form-head">
                            <h3 class="uppercase section-title pb-2">Would you like to receive news and
                                offers
                                from
                                EzzElarab Automotive in the future? </h3>
                            <p class="light">Please select one or several of the communication options
                                below.
                            </p>
                        </div>

                        <div id="check-content" class="content">
                            <p class="font-sm light mb-4">By selecting one or several communication channels
                                below I
                                consent
                                to
                                have my
                                personal
                                data processed in order to receive future news and offers from EzzElarab
                                Automotive
                                and
                                my appointed retailer in the chosen channels.
                            </p>
                            <div class="form-check">
                                <label class="form-check-label thin" for="e-mail">email
                                    <input class="form-check-input" name="email_check" type="checkbox" id="e-mail">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label thin" for="phone">phone
                                    <input class="form-check-input" name="phone_check" type="checkbox" id="phone">
                                    <span class="checkmark"></span>

                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label thin" for="disabledFieldsetCheck">sms
                                    <input class="form-check-input" name="sms_check" type="checkbox" id="disabledFieldsetCheck">
                                    <span class="checkmark"></span>

                                </label>
                            </div>
                            <p class="font-sm light mb-2">EzzElarab Automotive will store and process your personal data
                                according to the information notice in order to process and follow up on your
                                request.</p>
                            <p class="font-sm light">By submitting this request you consent to the processing.</p>


                            
                        </div>
                        <div class="buttons-inner">
                            <button type="button" class="btn prev-btn">
                                <img  alt="carousel-indicator" class="img-fluid pl-3" src="<?php bloginfo('template_directory'); ?>/asset/icons/carousel-indicator.svg">
                                previous
                            </button>
                            <button type="submit" class="btn next-btn">Submit
                                <img alt="carousel-indicator" class="img-fluid pl-3" src="<?php bloginfo('template_directory'); ?>/asset/icons/carousel-indicator.svg">
                            </button>
                        </div>
                    </div>
                </div>
                
                <?php 
                if($thanks){ ?>
                <div class="form-section current" id="lastSection">
                <?php } else{ ?>
                <div class="form-section" id="lastSection">
                <?php } ?>
                    <div class="form-section-inner">
                        <div class="form-head">
                            <h3 class="uppercase section-title pb-2">THANK YOU!</h3>
                        </div>
                        <p class="font-sm light text-center">We’ve received your request and will contact
                            you
                            as soon as
                            possible</p>
                    </div>
                </div>
            </div>



        </form>
    </div>

</div>
<script>
function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}  
</script>

<?php

if(isset($_POST['module-name'])){
    $data['model'] = $_POST['module-name'];
    $data['title'] = $_POST['title'];
    $data['first_name'] = $_POST['firstName'];
    $data['last_name'] = $_POST['lastName'];
    $data['mobile'] = $_POST['mobile'];
    $data['email'] = $_POST['email'];
    if(isset($_POST['email_check']))
        $data['email_comm']=1;
    else $data['email_comm']=0;
    if(isset($_POST['phone_check']))
        $data['phone_comm']=1;
    else $data['phone_comm']=0;
    if(isset($_POST['sms_check']))
        $data['sms_comm']=1;
    else $data['sms_comm']=0;

    global $wpdb;
    $wpdb->show_errors();
    $sql = $wpdb->insert('brochure_request',$data);

    
}

?>

<?php get_footer(); ?>
