function newWindow()
{ window.open('nonghyup_user_info.php','검색','width=700,height=150,scrollbars=no');
  }
  
function new_win(a) 
{ window.open("popup.php?newtext=" + a,"new_win","status=yes,width=400,height=200");
  return true;
}
</script>    
<script type="text/javascript">

function click()
{
 if ((event.button==2) || (event.button==2)) 
 {
   alert('죄송합니다. 오른쪽 마우스 금지입니다. ^^;;; ');
 }
}document.onmousedown=click
