<?php

require './vendor/autoload.php';

use Endereco\BankAccountCheck\BankAccount; // Facade definieren.

$bankAccount = "";
$bankCode = "";
$countryCode = "";

if (BankAccount::isCountrySupported($countryCode) && BankAccount::isBankCodeSupported($bankCode)) {

    // Hauptaufgabe.
    $bankAccountValid = BankAccount::isValid($bankAccount, $bankCode); // true oder false.
    echo  $bankAccountValid . PHP_EOL;

    // Prüfmethode herausfinden.
    $checkMethod = BankAccount::getCheckMethod($bankCode); // gibt z.B. "08" zurück.
    echo  $checkMethod . PHP_EOL;

} else {
    // Kontonummer kann nicht geprüft werden.
    echo  "Kontonummer kann nicht geprüft werden." . PHP_EOL;
}
