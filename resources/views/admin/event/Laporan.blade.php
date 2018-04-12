
<table width="100%" border="1">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>keterangan</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal Selesai</th>
    <th>Kuota</th>
  </tr>
  <?php
    $no = 1;
    $event = \App\Event::get();
    foreach($event as $myevent){
  ?>

  <tr>
    <td>{{$no++}}</td>
    <td>{{$myevent->nama}}</td>
    <td>{{$myevent->keterangan}}</td>
    <td>{{$myevent->mulai}}</td>
    <td>{{$myevent->selesai}}</td>
    <td>{{$myevent->kuota}}</td>
  </tr>
<?php } ?>
</table>
