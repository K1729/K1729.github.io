<script language ="php">
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'buy':
                $number = intval($_POST['stuff']);
                //var_dump($number);
                Buy($number);
                break;
            case 'sell':
                $number = intval($_POST['stuff']);
                //var_dump($number);
                Sell($number);
                break;
        }
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        
        $jsonString = file_get_contents("user/player.json");
        $data = json_decode($jsonString, true);
        $results = $data["results"];
        
        $thing = $results[$number];
        if ($thing["hinta"] > 30000){
            echo "No can do. Maksaa liikaa.";
        }
        else {
            $thing["owner"] = "Computer";
            $results["$number"] = $thing;
        }
        
        $data["results"] = $results;
        $jsonString = json_encode($data);
    }

    function Sell($number) {
        $jsonString = file_get_contents("user/player.json");
        $data = json_decode($jsonString, true);
        $results = $data["results"];
        
        $thing = $results[$number];
        $thing["owner"] = "Computer";
        $results["$number"] = $thing;
        
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
        $raha = $thing["price"];
        if ($raha > 30000) {
            echo "No can do. Maksaa liikaa.";
        }
        else {
            $thing["owner"] = "Computer";
            $results["$number"] = $thing;
            echo "Item was bought!";
        }
        
        $data["results"] = $results;
        $jsonString = json_encode($data);
        file_put_contents("user/player.json", $jsonString);
        
    }
</script>