# Ферма 2.0

a. Добавим к созданным в предыдущем задании классам следующие классы:
- Goose - Гусь
- Turkey - Индюк
- Horse - Лошадь
- BirdFarm - Птичья ферма
- Farmer - фермер

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
- function addAnimal(Farm $farm, Animal $animal) - метод должен заселить на ферму $farm,
животное $animal
- function rollCall(Farm $farm) - метод должен вызывать перекличку на ферме $farm

f. Создайте объекты: фермер, ферма, птицеферма. Создайте в указанном порядке и прикажите
фермеру заселить следующих животных: Корову, две хрюшки, Курицу, три Индейки, двух
Лошадей и одного Гуся

g. После этого заставьте этого лентяя устроить перекличку всех животных на обеих фермах.
