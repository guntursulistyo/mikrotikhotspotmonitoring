												<?php
// Copy Paste ke template editor [Settings -> Template Editor].

if (substr($validity, -1) == "d") {
  $validity = "Aktif:" . substr($validity, 0, -1) . "Hari";
} else if (substr($validity, -1) == "h") {
  $validity = "Aktif:" . substr($validity, 0, -1) . "Jam";
}
if (substr($timelimit, -1) == "d" & strlen($timelimit) > 3) {
  $timelimit = "Durasi:" . ((substr($timelimit, 0, -1) * 7) + substr($timelimit, 2, 1)) . "Hari";
} else if (substr($timelimit, -1) == "d") {
  $timelimit = "Durasi:" . substr($timelimit, 0, -1) . "Hari";
} else if (substr($timelimit, -1) == "h") {
  $timelimit = "Durasi:" . substr($timelimit, 0, -1) . "Jam";
} else if (substr($timelimit, -1) == "w") {
  $timelimit = "Durasi:" . (substr($timelimit, 0, -1) * 7) . "Hari";
}
if ($datalimit == "") {
  $kuota = " Unlimited";
} else {
  $kuota = "Kuota:";
}
/* 
Sesuikan harga dan warna masing-masing.
warna bisa dilihat di https://material.io/guidelines/style/color.html#color-color-palette
variable $color
background-color:<?= $color;?>; -webkit-print-color-adjust: exact;
ditambahkan ke style di tag html yang ingin dikasi warna.
 */

if ($getprice == "1000") {
  $color = "#CD853F";
} // jika harga == "1000" maka warna = "#2196F3"
elseif ($getprice == "3000") {
  $color = "#00BFFF";
} elseif ($getprice == "5000") {
  $color = "#FFFF00";
} elseif ($getprice == "2000") {
  $color = "#00FF00";
}// ini yang dicopy untuk menambah warna berdarsarkan harga, kemudian paste di atas baris // else color

// else color
else {
  $color = "#FFFFFF";
}
?>
<style>
.qrcode{
		height:80px;
		width:80px;
}
</style>
<table class="voucher" style=" width: 220px;">
  <tbody>
<!-- Logo Hotspotname -->
    <tr>
      <td style="text-align: left; font-size: 14px; font-weight:bold; border-bottom: 1px black solid;"><img src="<?= $logo; ?>" alt="logo" style="height:30px;border:0;">  <?= $hotspotname; ?>  <span id="num"><?= " [$num]"; ?></span></td>
    </tr>
<!-- /  -->
    <tr>
      <td>
    <table style=" text-align: center; width: 210px; font-size: 12px;">
  <tbody>
<!-- Username Password QR    -->
    <tr>
      <td>
        <table style="width:100%;">
<!-- Username = Password    -->
<?php if ($usermode == "vc") { ?>
        <tr>
          <td font-size: 12px;>Kode Voucher</td>
        </tr>
        <tr>
          <td style="width:100%; border: 1px solid black; font-weight:bold; font-size:16px;"><?= $username; ?></td>
        </tr>
<!-- /  -->
<!-- Username & Password  -->
<?php 
} elseif ($usermode == "up") { ?>
<!-- Check QR  -->
<?php if ($qr == "yes") { ?>
        <tr>
          <td>Username</td>
        </tr>
        <tr>
          <td style="border: 1px solid black; font-weight:bold;"><?= $username; ?></td>
        </tr>
        <tr>
          <td>Password</td>
        </tr>
        <tr>
          <td style="border: 1px solid black; font-weight:bold;"><?= $password; ?></td>
        </tr>
<?php 
} else { ?>
        <tr>
          <td style="width: 50%">Username</td>
          <td >Password</td>
        </tr>
        <tr style="font-size: 14px;">
          <td style="border: 1px solid black; font-weight:bold;"><?= $username; ?></td>
          <td style="border: 1px solid black; font-weight:bold;"><?= $password; ?></td>
        </tr>
<?php 
}
} ?>
<!-- /  -->
        </table>
      </td>
<!-- QR Code    -->
<?php if ($qr == "yes") { ?>
      <td>
	<?= $qrcode ?>
      </td>
<?php 
} ?>
<!-- /  -->
    <tr>
      <!-- Price  -->
      <td colspan="2" style="border-top: 1px solid black;font-weight:bold; font-size:12px;background-color:<?= $color; ?>; -webkit-print-color-adjust: exact;"> <?= $price; ?></td>
    </tr>
    <tr>
      <!-- Limit -->
      <td colspan="2" style="border-top: 1px solid black;font-weight:bold; font-size:10px"><?= $validity; ?> <?= $timelimit; ?> <?= $kuota . $datalimit; ?></td>
<!-- /  -->
    </tr>
    <tr>
      <!-- Note  -->
      <td colspan="2" style="font-weight:bold; font-size:10px">Login: http://<?= $dnsname; ?></td>
<!-- /  -->
    </tr>
<!-- /  -->
  </tbody>
    </table>
      </td>
    </tr>
  </tbody>
</table>
	            	          	        	        	        	        	        	        	        	        	        	        