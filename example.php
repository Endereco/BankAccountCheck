<?php

require './vendor/autoload.php';

use Endereco\BankAccountCheck\BankAccount; // Facade definieren.

$bankAccount = "0044649465";
$bankCode = "79050000";
$countryCode = "DE";

if (BankAccount::isCountrySupported($countryCode) && BankAccount::isBankCodeSupported($bankCode)) {

    // Hauptaufgabe.
    $bankAccountValid = BankAccount::isValid($bankAccount, $bankCode); // true oder false.
    echo  $bankAccountValid . PHP_EOL;

    // Prüfmethode herausfinden.
    $checkMethod = BankAccount::getCheckMethod($bankCode); // gibt z.B. "08" zurück.
    echo  $bankAccountValid . PHP_EOL;

    // Prüfziffer herausfinden.
    $checkSum = BankAccount::getCheckSum($bankAccount); // gibt z.B. "5" zurück. Optional
    echo  $bankAccountValid . PHP_EOL;

} else {
    // Kontonummer kann nicht geprüft werden.
    echo  "Kontonummer kann nicht geprüft werden." . PHP_EOL;
}
