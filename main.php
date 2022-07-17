<?php
class Animal{
    private $id;
    function __construct($type) {
        $this->id = uniqid($type);
    }
    public function getId() {
        return $this->id;
    }
}
class Cow extends Animal{
    public function getRes(){
        return rand(8, 12);
    }
}
class Chicken extends Animal{
    public function getRes(){
        return rand(0, 1);
    }
}
class Farm {
    public function AddAnimals($count1, $type){
        $currentanimals = count($this->$type);
        for($i=$currentanimals;$i<($currentanimals+$count1);$i++){
            $this->$type[$i] = new $type("$type");
        }
    }
    public function getAnimals($type){
        return $this->$type;
    }
    public function takeAllResurs($type){
        $currentResurs = 0;
        for($i=0;$i<count($this->$type);$i++){
            $currentResurs += $this->$type[$i]->getRes();
        }
        return $currentResurs;
    }
    public function takeResurs($n,$type){
        $countResurs = 0;
        for ($i=0; $i<$n; $i++) {
            $countResurs += $this->takeAllResurs($type);
        }
        return $countResurs;
    }
}
$farm1 = new Farm();
$farm1->addAnimals(10, 'cow');
$farm1->addAnimals(20, 'chicken');

echo "<b>Количество скота на ферме:</b>";
echo "<ul>";
echo "<li>Коров: ".count($farm1->getAnimals('cow'))."</li>";
echo "<li>Кур: ".count($farm1->getAnimals('chicken'))."</li>";
echo "</ul>";

echo '<b>За 7 дней с имеющимся скотом было собранно:</b>';
echo "<ul>";
echo "<li>" . $farm1->takeResurs(7, 'cow') . ' литров молока' ."</li>";
echo "<li>" . $farm1->takeResurs(7, 'chicken') . '  яиц' . "</li>";
echo "</ul>";



$farm1->addAnimals(1, 'cow');
$farm1->addAnimals(5, 'chicken');

echo "<b>Количество скота на ферме после покупки 1 коровы и 5 кур:</b>";
echo "<ul>";
echo "<li>Коров: ".count($farm1->getAnimals('cow'))."</li>";
echo "<li>Кур: ".count($farm1->getAnimals('chicken'))."</li>";
echo "</ul>";

echo '<b>За 7 дней с имеющимся скотом было собранно:</b>';
echo "<ul>";
echo "<li>" . $farm1->takeResurs(7, 'cow') . '  литров молока' . "</li>";
echo "<li>" . $farm1->takeResurs(7, 'chicken') . '  яиц'. "</li>";
echo "</ul>";
?>
