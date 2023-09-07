<?php


$Parakeet = new Bard("P-chan","ピーピー");
$Parakeet->cry();
$Parakeet->catch();
$Parakeet->catch();
$Crow = new Bard("K-kun","カーカー");
$Parakeet->be_friends_with("Crow");
$Parakeet->be_friends_with("Swan");
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

    function catch(): void {

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

    //Bard型を入れる方法が分からない。。。
    function be_friends_with(string $friends_name): void {

        array_push($this->friends , $friends_name );

        print ("{$friends_name}が友達になりました。". PHP_EOL);

    }

    function give_birth(string $name,string $voice): void{

        $this->childlen[] = ['name' => $name, 'voice' => $voice];
        
        print ("{$name}が生まれました。". PHP_EOL);

    }

    function get_friends(){
        print("これまでできたお友達は");
        foreach($this->friends as $friend){
            print (" {$friend}");
        }
        print(" です。" . PHP_EOL);
    }

    function get_childlen(){
        print("これまで生まれた子どもは". PHP_EOL);
            print_r ($this->childlen);
        print(" です。" . PHP_EOL);
    }
}