<?php


$Parakeet = new Bard("P-chan","ピーピー");
$Parakeet->cry();

$Parakeet->catch();
$Parakeet->catch();
$Parakeet->catch();

$Crow = new Bard("K-kun","カーカー");
$Swan = new Bard("Suwasan","コーコー");
$Parakeet->be_friends_with($Crow);
$Parakeet->be_friends_with($Swan);
$Parakeet->get_friends();

$Parakeet->give_birth("P-ko","ピヨピヨ");
$Parakeet->give_birth("P-taro","ピイピイ");
$Parakeet->get_childlen();

class Bard {

    private string $name;
    private string $voice;
    private $catched_prey = [];
    private $friends = [];
    private $childlen = [];

    function __construct(string $name, string $voice) {
        $this->name = $name;
        $this->voice = $voice;
    }

    function cry(): void {

        print("{$this->voice}" . PHP_EOL);

    }

    function catch() {

        $prey = ['木の実','昆虫','果物','植物'];
        $get = array_rand($prey,1);
        $get_item = $prey[$get];
        array_push( $this->catched_prey , $get_item );

        print ("{$get_item}を捕まえました。". PHP_EOL);
        print("カゴの中身に");
        foreach($this->catched_prey as $item){
            print (" {$item}");
        }
        print(" が入っています。" . PHP_EOL);

    }

    function be_friends_with($friends_Bard){

        array_push($this->friends , $friends_Bard );

    }

    function give_birth(string $name,string $voice){

        $baby = new Bard ($name,$voice);

        array_push($this->childlen , $baby);

        return $baby;
    }

    public function get_friends(){

        var_dump($this->friends);
        $friend_name = array_column( $this->friends , 'name');

        print("これまでできたお友達は".PHP_EOL);
        print_r($friend_name);
        print(" です。" . PHP_EOL);

        return $this->friends;
    }

    function get_childlen(){

        var_dump($this->childlen);
        $childlen_name = array_column( $this->childlen , 'name');

        print("これまで生まれた子どもは". PHP_EOL);
        print_r ($childlen_name);
        print(" です。" . PHP_EOL);

        return $this->childlen;
    }
}