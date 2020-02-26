<?php
function ft_is_sort($tab)
{
    $initial = $tab; 
    sort($tab);
    if ($tab == $initial)
        return true;
    return false;
}
?>