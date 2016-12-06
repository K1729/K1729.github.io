<script language ="php">
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'buy':
                insert();
                break;
            case 'select':
                select();
                break;
        }
    }

    function select() {
        echo "The select function is called.";
        exit;
    }

    function insert() {
        echo "The buy function is called.";
        exit;
    }
</script>