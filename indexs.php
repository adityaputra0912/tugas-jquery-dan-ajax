<?php

$nama = "Aditya";
$nama1 = "PUTRA";
$pekerjaan = "Mahasiswa";
$tentangsaya = "TENTANG SAYA";
$alamat = "ALAMAT";
$kontak = "KONTAK SAYA"; 
$riwayat = "Riwayat Organisasi";
$riwayatpendidikan = "Riwayat Pendidikan";
$prestasi = "Prestasi";
$hobi = "Hobby";
?>

<?php
$conn = mysqli_connect("localhost","root","","cv");
$orga = mysqli_query($conn,"SELECT * FROM  riwayat_organisasi");
$riw = mysqli_query($conn,"SELECT * FROM  riwayat_pendidikan");
$pres = mysqli_query($conn,"SELECT * FROM  prestasi");
$hob = mysqli_query($conn,"SELECT * FROM  hobi");
$kon = mysqli_query($conn,"SELECT * FROM  kontak");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>my cv</title>
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="resume">
   		<div class="resume_left">
     		<div class="resume_profile">
     			<img src="img/e.jpg">
     		</div>
     	<div class="resume_content">
       		<div class="resume_item resume_info">
         		<div class="title">
           			<p class="bold"><?php echo $nama ?></p>
           			<p class="boldd"><?php echo $nama1 ?></p>
           			<p class="regular"><?php echo $pekerjaan ?></p>
         		</div>
         		<div class="title2">
           			<p class="bold1"><?php echo $tentangsaya ?></p>
           			<p class="regular1">saya aditya putra pratama saya umur 20 tahun saya tinggal di sidoarjo jawa timur sekarang saya berkuliah di UPN "VETERAN" Jawa Timur</p>
         		</div>
         		<div class="title3">
           			<p class="bold2"><?php echo $alamat ?></p>
           			<p class="regular2">- Perum Surya Residance Blok 4E-41 Damarsi , Buduran , Sidoarjo.</p>
         		</div>
         		<div class="title4">
              <p class="bold3"><?php echo $kontak ?></p>
               <?php while ($row = mysqli_fetch_assoc($kon)):?>
                <p class="regular3"><?= $row["kontakkk"];?></p>
                <?php endwhile?>
           		</div>
        	</div>
    	</div>
    </div>
    <div class="resume_right">
    	<div class="resume_item resume_work">
        	<div class="title">
           		<p class="bold"><?php echo $riwayat ?></p>
         	</div>
         <ul>
          <?php while ($row = mysqli_fetch_assoc($orga)):?>
            <li>
                <div class="date"> <?= $row["riwayat"];?></div> 
            </li>
          <?php endwhile?>
        </ul>
      </div>
    		<div class="resume_item resume_work">
        		<div class="title">
           			<p class="bold"><?php echo $riwayatpendidikan ?></p>
         		</div>
            <ul>
              <form action="simpan.php" method ="POST">
                <input type="text" name="id_riwayat_pendidikan" placeholder="ID Riwayat Pendidikan"/>
                <input type="text" name="riwayat_p" placeholder="Riwayat Pendidikan"/>
                <input type="submit" name="submit" value="TAMBAH RIWAYAT PENDIDIKAN"/>
              </form>
              <hr/>
              <div id="user_data">
                
              </div>
              <script>
                $(document).ready(function(){ 
                  load_data();

                  $('form').on('submit',function(e){
                    e.preventDefault();
                    $.ajax({
                      type:$(this).attr('method'),
                      url:$(this).attr('action'),
                      data:$(this).serialize(),
                      success:function(){
                        load_data();
                        resetForm();
                      }
                    });
                  })
                })
                  function load_data(){
                    $.get('data.php',function(data){
                      $('#user_data').html(data)
                      $('.hapusData').click(function(e){
                        e.preventDefault();
                        $.ajax({
                          type:'get',
                          url:$(this).attr('href'),
                          success:function(){
                            load_data();
                         }
                        });
                      })
                    })
                  }
                  function resetForm(){
                    $('[type=text]').val('');
                    $('[name=id_riwayat_pendidikan]').focus();
                  }
              </script>
            </ul>
    	  </div>
    	<div class="resume_item resume_work">
        	<div class="title">
           		<p class="bold"><?php echo $prestasi ?></p>
         	</div>
        <ul>
          <?php while ($row = mysqli_fetch_assoc($pres)):?>
            <li>
                <div class="date"><?= $row["prestasiku"];?></div> 
            </li>
            <?php endwhile?>
        </ul>
    	</div>
    	<div class="resume_item resume_work">
        	<div class="title">
           		<p class="bold"><?php echo $hobi ?></p>
         	</div>
        <ul>
          <?php while ($row = mysqli_fetch_assoc($hob)):?>
            <li>
                <div class="date"><?= $row["hobiku"];?></div> 
            </li>
            <?php endwhile?>
        </ul>
    	</div>
  	</div>
	</div>
</body>
</html>