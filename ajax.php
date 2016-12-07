<script language ="php">
    $number = 0;
    
    if (isset($_POST['action'])) {
        echo $_POST['action'];
        var_dump($_POST['stuff']);
        switch ($_POST['action']) {
            case 'buy':
                $number = $_POST['stuff'];
                Buy();
                break;
            case 'sell':
                $number = $stuff[1];
                Sell();
                break;
        }
    }

    function Sell() {
        $jsonString = file_get_contents("user/player.json");
        $data = json_decode($jsonString, true);
        $results = $data["results"];

        $thing = $results[$number];
        $thing["owner"] = "Computer";
        $results["$number"] = $thing;
        
        $data["results"] = $results;
        $jsonString = json_encode($data);
        file_put_contents("user/player.json", $jsonString);
    }
    
    function Buy() {
        $jsonString = file_get_contents("user/player.json");
        $data = json_decode($jsonString, true);
        $results = $data["results"];

        $thing = $results[$number];
        $thing["owner"] = "Jari";
        $results["$number"] = $thing;
        
        $data["results"] = $results;
        $jsonString = json_encode($data);
        file_put_contents("user/player.json", $jsonString);
    }
</script>