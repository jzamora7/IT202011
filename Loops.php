//Jossie Zamora
//IT202
//PHP Loops HW
<?php
//Problem 1
//Create an array/collection of numbers (initialize it with any number of numbers(more than 1)
//with or without duplicates)
$array1 = array(2, 64, 54, 62, 23, 98, 56);
sort($array1);
//Problem 2
//Create a loop that liips over each number and shows their value.
foreach ($array1 as $item){
    echo($item);
    echo("\n");
    }
echo("\n");
//Problem 3
//Have the loop output only even numbers regardless of how long the array/collection is.
foreach ($array1 as $item){
    if ($item % 2 == 0){
    echo($item);
    echo("\n");}}
echo("\n");
//Problem 4
//Briefly explain how you achieved the correct output.
//For problem 1 I just created an array with numbers I randomly got buy swiping my keyboard and just added commas
//  I also just put them in numerical order by just using the sort function for my array.

//For problem 2 I just created a for loop to iterate through my array and to echo each number as it did so, also
//I added a line break for clean output.

//For problem 3 I added an if statement to my for loop to find if the modulus of the number in my array divided by 2
//is 0. If it is then it will echo the item. There was no need for any else statement as the loop would not generate
//any output if the output did not meet the if statement.

?>