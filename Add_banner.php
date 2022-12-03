<?php
include'./backend_inc/header.php';
?>
<h2>ADD BANNER</h2>

<div class="card"></div>
<div class="card_header bg-primary text-light">
    Add New Banner Here
</div>
<div class="card_body">
<form action="../controller/banner_store.php" method="POST" enctype="multipart/form-data">


<div class="row">
    <div class="col-lg-3">
      <label for="bannerImg"> 
        <img class="imagePlaceholder" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQvNJYG5M1LCfNbTvM6frlwIzRrVM9Vayyk3g-0gXze8EEwGtaFvldLi-QFBSY4kABxlY&usqp=CAU" alt=""style="width:100%;display:block;" ></label>
        <?php
             if(isset($_SESSION['errors']['banner_img'])){
                 ?>
                 <span class="text-danger">
               <?=$_SESSION['errors']['banner_img']?>
                     </span>
                     <?php
                          }
                     ?>  
        <input type="file" class="bannerInputImage" id="bannerImg" name="banner_img">
    </div>
    <div class="col-lg-9">
        <label class="w-100">
            Insert a banner title <span class="text-danger">*</span>
            <input type="text" name="title" class="form_control">
            <?php
                                                if(isset($_SESSION['errors']['title'])){
                                             ?>
                                             <span class="text-danger">
                                                <?=$_SESSION['errors']['title']?>
                                             </span>
                                             <?php
                                             }
                                             ?>
        </label>
        <label class="w-100">
            Insert a banner video link <span class="text-danger">*</span>
            <input type="number" name="video_" class="form_control">
            <?php
                                                 if(isset($_SESSION['errors']['video_'])){
                                                ?>
                                                 <span class="text-danger">
                                                     <?=$_SESSION['errors']['video_']?>
                                                 </span>
                                                     <?php
                                                      }
                                                        ?>
           
        </label>
        <label class="w-100">
            Insert a banner Detail <span class="text-danger">*</span>
        <textarea name="detail" class="form-control"></textarea>
                                      <?php
                                                 if(isset($_SESSION['errors']['detail'])){
                                                ?>
                                                 <span class="text-danger">
                                                     <?=$_SESSION['errors']['detail']?>
                                                 </span>
                                                     <?php
                                                      }
                                                        ?>
        </label>
    </div>
</div>
<button name="submit" class="btn btn-primary float-right">Insert Banner</button>
</form>
</div>
</div>

<?php

include'./backend_inc/footer.php';
unset($_SESSION['errors']);

?>
<script>
  let inputImage = document.querySelector('.bannerInputImage')
  let imageplaceholder = document.querySelector('.imagePlaceholder')
  inputImage.addEventListener('change',function(e){
   let objecturl = window.URL.createObjectURL(e.target.files[0])
   imageplaceholder.src = objecturl
  })
   
</script>
