<!-- ``id`, `username`, `title`, `desc`, `start_date`, `end_date`, `createddate`, `status`, `progress`-->

<form class="form add" method="post" action="?page=action">    
    <h3>Add new TODO</h3>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Write the title here">
  </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="desc" id="desc"></textarea>
  </div>
  
    <div class="form-group">
    <label >Duration</label>
    <label >Start Date</label>
    <input type="text" class="form-control" name="start_date" id="duration" >
  </div>
     <div class="form-group">
    <label >End Date</label>
    <input type="text" class="form-control" name="end_date" id="durations" >
  </div>
   
   <div class="form-group">
        <label >Label Under</label>
        <select  name="status" id="label_under">
            <option value="inbox" >Inbox</option>
            <option value="readlater" >Read later</option>
            <option value="important">Important</option>
        </select>
  </div>
    
<input type="submit" name="add" class="btn btn-default" value="Create todo" >
 
</form>