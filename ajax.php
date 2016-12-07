<script language ="php">
    var $number = 0;
    
    if (isset($_POST['data[]'])) {
        $stuff = $_POST['data[]'];
        echo "Got it!";
        switch ($stuff[0]) {
            case 'buy':
                $number = $stuff[1];
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