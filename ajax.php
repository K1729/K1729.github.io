<script language ="php">
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'buy':
                $number = intval($_POST['stuff']);
                var_dump($number);
                Buy($number);
                break;
            case 'sell':
                $number = intval($_POST['stuff']);
                var_dump($number);
                Sell($number);
                break;
        }
    }

    function Sell($number) {
        $jsonString = file_get_contents("user/player.json");
        $data = json_decode($jsonString, true);
        $results = $data["results"];
        
        $thing = $results[$number];
        var_dump($thing["owner"]);
        $thing["owner"] = "Computer";
        $results["$number"] = $thing;
        
        var_dump($thing["owner"]);
        
        $data["results"] = $results;
        $jsonString = json_encode($data);
        file_put_contents("user/player.json", $jsonString);
        
        echo "Item was sold!";
    }
    
    function Buy($number) {
        $jsonString = file_get_contents("user/player.json");
        $data = json_decode($jsonString, true);
        $results = $data["results"];
        
        $thing = $results[$number];
        var_dump($thing["owner"]);
        $thing["owner"] = "Jari";
        $results[$number] = $thing;
        
        var_dump($thing["owner"]);
        
        $data["results"] = $results;
        $jsonString = json_encode($data);
        file_put_contents("user/player.json", $jsonString);
        
        echo "Item was bought!";
    }
</script>