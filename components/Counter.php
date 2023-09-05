<?php
    $countFilepath = "/tmp/counter";
    $count = file_exists($countFilepath) ? intval(file_get_contents($countFilepath)) : 0;

    if (array_key_exists("increment", $_GET))
    {
        file_put_contents($countFilepath, ++$count);
        echo $count;
        exit;
    }
?>

<div>Count: <span id="count"><?php echo $count ?></span></div>
<button hx-post="components/Counter.php?increment=1" hx-swap="innerHTML" hx-target="#count">
    Increment
</button>