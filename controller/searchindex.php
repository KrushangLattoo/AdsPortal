<?php
		if($_SERVER['REQUEST_METHOD']=="post")
	{
		$drop=$_POST['catin'];
		$search=$_POST['search'];
		echo $search;
		echo $drop;
		if ($drop!="all") {
			$sql="SELECT adid, addis, adcost, adcon FROM Category, subcat, adsman WHERE (Category.catid=subcat.catid AND Category.catid=adsman.catdid AND subcat.subcatid=adsman.subcatid) AND (Category.catname LIKE '%$search%' OR Category.catkey LIKE '%$search%' OR subcat.subcatname LIKE '%$search%' OR subcat.subcatkey LIKE '%$search%')";
		} 
		else
		{
			$sql="SELECT adid, addis, adcost, adcon FROM Category, subcat, adsman WHERE ($drop=subcat.catid AND $drop=adsman.catdid AND subcat.subcatid=adsman.subcatid) AND (Category.catname LIKE '%$search%' OR Category.catkey LIKE '%$search%' OR subcat.subcatname LIKE '%$search%' OR subcat.subcatkey LIKE '%$search%')";
		}
		$ob=new DB();
		$ob->connect();
		$result=$ob->selectExecute($sql);	
		echo $result;
			die();			
	}
?>
