<? {
    require_once ROOT_PATH . "/libs/uniqueIds.php";
    require_once ROOT_PATH . "/libs/state.php";

    $classes = new UniqueIdStore();
    $ids = new UniqueIdStore();
    $store = new FileStore("/tmp/counter-store");

    $store->count ??= 0;

    if (COMPONENT_CALL) {
        if (isset($_GET['increment'])) {
            echo ++$store->count;
        } else if (isset($_GET['decrement'])) {
            echo --$store->count;
        }
        exit;
    }
?>
    <div>
        Count: <span id="<?= $ids->count ?>"> <?= $store->count ?> </span>
    </div>
    <button hx-post="$/Counter.php?increment=1" hx-swap="innerHTML" hx-target="#<?= $ids->count ?>">
        Increment
    </button>
    <button hx-post="$/Counter.php?decrement=1" hx-swap="innerHTML" hx-target="#<?= $ids->count ?>">
        Decrement
    </button>

<?
}
