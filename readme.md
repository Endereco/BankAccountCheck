# PRÜFUNG der Kontonummer

## Installation

```
composer require endereco/bank-account-check
```

## Update

```
composer update endereco/bank-account-check
```

## Nutzung

```php 
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
```












# Kontonummernprüfung

Hiermit kann die Prüfziffer einer Kontonummer geprüft werden.

## Namespace

Bevor die Kontonummernprüfung verwendet werden kann, muss zunächst der Namespace eingebunden werden.
```
namespace Endereco\BankAccount;
```

## Aufruf
``` php
BankAccount::isBankAccountNumberValid($iBan, &$status) : boolean
```

*Übergabeparameter*

| Parameter | Typ | Beschreigung |
| ---- | --- | --------- |
| iBan | string | Hier wird die volle iBan übergeben. In der iBan können auch Leerzeichen enthalten sein |
| status | array | In diesem Array wird der Status der Prüfung gespeichert|

*Rückgabewert*

| Typ | Bedeutung |
| ---- | --------- |
| boolean | Gibt nur false zurück, wenn die Prüfziffer der Kontonummer falsch ist ansonsten true. Es wird auch true zurückgegeben, wenn die Kontonummer nicht geprüft werden konnte|

*Mögliche Statuscodes:*

| Statuscode | Bedeutung |
| ---- | --------- |
| checked_with_method_XX | Die Kontonummer wurde mit der Berechnungsmethode XX geprüft |
| iban_with_wrong_country_code | Die iBan stammt aus einem Land dass nicht unterstützt wird. Hierbei wird true zurückgegeben. |
| iban_with_wrong_length | Die iBan hat für die Prüfung die falsche Länge. Hierbei wird true zurückgegeben |
| bank_code_is_unknown | Die Bankleitzahl ist unbekannt. Hierbei wird true zurückgegeben |
| method_XX_not_supported | Diese Berechnungsmethode wird nicht unterstützt. Hierbei wird true zurückgegeben|

## Beispiele

*1. Beispiel:* Prüfung einer gültigen Kontonummer

``` php
<?php
$status = array();
$isBankAccountNumberValid = BankAccount::isBankAccountNumberValid("DE26 10130800 0002034304", $status);

if ($isBankAccountNumberValid) {
    echo "Kontonummer ist gültig oder konnte nicht geprüft werden";
    
    if (str_starts_with($status[0], "checked_with_method_")) {
            echo "Kontonummer wurde geprüft und ist gültig";
    }
    
} else {
    echo "Kontonummer ist ungültig";
}

// Der Inhalt vom Status ist hier ["checked_with_method_01"]
echo json_encode($status);

?>
```

*2. Beispiel:* Prüfung einer Kontonummer dessen Berechnungsmethode nicht unterstützt wird

``` php
<?php
$status = array();
$isBankAccountNumberValid = BankAccount::isBankAccountNumberValid("DE26 86055592 0002034304", $status);

if ($isBankAccountNumberValid) {
    echo "Kontonummer ist gültig oder konnte nicht geprüft werden";
} else {
    echo "Kontonummer ist ungültig";
}

// Der Inhalt vom Status ist hier ["method_D0_not_supported"]
echo json_encode($status);

?>
```

*3. Beispiel:* Prüfung einer Kontonummer dessen iBan aus einem nicht unterstütztem Land kommt

``` php
<?php
$status = array();
$isBankAccountNumberValid = BankAccount::isBankAccountNumberValid("ED26 86055592 0002034304", $status);

if ($isBankAccountNumberValid) {
    echo "Kontonummer ist gültig oder konnte nicht geprüft werden";
} else {
    echo "Kontonummer ist ungültig";
}

// Der Inhalt vom Status ist hier ["iban_with_wrong_country_code"]
echo json_encode($status);

?>
```

*4. Beispiel:* Prüfung einer Kontonummer dessen iBan die falsche Länge hat

``` php
<?php
$status = array();
$isBankAccountNumberValid = BankAccount::isBankAccountNumberValid("DE26 86055592 0002034304 0", $status);

if ($isBankAccountNumberValid) {
    echo "Kontonummer ist gültig oder konnte nicht geprüft werden";
} else {
    echo "Kontonummer ist ungültig";
}

// Der Inhalt vom Status ist hier ["iban_with_wrong_length"]
echo json_encode($status);

?>
```

*5. Beispiel:* Prüfung einer Kontonummer dessen Bankleitzahl unbekannt ist

``` php
<?php
$status = array();
$isBankAccountNumberValid = BankAccount::isBankAccountNumberValid("DE26 99999999 0002034304", $status);

if ($isBankAccountNumberValid) {
    echo "Kontonummer ist gültig oder konnte nicht geprüft werden";
} else {
    echo "Kontonummer ist ungültig";
}

// Der Inhalt vom Status ist hier ["bank_code_is_unknown"]
echo json_encode($status);

?>
```
