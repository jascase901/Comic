<?php
include '../db.php';
$comic_handle = new comicDbHandler(SERVER, DB, USR, PWD);
$id = $comic_handle->retrieve_max_id();
$prev_url=($id-1).".php";
$next_url=($id+1).".php";
$comic = $comic_handle->retrieve_val_at_id($id);
$title = $comic['title'];
$url = $comic['url'];
$author = $comic['author'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<HTML>
<div id = container>
<HEAD>
  <META name="generator" content=
  "HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org">
  <LINK href="default.css" rel="stylesheet" type="text/css">
  <LINK href="default.css?version=1" rel="stylesheet" type=
  "text/css">
  <TITLE>Comic</TITLE>



<DIV id="menu">
    <P>
          <H3><A href="index.php">Home</A></H3>
</P>

  
      <P>    <H3><A href="http://www.example.com/">About Us</A></H3>
       </P>
</div>




</HEAD>
<TABLE>
<TD>
<DIV id = left_bar>
</DIV>
</TD>
<TD>
<DIV id=content>
<BODY>

<DIV id = "comic" >
  </P><?php echo "<h1><p>$title </p></h1>"?><BR>
  <?php echo  '<IMG src='.$url.' alt=
  "failed to load"><BR>'?></P>


<P>
  <TABLE>
    <TR>
      <?php if ($id != 1){ ?>

      <td><a href=<?php echo "".$prev_url ?> >Prev</a></td><?php }?>

   
      <?php if ($id != $comic_handle->retrieve_max_id()){ ?>

      <td><a href=<?php echo "".$next_url ?> >Next</a></td><?php }?>
    </TR>
  
  </TABLE>
</P>
<?php $comic_handle->close();?>
</DIV>
</td>
<td>
<div id = right_bar>
</DIV> 
</td>
</TABLE>
</DIV>
</BODY>

<DIV id=footer>
<P><?php echo "by ".$author?></P>
</DIV>


</DIV>


</HTML>
