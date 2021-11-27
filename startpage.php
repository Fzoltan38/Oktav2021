<div class="container" style="margin-top:30px">
  <div class="row flex-column-reverse flex-md-row">
    <div class="col-md-8" style="flex-wrap: wrap ;"><!--Az tartalmi rész megjelenítésére van-->
     <h1>Bemutatkozás, az oldal leírása.</h1>
    </div>

    <div class='col-md-4'><!--Az űrlapok megjelenítésére van-->
      <?php 
      if(!empty($_GET['azonosito']) && $_GET['azonosito']=='reglap')
        include('reg.php');
      else 
        include('log.php');
      ?>
    </div>   
  </div>
</div>