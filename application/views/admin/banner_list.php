<main role="main" class="container-fluid">

  <h1 style="text-align: center;">All Banner</h1>

  <!-- user_wrapper -->
  <div class="container-fluid">

    <div class="row">
      <div class="col col-md-8">
        <button type="button" class="btn btn-primary" onclick="location.href='<?=site_url("admin/banner/create")?>';">Create Banner</button>
      </div>
    </div>

    <div class="row">
      <div class="col col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>title</th>
            <th>Description</th>          
            <th width="150">ตัวเลือก</th>
          </tr>
        </thead>
        <tbody class="sortable">
        <?
        foreach ($banner_list as $key => $value) {
          ?>
          <tr>
            <td><?=$key+1?> <input class="sort_item" type="hidden" name="sort[]" value="<?=$value->id?>"></td>
            <td><img src="<?=site_url("media/banner/".$value->main_pic)?>" width="400"></td>
            <td><?=$value->title?></td>
            <td><?=$value->des?></td>       
            <td>
              <button type="button" class="btn btn-secondary" onclick="location.href='<?=site_url("admin/banner/create/".$value->id)?>';">แก้ไข</button>
              <button type="button" class="btn btn-danger" onclick="deleteconfirm('<?=site_url("admin/banner/delete/".$value->id)?>')">ลบ</button>
            </td>
          </tr>
          <?
        }
        ?>      
        </tbody>
      </table>
    </div>
    </div>

    
    
  </div>
  <!-- end user_wrapper -->
  
</main>
<!-- end rapee_wrapper -->
    <script type="text/javascript">
      function deleteconfirm(link){
        if (confirm("Confirm Delete")) {
            window.open(link,"_self")
        };
    }    
    $( ".sortable" ).sortable({
      update: function( event, ui ) {
        $.ajax({
          method: "POST",
          url: "<?=site_url("admin/banner/ajax_sort")?>",
          data: $( ".sort_item" ).serialize()
        })
          .done(function( msg ) {
            //alert( "Data Saved: " + msg );
          });
      }
    });
    </script>

