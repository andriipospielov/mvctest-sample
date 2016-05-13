<?php
?>
<ol>
    <? foreach ($this->list as $key => $item):?>
        <li><? echo $key.': '. $item;?></li>
    <?endforeach;?>
	
</ol>