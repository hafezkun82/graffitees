<?php

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<DIV id="content">
	<!--  start page-heading -->
	<DIV id="page-heading">
		<H1><?php //echo $mainTitle;?></H1>
	</DIV>
	<!-- end page-heading -->
	<TABLE border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<TR>
		<TH rowspan="3" class="sized"><IMG src="../admin/img/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></TH>
		<TH class="topleft"></TH>
		<TD id="tbl-border-top">&nbsp;</TD>
		<TH class="topright"></TH>
		<TH rowspan="3" class="sized"><IMG src="../admin/img/shared/side_shadowright.jpg" width="20" height="300" alt="" /></TH>
	</TR>
	<TR>
		<TD id="tbl-border-left"></TD>
		<TD>
		<!--  start content-table-inner ...................................................................... START -->
		<DIV id="content-table-inner">
			<!--  start table-content  -->
			<DIV id="table-content">
			<H2>Welcome</H2>
			<!--<H3>Local Heading</H3>-->
			Welcome <?php //echo $row[1] . ' ' . $row[2];?>
			</DIV>
			<!--  end table-content  -->
			<DIV class="clear"></DIV>
		</DIV>
		<!--  end content-table-inner ............................................END  -->
		</TD>
		<TD id="tbl-border-right"></TD>
	</TR>
	<TR>
		<TH class="sized bottomleft"></TH>
		<TD id="tbl-border-bottom">&nbsp;</TD>
		<TH class="sized bottomright"></TH>
	</TR>
	</TABLE>
	<DIV class="clear">&nbsp;</DIV>
</DIV>
