<?php
class Cow {
    private $id;
    function __construct() {
        $this->id = uniqid("cow");
    }
    public function getId() {
        return $this->id;
    }
    public function getMilk(){
        return rand(8, 12);
    }
}
class Chicken {
    private $id;
    function __construct() {
        $this->id = uniqid("chicken");
    }
    public function getId() {
        return $this->id;
    }
    public function getEgg(){
        return rand(0, 1);
    }
}
class Farm {
    public $cows = array();
    public $chickens = array();
    public function addCows($count1){
        $currentcows = count($this->cows);
        for($i=$currentcows;$i<($currentcows+$count1);$i++){
            $this->cows[$i] = new Cow();
        }
    }
    public function getCows() {
        return $this->cows;
    }
    public function addChicken($count2){
        $currentchicken = count($this->chickens);
        for($i=$currentchicken;$i<($currentchicken+$count2);$i++){
            $this->chickens[$i] = new Chicken();
        }
    }
    public function getChickens() {
        return $this->chickens;
    }
    public function takeAllEggs() {
        $currentEggs = 0;
        for($i=0;$i<count($this->chickens);$i++){
            $currentEggs += $this->chickens[$i]->getEgg();
        }
        return $currentEggs;
    }
    public function takeAllMilk() {
        $currentMilk = 0;
        for($i=0;$i<count($this->cows);$i++){
            $currentMilk += $this->cows[$i]->getMilk();
        }
        return $currentMilk;
    }
    public function takeAllResurs($n){
        $countMilk = 0;
        $countEggs = 0;
        for ($i=0; $i<$n; $i++) {
            $countMilk += $this->takeAllMilk();
            $countEggs += $this->takeAllEggs();
        }
        return '<ul><li>'.$countMilk . ' - Литров молока '.'</li>'. '<li>'.$countEggs . ' - Яиц '.'</li></ul>';
    }
}
$farm1 = new Farm();
$farm1->addCows(10);
$farm1->addChicken(20);

echo "<b>Количество скота на ферме:</b>";
echo "<ul>";
echo "<li>Коров: ".count($farm1->getCows())."</li>";
echo "<li>Кур: ".count($farm1->getChickens())."</li>";
echo "</ul>";

echo '<b>За 7 дней с имеющимся скотом было собранно:</b>';
echo $farm1->takeAllResurs(7);

$farm1->addCows(1);
$farm1->addChicken(5);

echo "<b>Количество скота на ферме после покупки 1 коровы и 5 кур:</b>";
echo "<ul>";
echo "<li>Коров: ".count($farm1->getCows())."</li>";
echo "<li>Кур: ".count($farm1->getChickens())."</li>";
echo "</ul>";

echo '<b>За 7 дней с имеющимся скотом было собранно:</b>';
echo $farm1->takeAllResurs(7);


?>