<?php
mysql_connect("localhost","henry199310","1234");
mysql_query("SET NAMES 'UTF8'");
mysql_select_db("hall_guest");//選擇資料庫
$guestName=@$_POST['guestName'];
$guestSubject=@$_POST['guestSubject'];
$guestContent=@$_POST['guestContent'];
if(isset($guestName)){
mysql_query("INSERT INTO guest VALUES(NULL,'$guestName','$guestSubject','$guestContent')");
header("location:./hall_board.php");
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>泰音有限公司</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./hall_board.css">
  </head>
  <body>
    <div id="top" class="container-fluid">
    </div>
    <div id="content" class="container-fluid">
      <?php
      $sql="select * from guest order by id desc";  //從guestbook讀取資料並依no欄位做遞減排序
      $result=mysql_query($sql);
      /* 顯示資料庫資料 */
      while (list($id,$guestName,$guestSubject,$guestContent)
      =mysql_fetch_row($result))
      {
      
      echo "<font color=white>留言者:$guestName<br/></font>";
      echo "<font color=white>留言主題:$guestSubject<br/></font>";
      echo "<font color=white>留言內容:$guestContent<br/></font>";
      echo "<hr>";
      }
      ?>
      
      <form id="form1"name="form1" method="post" action="" class="form-horizontal border">
        <div class="form-group">
          <label for="guestName" class="col-sm-4 control-label">暱稱：</label>
          <div class="col-sm-6">
            <input type="text" class="form-control"name="guestName" id="guestName" />
          </div>
        </div>
        <div class="form-group">
          <label for="guestSubject" class="col-sm-4 control-label">留言主旨：</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="guestSubject" id="guestSubject" />
          </div>
        </div>
        <div class="form-group">
          <label for="guestContent" class="col-sm-4 control-label">留言內容：</label>
          <div class="col-sm-6">
            <textarea name="guestContent" class="form-control" id="guestContent" rows="5"></textarea>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="button" id="button" value="送出" class="btn"/>
        </div>
      </form>
    </div>
    <div class="title container-fluid">
      <ul>
        <li><a href="./hall.html"><img src="./img/bt_03.gif"></a></li>
        <li><a href=""><img src="./img/bt_00.gif"></a></li>
        <li><a href=""><img src="./img/bt_01.gif"></a></li>
        <li><a href=""><img src="./img/bt_02.gif"></a></li>
        <li><a href=""><img src="./img/add.gif"></a></li>
      </ul>
      <ul>
        <li><span style="color: white">泰音有限公司 版權所有</span></li>
        <li><span style="color: #FFCCCC">2007 All Rights Reserved.</span></li>
      </ul>
    </div>
    <div id="footer" class="container-fluid">
      
    </div>
    
  </body>
</html>