#!/bin/perl/
@vector1;
@vector2;
@suma;
 
print "Introducir 5 numeros  Vector A \n";
for ( $i = 0; $i < 5; $i++ ) {
    $num1[$i]    = <stdin>;
    $vector1[$i] = $num1;
}
print " ######## Los Numeros Introducidos en el Vector A Son ########:\n";
 
for ( $i = 0; $i < 5; $i++ ) {
    print "\t$vector1[$i]";
}
 
print "Introducir 5 numeros  Vector B \n";
 
for ( $i = 0; $i < 5; $i++ ) {
    $num2[$i]    = <stdin>;
    $vector2[$i] = $num2;
}
print " ######## Los Numeros Introducidos en el Vector B Son #########\n";
 
for ( $i = 0; $i < 5; $i++ ) {
    print "\t$num2[$i]";
}
 
for ( $i = 0; $i < 5; $i++ ) {
    $suma[$i] = $num1[$i] + $num2[$i];
 
}
 
print " ######## La suma de los vectores A y B son: ########\n";
 
for ( $i = 0; $i < 5; $i++ ) {
    print "\t$suma[$i] \n";
}

