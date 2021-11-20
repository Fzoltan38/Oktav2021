<div class="container" style="margin-top:30px">
  <div class="row flex-column-reverse flex-md-row">
    <div class="col-md-12" style="flex-wrap: wrap ;"><!--Az tartalmi rész megjelenítésére van-->
     <?php
      if(!empty($_GET['azonosito']) && $_GET['azonosito']=='fo'){
        include('fo.php');  
      }

      if(!empty($_GET['azonosito']) && $_GET['azonosito']=='news'){
        include('hirek.php');
      }

      if(!empty($_GET['azonosito']) && $_GET['azonosito']=='order'){
        include('megrendeles.php');
      }

      if(!empty($_GET['azonosito']) && $_GET['azonosito']=='contact'){
        include('kapcsolat.php');
      }

      if(!empty($_GET['azonosito']) && $_GET['azonosito']=='admin'){
        include('admin.php');
      }

      if(!empty($_GET['azonosito']) && $_GET['azonosito']=='exit'){
        include('exit.php');
      }
     ?>
    </div>     
  </div>
</div>