<?php

/*
Ферма 2.0

a. Добавим к созданным в предыдущем задании классам следующие классы:

■ Goose - Гусь
■ Turkey - Индюк
■ Horse - Лошадь
■ BirdFarm - Птичья ферма
■ Farmer - фермер

b. Теперь у нас есть две фермы, одна будет для птиц, другая для животных с копытцами (hoof).

c. Создайте дополнительные уровни абстракции для животных (копытные и птицы). При этом
птицы при ходьбе должны пытаться взлететь, а не топать как другие животные. У них должен
быть метод function tryToFly(), который выводит "Вжих-Вжих-топ-топ". Скорректируйте
наследования всех животных на более точные, и реализуйте недостающие методы

d. На птицеферме у нас строгий учет свободных мест, поэтому сразу после заселения туда новой
птицы, Ферма должна сообщать суммарное количество птиц на ней, для этого добавьте метод
function showAnimalsCount(), который выводит на экран "Птиц на ферме: <кол-во птиц>"

e. За расселение животных и учет на фермах теперь частично отвечает фермер. Добавьте фермеру
методы

■ function addAnimal(Farm $farm, Animal $animal) - метод должен заселить на ферму $farm,
животное $animal

■ function rollCall(Farm $farm) - метод должен вызывать перекличку на ферме $farm

f. Создайте объекты: фермер, ферма, птицеферма. Создайте в указанном порядке и прикажите
фермеру заселить следующих животных: Корову, две хрюшки, Курицу, три Индейки, двух
Лошадей и одного Гуся

g. После этого заставьте этого лентяя устроить перекличку всех животных на обеих фермах.
*/

namespace BirdFarm;

abstract class Animal
{
	public $voice;

	public function say()
	{
		echo $this->voice.' </br>';
	}

	public function walk()
	{
		echo 'топ-топ'.'</br>';
	}
}

abstract class BirdAnimal extends Animal
{
	public function walk()
	{
		$this->tryToFly();
	}

	public function tryToFly()
	{
		echo 'Вжих-Вжих-топ-топ' . '</br>';
	}
}

abstract class HoofAnimal extends Animal
{	
}

class Cow extends Animal
{
	public $voice = 'Муууу';
}

class Pig extends Animal
{
	public $voice = 'ХрюХрю';
}

class Chicken extends BirdAnimal
{
	public $voice = 'КхоКхо';
}

class Goose extends BirdAnimal
{
	public $voice = 'КряКря';
}

class Turkey extends BirdAnimal
{	
	public $voice = 'КудахКудах';
}

class Horse extends HoofAnimal
{	
	public $voice = 'Игоо';
}

class Farm
{
	public $animals = [];

	public function addAnimal(Animal $animal)
	{
	//d. При заселении на ферму животное должно пойти.
		$this->animals[] = $animal;
		$animal->walk();
	}

	public function rollCall()
	{
		shuffle($this->animals);	

		foreach ($this->animals as $animal) {
			$animal->say();	
			}
	}
}

class BirdFarm extends Farm
{
// 	d. На птицеферме у нас строгий учет свободных мест, поэтому сразу после заселения туда новой
// птицы, Ферма должна сообщать суммарное количество птиц на ней, для этого добавьте метод
// function showAnimalsCount(), который выводит на экран "Птиц на ферме: <кол-во птиц>"
	
	public function addAnimal(Animal $animal) {
		//$this->animals[] = $animal;
		parent::addAnimal($animal);
		$this->showAnimalsCount();
	}

	public function showAnimalsCount()
	{
		echo 'Птиц на ферме: ' . count($this->animals) . '</br>'; 	
	} 
}

class Farmer
{
// 	e. За расселение животных и учет на фермах теперь частично отвечает фермер. Добавьте фермеру
// методы
	public function addAnimal(Farm $farm, Animal $animal)
	{
		$farm->addAnimal($animal);	
	}

	public function rollCall(Farm $farm)
	{
		shuffle($farm->animals);

		foreach ($farm->animals as $animal) {
			echo $animal->say();
		}
	}
}

echo '<hr>';

$farmer = new Farmer();
$farm = new Farm();
$farmBird = new BirdFarm();

echo '<h1>Фермер заселяет животных</h2>';

$farmer->addAnimal($farm, new Cow());
$farmer->addAnimal($farm, new Pig());
$farmer->addAnimal($farm, new Pig());
$farmer->addAnimal($farmBird, new Chicken());
$farmer->addAnimal($farmBird, new Turkey());
$farmer->addAnimal($farmBird, new Turkey());
$farmer->addAnimal($farmBird, new Turkey());
$farmer->addAnimal($farm, new Horse());
$farmer->addAnimal($farm, new Horse());
$farmer->addAnimal($farmBird, new Goose());

echo '<h2>Перекличка на ферме</h2>';

$farmer->rollCall($farm);

echo '<h2>Перекличка на Птице-ферме</h2>';

$farmer->rollCall($farmBird);