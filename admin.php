<div class="table-responsive-sm">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Név</th>
      <th scope="col">Email</th>
      <th scope="col">Rank</th>
      <th scope="col">Ban</th>
      <th scope="col">Törlés</th>
      <th scope="col">Frissítés</th>
    </tr>
  </thead>
  <tbody> 
      <?php
      $sql="SELECT * FROM users";
      $c=new Connect();
      $result=mysqli_query($c->getConn(),$sql);

      while($row=mysqli_fetch_assoc($result))
      {
      echo "
      <tr>    
      <td>".$row['uname']."</td>
      <td>".$row['umail']."</td>
      <td>".$row['rank']."</td>
      <td>".$row['ban']."</td>
      <td><a href='index.php?azonosito=admin&iddel=".$row['id']."'>Töröl</a></td>
      <td><a href='index.php?azonosito=admin&idup=".$row['id']."'>Frissít</a</td>
      </tr>
      ";
      }

      if(isset($_GET['iddel'])){
          $query=new Queries();
          $query->deleterecord($_GET['iddel']);
          header('location:index.php?azonosito=admin');
      }

      if(isset($_GET['idup'])){
        $query=new Queries();
        $query->updaterecord($_GET['idup']);
        header('location:index.php?azonosito=admin');
      }
      ?>
   
  </tbody>
</table>
</div>