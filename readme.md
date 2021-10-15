# Prüfung der Kontonummer

Hiermit kann die Prüfziffer einer Kontonummer geprüft werden.

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
require './vendor/autoload.php';

use Endereco\BankAccountCheck\BankAccount; // Facade definieren.

$bankAccount = "";
$bankCode = "";
$countryCode = "DE";

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

```

## Einzelnen Methoden

### isCountrySupported

Überprüft, ob das Land unterstützt wird.

Aufruf
``` php
BankAccount::isCountrySupported($countryCode)
```

*Übergabeparameter*

| Parameter | Typ | Beschreigung |
| ---- | --- | --------- |
| countryCode | String | Ländercode z.B. "DE"|

*Rückgabewert*

| Typ | Bedeutung |
| ---- | --------- |
| boolean | Gibt true zurück, wenn das Land unterstützt wird ansonsten false |

### isBankCodeSupported

Überprüft, ob die Berechnungsmethode zu einer Bankleitzahl unterstützt wird

Aufruf
``` php
 BankAccount::isBankCodeSupported($bankCode)
```

*Übergabeparameter*

| Parameter | Typ | Beschreigung |
| ---- | --- | --------- |
| bankCode | String | Bankleitzahl|

*Rückgabewert*

| Typ | Bedeutung |
| ---- | --------- |
| boolean | Gibt true zurück, wenn die Bankleitzahl unterstützt wird ansonsten false |

### isValid

Überprüft ob die Prüfziffer einer Kontonummer richtig ist

Aufruf
``` php
 BankAccount::isValid($bankAccount, $bankCode)
```

*Übergabeparameter*

| Parameter | Typ | Beschreigung |
| ---- | --- | --------- |
| bankAccount | String | Bankleitzahl zu der zu prüfenden Kontonummer|
| bankCode | String | Kontonummer die geprüft werden soll |

*Rückgabewert*

| Typ | Bedeutung |
| ---- | --------- |
| boolean | Gibt true zurück, wenn die Prüfziffer der Kontonummer richtig ist ansonsten false |

### getCheckMethod

Liefert die Berechnungsmethode zu einer Bankleitzahl

Aufruf
``` php
BankAccount::getCheckMethod($bankCode)
```

*Übergabeparameter*

| Parameter | Typ | Beschreigung |
| ---- | --- | --------- |
| bankCode | String | Bankleitzahl|

*Rückgabewert*

| Typ | Bedeutung |
| ---- | --------- |
| String | Berechnungsmethode z.B. "00" |