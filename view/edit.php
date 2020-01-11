<!-- `id`, `username`, `title`, `desc`, `start_date`, `end_date`, `createddate`, `status`, `progress`-->

<?php 
if(isset($_GET["id"]))
    {
    $id=$_GET["id"];
include_once './model/manage_todo.php';
$action=new manage_todo();
$edit=$action->show_by_id($id);

?>
<form class="form add" method="post" action="?page=action">    
    <h3>Register</h3>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $edit["title"]?>">
  </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="desc" id="desc"><?php echo $edit["desc"]?></textarea>
  </div>
  <div class="form-group">
    <label >Duration</label>
    <input type="text" class="form-control" name="start_date" id="duration" value="<?php echo $edit["start_date"]?>">
    <input type="text" class="form-control" name="end_date" id="durations" value="<?php echo $edit["end_date"]?>">
  </div>
   
   <div class="form-group">
        <label >Label Under</label>
        <select  name="status" id="label_under">
            <option <?php if(($edit["status"])=="inbox")  echo 'selected="selected"'?> value="inbox" >Inbox</option>
            <option <?php if(($edit["status"])=="readlater")  echo 'selected="selected"'?> value="readlater" >Read later</option>
            <option <?php if(($edit["status"])=="important")  echo 'selected="selected"'?>value="important">Important</option>
        </select>
  </div>
    
<input type="submit" name="update" class="btn btn-default" value="Update todo" >
<input type="hidden" value="<?php echo $edit["id"]?> " name="id"> 
</form>
<?php



} ?>