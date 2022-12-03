<?php
include'./backend_inc/header.php';
include'../database/env.php';
$querry="SELECT * FROM banners";
$data=mysqli_query($conn,$querry);
$banners=mysqli_fetch_all($data,1);
// print_r($banners);
?>



<h2>ALL BANNERS</h2>
<table class="tabel tabel-responsive w-100">
    
<tr>
<th>#</th>
<th>Banner Title</th>
<th>Banner Detail</th>
<th>Banner Image</th>
<th>status</th>
<th>Action</th>
</tr>

<?php
foreach($banners as $key=>$banner){
    ?>
    <tr>
    <td><?= ++$key?></td>
    <td><?=$banner['title']?></td>
    <td><?=$banner['detail']?></td>
    <td>
        <img src="<?="../uploads/banners". $banner['banner_img']?>" alt="" style="height:100px";>
    </td>
    <td><span class="badge <?=$banner['status'] == 0 ? 'bg-danger' : 'bg-success'?> text-light"><?=$banner['status'] == 0 ? 'De-active' : 'Active'?></span></td>
    

    <td>
         <a href="../controller/banner_status_update.php?id=<?=$banner['id']?>" class="btn btn-warning">
         <?=$banner['status'] != 0 ? 'De-active' : 'Active'?>
         </a>
        <a href="#" class="btn btn-primary">Edit</a>
        <a href="../controller/banner_delete.php?id=<?=$banner['id']?>" class="btn btn-danger bannerDelete">Delete</a>
</td>
    </tr>
    <?php
}
?>
</table>
<?php
include'./backend_inc/footer.php';
?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// let deleteBtn = document.querySelectorAll('.bannerDelete')

//  deleteBtn.addEventListener('click', function(e){
//     e.preventDefault();
    
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

// });


 
</script>
