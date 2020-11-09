<head>
<title> ������ ������� ���� ���俹�� ���� </title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

<?php

   include("include/sm_info.lib");
   $con = db_con();
   

   if (!is_numeric($_POST[user_id]))
    {
       echo "<script> alert('���ι�ȣ �Է� �����Դϴ�.') </script>";
       echo ("<meta http-equiv='Refresh' content='0; URL=nacf_support_index.php'>");
       return;
    }


   $user_id       = $_POST['user_id'];
 
   $master_gubun  = $_POST['master_gubun'];
 
 
////------------------------------------------------------------------------------------
   $select_usr_qry = "select user_id, user_name, position, office_code, office_name, branch_gubun ".
                     " from user_info ".
                     " where user_id = '$user_id'";
                
   $usr_res  = mysql_query($select_usr_qry, $con);   
   $usr_rnum = mysql_num_rows($usr_res);
   $usr_fnum = mysql_num_fields($usr_res);
   
   $usr_ary1 = mysql_fetch_array($usr_res);
   
   $user_name     = $usr_ary1['user_name'];
   $office_code   = $usr_ary1['office_code'];
   $position      = $usr_ary1['position'];
   $nonghyup_code = $usr_ary1['office_code'];   
   $office_name   = $usr_ary1['office_name'];
   $branch_gubun  = $usr_ary1['branch_gubun'];

   if($user_name == "")
   {     echo "<script> alert('���ι�ȣ �Է� �����Դϴ�.') </script>";
   
         if($master_gubun == "1")
         {
            echo ("<meta http-equiv='Refresh' content='0; URL=support_history_index.php'>");
            return;
         }
         else
         { 
            echo ("<meta http-equiv='Refresh' content='0; URL=nacf_support_index.php'>");
            return;
         }
   }
   
   if($master_gubun == "1")
   {
       echo ("<meta http-equiv='Refresh' content='0; URL=support_history_chk.php?user_id=$user_id'>");
       return;     
   }
   else
   {
       if($position == "������")
       {  
          if($branch_gubun == "����")
          {     echo "<script> alert('<����> ������ ��ϰ����մϴ�.') </script>";
                echo ("<meta http-equiv='Refresh' content='0; URL=nacf_support_index.php'>");
                return;         
          }   
          
          $select_qry = "select A.sm_code sm_code, A.sm_name sm_nm, A.sm_area sm_area ".
                       " from sm_info A ".
                       " where A.sm_code = '$nonghyup_code'";
         
          $res = mysql_query($select_qry, $con);
          
          $rnum = mysql_num_rows($res);
          $fnum = mysql_num_fields($res);
          
          $ary1 = mysql_fetch_array($res);
          
          $sm_nm   = $ary1['sm_nm'];
          $sm_area = $ary1['sm_area'];
          
         
          if($sm_nm == "")
          {
                echo "<script> alert('�繫��ȯ�ڵ� �Է� ����') </script>";
                echo ("<meta http-equiv='Refresh' content='0; URL=nacf_support_index.php'>");
                return;
          }
                   
      }
      else
      {
         if($branch_gubun == "ALL")
         {
            //echo "<script> alert('���� Ȯ�ο�') </script>";
            echo ("<meta http-equiv='Refresh' content='0; URL=branch_all_select_i.php?user_id=$user_id&branch_gubun=$branch_gubun'>");
            return;     
         }
         else
         {
            //echo "<script> alert('�������δ���� Ȯ�ο�') </script>";
            echo ("<meta http-equiv='Refresh' content='0; URL=branch_area_select_i.php?user_id=$user_id&branch_gubun=$branch_gubun'>");
            return;     
          }
        
      }
   }
                          
 
////------------------------------------------------------------------------------------


?>


<style type="text/css">
body
{
	background-color:#FFF;
	margin:0 auto;
}
p { margin:0; }

#wrap
{
	width:100%;
	height:100%;
	margin:0 auto;
	text-align:center;
}
#container
{
	width:600px;
	height:100%;
	background-color:#FFF;
	margin:0 auto;
}
	.logo
	{
		text-align:center;
		padding-top:40px;
		padding-bottom:40px;
	}
	.setup_msg
	{
		text-align:center;
		font-weight:bold;
		padding-bottom:30px;
	}
	.info_msg
	{
		font-size:9pt;
		color:#666;
		text-align:left;
		padding-left:10px;
	}

.info_table td
{
	font-size:9pt;
	padding-top:8px;
	padding-bottom:5px;
	color:#666;
}
	.info_category
	{
 		text-align:center;
		background-color:#ececec;
		padding-left:10px;
	}
	.info_bg
	{
	  text-align:center;
		background-color:#FFF;
		padding-left:10px;
	}

	.go_home
	{
		text-align:center;
		padding-top:20px;
		padding-bottom:20px;
	}

	.copy
	{
		background-color:#f3f3f3;
		padding-top:10px;
		height:35px;
		font-family:verdana,tahoma;
		text-align:center;
		font-size:8pt;
	}

.c_00 { color:#000; }
.c_red { color:#9e0b0f; }
.c_blue { color:Blue; }

.p_b10 { padding-bottom:10px; }
</style>

<script type="text/javascript">

function click()
{
  if ((event.button==2) || (event.button==2)) 
  {
    alert('�˼��մϴ�. ������ ���콺 �����Դϴ�. ^^;;; ');
  }
}document.onmousedown=click// -->

</script>

</head>

<body  oncontextmenu='return false' ondragstart='return false' onselectstart='return false'>



<br>
<br>
<br>
<br>
<br>
<br>


<table cellpadding="1" cellspacing="7" border="0" width="100%"  bgcolor="#FF9966" class="info_space">
<tr>
<td>

   <table cellpadding="0" cellspacing="0" border="0" width="100%"  bgcolor="#d7d7d7" class="info_bg">
     <tr>
        <td width="100%" >
        <h4  class="logo" >���ϴ� [&nbsp;<font class="c_blue"><? echo "$sm_area"; ?></font>&nbsp;] ���� ���� [&nbsp;<font class="c_blue"><? echo "$sm_nm"; ?></font>&nbsp;] �� [&nbsp;<font class="c_blue"><? print "$user_name"; ?></font>&nbsp;] ���� �½��ϱ�? </h4>   
        </td>
     </tr> 
     <tr><td width="100%" >
        <table cellpadding="0" cellspacing="0" border="0" width="100%"  bgcolor="#d7d7d7" class="info_bg">
          <tr>
             <td width="25%"  class="info_bg"></td>
             <td width="25%"  class="info_bg">
                 <form Action="buy_data_setting.php" method="post">
                 <input type="hidden" name="nonghyup_code" value="<? print "$nonghyup_code"; ?>">
                 <input type="hidden" name="nonghyup_name" value="<? print "$sm_nm"; ?>">
                 <input type="hidden" name="user_name"     value="<? print "$user_name"; ?>">                 
                 <button type="submit">&nbsp;&nbsp;&nbsp;&nbsp;��&nbsp;&nbsp;&nbsp;&nbsp;</button></td>
                 </form>
             <td width="25%"  class="info_bg">
                 <form Action="nacf_support_index.php" method="post">
                 <button type="submit">&nbsp;&nbsp;�ƴϿ�&nbsp;&nbsp;</button></td>
                 </form>
             <td width="25%"  class="info_bg"></td>
          </tr>   
        </table>
        </td></tr>
        <tr><td width="100%" >&nbsp;</td></tr>  
  

   </table>     
</td>
</tr>
</table>  



<?
//-------------------------------------------------   
    mysql_close($con);
//-------------------------------------------------
?> 

</body>


   
