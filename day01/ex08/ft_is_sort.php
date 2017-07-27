<?php
function ft_is_sort($tab)
{
	$old = $tab;
	$dsc = $tab;
	$asc = $tab;

	sort($dsc);
	rsort($asc);
	if ($old === $dsc || $old === $asc)
		return (true);
	return (false);
}
?>
