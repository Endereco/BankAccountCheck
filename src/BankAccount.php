<?php

/**
 * BankAccount
 *
 * PHP Version 7
 *
 * @category  Class
 * @package   Src
 * @author    Florian Dreßler <florian.dressler@mobilemojo.de>
 * @copyright 2018 mobilemojo – Apps & eCommerce UG (haftungsbeschränkt) & Co. KG
 *            (https://www.mobilemojo.de/)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License,
 *            version 3 (GPLv3)
 *
 * @link https://www.endereco.de
 */

namespace Endereco\BankAccount;

use PHP_CodeSniffer\Tests\Core\Tokenizer\StableCommentWhitespaceTest;
use phpDocumentor\Reflection\Types\Boolean;
use function Composer\Autoload\includeFile;

require  "MyBankCode.php";

/**
 * BankAccount
 *
 * Checks the check number of a bank number
 *
 * PHP Version 7
 *
 * @category  Class
 * @package   Src
 * @author    Florian Dreßler <florian.dressler@mobilemojo.de>
 * @copyright 2018 mobilemojo – Apps & eCommerce UG (haftungsbeschränkt) & Co. KG
 *            (https://www.mobilemojo.de/)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License,
 *            version 3 (GPLv3)
 *
 * @link https://www.endereco.de
 */

class BankAccount
{
    public static $object;

    /**
     * Checks the check number of a bank account number
     * The bank account number will be extracted by the iban
     *
     * @param String $iban   the iban to check
     * @param array  $status variable to save the status
     *
     * @return boolean true if the check number is valid else false
     */
    public static function isBankAccountNumberValid($iban, &$status)
    {
        $iban = (new self)->_removeAllWhiteSpacesFromIban($iban);
        $calculateMethodKey = (new self)->_getCalculationMethodKey($iban);
        $bankAccountNumber = (new self)->_extractBankAccountNumberFromIban($iban);
        $countryCodeOfIban = substr($iban, 0, 2);

        // return true if the country code is not "de"
        if (strtolower($countryCodeOfIban) != strtolower('DE')) {
            $status[] = "iban_with_wrong_country_code";
            return true;
        }

        // return true if the iban has the wrong length except method "68", "C0"
        if (strlen($iban) != 22 && !in_array($calculateMethodKey, array("68", "C0"))) {
            $status[] = "iban_with_wrong_length";
            return true;
        }

        // return true if the bank code is unknown
        if (is_null($calculateMethodKey)) {
            $status[] = "bank_code_is_unknown";
            return true;
        }

        switch ($calculateMethodKey)
        {
        case "00":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod00($bankAccountNumber);

        case "01":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod01($bankAccountNumber);

        case "02":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod02($bankAccountNumber);

        case "03":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod03($bankAccountNumber);

        case "04":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod04($bankAccountNumber);

        case "05":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod05($bankAccountNumber);

        case "06":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod06($bankAccountNumber);

        case "07":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod07($bankAccountNumber);

        case "08":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod08($bankAccountNumber);

        case "09":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            return true;

        case "10":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod10($bankAccountNumber);

        case "11":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod11($bankAccountNumber);

        case "12":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            return true;

        case "13":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod13($bankAccountNumber);

        case "14":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod14($bankAccountNumber);

        case "15":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod15($bankAccountNumber);

        case "16":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod16($bankAccountNumber);

        case "17":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod17($bankAccountNumber);

        case "18":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod18($bankAccountNumber);

        case "19":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod19($bankAccountNumber);

        case "20":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod20($bankAccountNumber);

        case "21":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod21($bankAccountNumber);

        case "22":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod22($bankAccountNumber);

        case "23":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod23($bankAccountNumber);

        case "24":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod24($bankAccountNumber);

        case "25":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod25($bankAccountNumber);

        case "26":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod26($bankAccountNumber);

        case "27":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod27($bankAccountNumber);

        case "28":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod28($bankAccountNumber);

        case "29":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod29($bankAccountNumber);

        case "30":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod30($bankAccountNumber);

        case "31":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod31($bankAccountNumber);

        case "32":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod32($bankAccountNumber);

        case "33":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod33($bankAccountNumber);

        case "34":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod34($bankAccountNumber);

        case "35":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod35($bankAccountNumber);

        case "36":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod36($bankAccountNumber);

        case "37":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod37($bankAccountNumber);

        case "38":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod38($bankAccountNumber);

        case "39":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod39($bankAccountNumber);

        case "40":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod40($bankAccountNumber);

        case "41":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod41($bankAccountNumber);

        case "42":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod42($bankAccountNumber);

        case "43":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod43($bankAccountNumber);

        case "44":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod44($bankAccountNumber);

        case "45":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod45($bankAccountNumber);

        case "46":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod46($bankAccountNumber);

        case "47":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod47($bankAccountNumber);

        case "48":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod48($bankAccountNumber);

        case "49":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod49($bankAccountNumber, $iban);

        case "50":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod50($bankAccountNumber);

        case "51":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod51($bankAccountNumber);

        case "52":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod52($iban);

        case "53":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod53($iban);

        case "54":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod54($bankAccountNumber);

        case "55":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod55($bankAccountNumber);

        case "56":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod56($bankAccountNumber);

        case "57":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod57($bankAccountNumber);

        case "58":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod58($bankAccountNumber);

        case "59":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod59($bankAccountNumber);

        case "60":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod60($bankAccountNumber);

        case "61":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod61($bankAccountNumber);

        case "62":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod62($bankAccountNumber);

        case "63":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod63($bankAccountNumber);

        case "64":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod64($bankAccountNumber);

        case "65":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod65($bankAccountNumber);

        case "66":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod66($bankAccountNumber);

        case "67":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod67($bankAccountNumber);

        case "68":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod68($bankAccountNumber);

        case "69":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod69($bankAccountNumber);

        case "70":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod70($bankAccountNumber);

        case "71":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod71($bankAccountNumber);

        case "72":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod72($bankAccountNumber);

        case "73":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod73($bankAccountNumber);

        case "74":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod74($bankAccountNumber);

        case "75":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod75($bankAccountNumber);

        case "76":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod76($bankAccountNumber);

        case "77":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod77($bankAccountNumber);

        case "78":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod78($bankAccountNumber);

        case "79":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod79($bankAccountNumber);

        case "80":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod80($bankAccountNumber);

        case "81":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod81($bankAccountNumber);

        case "82":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod82($bankAccountNumber);

        case "83":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod83($bankAccountNumber);

        case "84":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod84($bankAccountNumber);

        case "85":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod85($bankAccountNumber);

        case "86":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod86($bankAccountNumber);

        case "87":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod87($bankAccountNumber);

        case "88":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod88($bankAccountNumber);

        case "89":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod89($bankAccountNumber);

        case "90":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod90($bankAccountNumber);

        case "91":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod91($bankAccountNumber);

        case "92":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod92($bankAccountNumber);

        case "93":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod93($bankAccountNumber);

        case "94":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod94($bankAccountNumber);

        case "95":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod95($bankAccountNumber);

        case "96":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod96($bankAccountNumber);

        case "97":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod97($bankAccountNumber);

        case "98":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod98($bankAccountNumber);

        case "99":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethod99($bankAccountNumber);

        case "A1":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA1($bankAccountNumber);

        case "A2":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA2($bankAccountNumber);

        case "A3":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA3($bankAccountNumber);

        case "A4":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA4($bankAccountNumber);

        case "A5":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA5($bankAccountNumber);

        case "A6":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA6($bankAccountNumber);

        case "A7":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA7($bankAccountNumber);

        case "A8":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA8($bankAccountNumber);

        case "A9":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodA9($bankAccountNumber);

        case "B0":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB0($bankAccountNumber);

        case "B1":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB1($bankAccountNumber);

        case "B2":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB2($bankAccountNumber);

        case "B3":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB3($bankAccountNumber);

        case "B4":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB4($bankAccountNumber);

        case "B5":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB5($bankAccountNumber);

        case "B6":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB6($bankAccountNumber, $iban);

        case "B7":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB7($bankAccountNumber);

        case "B8":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB8($bankAccountNumber);

        case "B9":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodB9($bankAccountNumber);

        case "C0":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC0($bankAccountNumber, $iban);

        case "C1":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC1($bankAccountNumber);

        case "C2":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC2($bankAccountNumber);

        case "C3":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC3($bankAccountNumber);

        case "C4":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC4($bankAccountNumber);

        case "C5":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC5($bankAccountNumber);

        case "C6":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC6($bankAccountNumber);

        case "C7":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC7($bankAccountNumber);

        case "C8":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC8($bankAccountNumber);

        case "C9":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodC9($bankAccountNumber);

        case "D0":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD0($bankAccountNumber);

        case "D1":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD1($bankAccountNumber);

        case "D2":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD2($bankAccountNumber);

        case "D3":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD3($bankAccountNumber);

        case "D4":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD4($bankAccountNumber);

        case "D5":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD5($bankAccountNumber);

        case "D6":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD6($bankAccountNumber);

        case "D7":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD7($bankAccountNumber);

        case "D8":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD8($bankAccountNumber);

        case "D9":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodD9($bankAccountNumber);

        case "E0":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodE0($bankAccountNumber);

        case "E1":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodE1($bankAccountNumber);

        case "E2":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodE2($bankAccountNumber);

        case "E3":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodE3($bankAccountNumber);

        case "E4":
            $status[] = "checked_with_method_" . $calculateMethodKey;
            (new self)->_saveReporting($iban, $calculateMethodKey);
            return (new self)->_isCheckNumberValidWithMethodE4($bankAccountNumber);

        default:
            (new self)->_saveReporting($iban, $calculateMethodKey);
            $status[] = "method_" . $calculateMethodKey . "_not_supported";
            return true;
        }
    }

    /**
     * Save the Reporting with iban and the calculate key
     *
     * @param $iban                    String iban to check
     * @param $checkNumberCalculateKey String calculate key
     *
     * @return null
     */
    function _saveReporting($iban, $checkNumberCalculateKey) : void
    {
        if (!empty(self::$object)) {
            self::$object->save($iban, $checkNumberCalculateKey);
        }
    }

    /**
     * Set the to save object
     *
     * @param $object object to save
     *
     * @return null
     */
    public function setSaveObject($object)
    {
        self::$object = $object;
    }

    /**
     * Checks the check number of bank account number with method '00'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod00($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '01'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod01($bankAccountNumber)
    {
        $weighting = array(3, 7, 1, 3, 7, 1, 3, 7, 1, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '02'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod02($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 2, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '03'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod03($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 03 is like 01
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '04'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod04($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 04 is like 02
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '05'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod05($bankAccountNumber)
    {
        $weighting = array(7, 3, 1, 7, 3, 1, 7, 3, 1, 7);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 05 is like 01
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '06'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod06($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '07'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod07($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 07 is like 02
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '08'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod08($bankAccountNumber)
    {
        if (intval($bankAccountNumber) < 60000) {
            return true;
        }

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '10'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod10($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 10 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '11'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod11($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod11($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '13'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod13($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod13($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '14'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod14($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '15'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod15($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 0, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '16'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod16($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod16($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is true than is is valid
        if (is_bool($calculatedCheckNumber)) {
            if ($calculatedCheckNumber) {
                return true;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '17'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod17($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 3, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod17Version1($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '18'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod18($bankAccountNumber)
    {
        $weighting = array(3, 9, 7, 1, 3, 9, 7, 1, 3, 9, 7);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 18 is like 01
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '19'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod19($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 19 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '20'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod20($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 20 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '21'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod21($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod21($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '22'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod22($bankAccountNumber)
    {
        $weighting = array(3, 1, 3, 1, 3, 1, 3, 1, 3, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod22($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '23'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod23($bankAccountNumber)
    {
        $weighting = array(0, 0, 0, 2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod16($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is true than is is valid
        if (is_bool($calculatedCheckNumber)) {
            if ($calculatedCheckNumber) {
                return true;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '24'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod24($bankAccountNumber)
    {
        $weighting = array(1, 2, 3, 1, 2, 3, 1, 2, 3, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod24($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '25'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod25($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $kindOfBandAccountNumber = substr($bankAccountNumber, 1, 1);

        if ($calculatedCheckNumber == 0) {
            if (in_array($kindOfBandAccountNumber, array("8", "9"))) {
                return true;
            } else {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '26'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod26($bankAccountNumber)
    {
        $begin = substr($bankAccountNumber, 0, 2);

        if ($begin == "00") {
            $weighting = array(0, 2, 3, 4, 5, 6, 7, 2, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            $weighting = array(0, 0, 0, 2, 3, 4, 5, 6, 7, 2, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method '27'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod27($bankAccountNumber)
    {
        if (intval($bankAccountNumber) >= 1 && intval($bankAccountNumber) <= 999999999) {
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            $transformationsRows = "143214321";

            $transformationsRow1 = str_split("0159374826");
            $transformationsRow2 = str_split("0176983254");
            $transformationsRow3 = str_split("0184629573");
            $transformationsRow4 = str_split("0123456789");

            $transformationsTable
                = array ("1" => $transformationsRow1, "2" => $transformationsRow2,
                "3" => $transformationsRow3, "4" => $transformationsRow4);

            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethodM10H(
                $bankAccountNumber, $transformationsTable, $transformationsRows
            );

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method '28'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod28($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8);
        $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod28($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '27'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod29($bankAccountNumber)
    {
        $transformationsRows = "143214321";

        $transformationsRow1 = str_split("0159374826");
        $transformationsRow2 = str_split("0176983254");
        $transformationsRow3 = str_split("0184629573");
        $transformationsRow4 = str_split("0123456789");

        $transformationsTable = array (
            "1" => $transformationsRow1, "2" => $transformationsRow2,
            "3" => $transformationsRow3, "4" => $transformationsRow4
        );

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethodM10H(
            $bankAccountNumber, $transformationsTable, $transformationsRows
        );

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '27'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod30($bankAccountNumber)
    {
        $weighting = array(2, 0, 0, 0, 0, 1, 2, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod30($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '31'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod31($bankAccountNumber)
    {
        $weighting = array(9, 8, 7, 6, 5, 4, 3, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod31($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '32'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod32($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod32($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '33'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod33($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 33 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '34'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod34($bankAccountNumber)
    {
        $weighting = array(2, 4, 8, 5, 10, 9, 7);
        $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        //the calculation of 34 is like 28
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod28($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '35'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod35($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod35($bankAccountNumber, $weighting);

        $ninthNumbers = substr($bankAccountNumber, strlen($bankAccountNumber) - 2, 1);

        if ($calculatedCheckNumber == 10) {
            if ($ninthNumbers == $expectedCheckNumber) {
                return true;
            } else {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '36'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod36($bankAccountNumber)
    {
        $weighting = array(2, 4, 8, 5, 0, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '37'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod37($bankAccountNumber)
    {
        $weighting = array(2, 4, 8, 5, 10, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '38'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod38($bankAccountNumber)
    {
        $weighting = array(2, 4, 8, 5, 10, 9);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 38 is like 32
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod32($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '39'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod39($bankAccountNumber)
    {
        $weighting = array(2, 4, 8, 5, 10, 9, 7, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 38 is like 32
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod32($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '40'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod40($bankAccountNumber)
    {
        $weighting = array(2, 4, 8, 5, 10, 9, 7, 3, 6);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '41'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod41($bankAccountNumber)
    {
        $fourthNumber = substr($bankAccountNumber, 3, 1);

        if ($fourthNumber == "9") {
            $weighting = array(2, 1, 2, 1, 2, 1, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method '42'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod42($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '43'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod43($bankAccountNumber)
    {
        $weighting = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 43 is like 01
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '44'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod44($bankAccountNumber)
    {
        $weighting = array(2, 4, 8, 5, 10, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 33 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '45'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod45($bankAccountNumber)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);
        $fifthNumber = substr($bankAccountNumber, 4, 1);
        $firstTwoNumbers = substr($bankAccountNumber, 0, 2);

        if ($firstNumber == "0" || $fifthNumber == "1" || $firstTwoNumbers == "48") {
            return true;
        }

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '46'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod46($bankAccountNumber)
    {
        $weighting = array(0, 0, 0, 2, 3, 4, 5, 6, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '47'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod47($bankAccountNumber)
    {
        $weighting = array(0, 2, 3, 4, 5, 6, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, 8, 1);
        //the calculation of 47 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '48'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod48($bankAccountNumber)
    {
        $weighting = array(0, 2, 3, 4, 5, 6, 7, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, 8, 1);
        //the calculation of 48 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '49'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod49($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (01)
        $weighting = array(3, 7, 1, 3, 7, 1, 3, 7, 1, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '50'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod50($bankAccountNumber)
    {
        $weighting = array(0, 0, 0, 0, 2, 3, 4, 5, 6, 7);
        $expectedCheckNumber = substr($bankAccountNumber, 6, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '51'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod51($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            //first "Sachkonto" method (06)
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            //return true if the check number is valid after the first method
            if ($isCheckNumberValid) {
                return true;
            }

            //second "Sachkonto" method (06)
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }

        //first normal method (06)
        $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (33)
        $isCheckNumberValid = (new self)->_isCheckNumberValidWithMethod33($bankAccountNumber);

        //return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        //third method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        //return true if the check number is valid after the third method
        if ($isCheckNumberValid) {
            return true;
        }

        //fourth method (06 with % 7)
        $lastCharOfBankAccount = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);

        //if the last char of the bank account is a 7, 8 or 9 and
        // the first 3 methods are failed the bank account is invalid
        if (in_array(intval($lastCharOfBankAccount), array(7, 8, 9))) {
            return false;
        }

        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber
            = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '52'
     *
     * @param $iban String the full iban
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod52($iban)
    {
        //calculation if a "9" is before the check number
        $kindOfBankAccount = substr($iban, 12, 1);
        if (intval($kindOfBankAccount) == 9) {
            $bankAccountNumber = substr($iban, 12, strlen($iban) - 12);
            return (new self)->_isCheckNumberValidWithMethod20($bankAccountNumber);
        }

        $weighting = array(2, 4, 8, 5, 10, 9, 7, 3, 6, 1, 2, 4);

        // extract the bank code and bank account number of iban
        $bankCode = substr($iban, 4, 8);
        $bankAccountNumber = substr($iban, strlen($iban) - 8,  8);

        // extract the to use parts
        $partOfBankCode = substr($bankCode, 4, strlen($bankCode) - 4);
        $firstPartOfBankAccountNumber = substr($bankAccountNumber, 0, 1);
        $secondPartOfBankAccountNumber = substr($bankAccountNumber, 2, strlen($bankAccountNumber) - 2);

        // remove the leading "0"
        $partOfBankCode = strval(intval($partOfBankCode));
        $firstPartOfBankAccountNumber = strval(intval($firstPartOfBankAccountNumber));
        $secondPartOfBankAccountNumber = strval(intval($secondPartOfBankAccountNumber));

        $toCheckBankAccountNumber
            = $partOfBankCode . $firstPartOfBankAccountNumber . "0" . $secondPartOfBankAccountNumber;

        $temp = strval(intval($bankAccountNumber));
        $expectedCheckNumber = substr($temp, 1, 1);

        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod52($toCheckBankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '52'
     *
     * @param $iban String the full iban
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod53($iban)
    {
        //calculation if a "9" is before the check number
        $kindOfBankAccount = substr($iban, 12, 1);
        if (intval($kindOfBankAccount) == 9) {
            $bankAccountNumber = substr($iban, 12, strlen($iban) - 12);
            return (new self)->_isCheckNumberValidWithMethod20($bankAccountNumber);
        }

        $weighting = array(2, 4, 8, 5, 10, 9, 7, 3, 6, 1, 2, 4);

        // extract the bank code and bank account number of iban
        $bankCode = substr($iban, 4, 8);
        $bankAccountNumber = substr($iban, strlen($iban) - 9,  9);

        // extract the to use parts
        $partOfBankCode = substr($bankCode, 4, strlen($bankCode) - 4);
        $firstPartOfBankAccountNumber = substr($bankAccountNumber, 0, 1);
        $secondPartOfBankAccountNumber = substr($bankAccountNumber, 2, strlen($bankAccountNumber) - 2);

        // remove the leading "0"
        $partOfBankCode = strval(intval($partOfBankCode));
        $firstPartOfBankAccountNumber = strval(intval($firstPartOfBankAccountNumber));
        $secondPartOfBankAccountNumber = strval(intval($secondPartOfBankAccountNumber));

        $toCheckBankAccountNumber
            = $partOfBankCode . $firstPartOfBankAccountNumber . "0" . $secondPartOfBankAccountNumber;

        $temp = strval(intval($bankAccountNumber));
        $expectedCheckNumber = substr($temp, 1, 1);

        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod52($toCheckBankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '54'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod54($bankAccountNumber)
    {
        $firstTwoNumbers = substr($bankAccountNumber, 0, 2);
        if ($firstTwoNumbers != "49") {
            return false;
        }

        $weighting = array(2, 3, 4, 5, 6, 7, 2, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod54($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '55'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod55($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 7, 8);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }



    /**
     * Checks the check number of bank account number with method '56'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod56($bankAccountNumber)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 60 is like 00
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod56($bankAccountNumber, $weighting);

        // replace the calculated check number
        if ($firstNumber == "9") {
            if ($calculatedCheckNumber == "10") {
                $calculatedCheckNumber = "7";
            }

            if ($calculatedCheckNumber == "11") {
                $calculatedCheckNumber = "8";
            }
        } else {
            if ($calculatedCheckNumber == "10" || $calculatedCheckNumber == "11") {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '57'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod57($bankAccountNumber)
    {
        $begin = substr($bankAccountNumber, 0, 2);

        switch ($begin)
        {
        case "00":
            return false;
        case "51":
        case "55":
        case "61":
        case "64":
        case "65":
        case "66":
        case "70":
        case "73":
        case "74":
        case "75":
        case "76":
        case "77":
        case "78":
        case "79":
        case "80":
        case "81":
        case "82":
        case "88":
        case "94":
        case "95":
            // first method (00)
            $firstSixNumbers = substr($bankAccountNumber, 0, 6);

            // if the first 6 numbers are 777777 or 888888 the check number is valid
            if (in_array($firstSixNumbers, array("777777", "888888"))) {
                return true;
            }

            $weighting = array(1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);

        case "32":
        case "33":
        case "34":
        case "35":
        case "36":
        case "37":
        case "38":
        case "39":
        case "41":
        case "52":
        case "53":
        case "54":
        case "56":
        case "57":
        case "58":
        case "59":
        case "60":
        case "62":
        case "63":
        case "67":
        case "68":
        case "69":
        case "71":
        case "72":
        case "83":
        case "84":
        case "85":
        case "86":
        case "87":
        case "89":
        case "90":
        case "92":
        case "93":
        case "96":
        case "97":
        case "98":
            // second method (00)
            $weighting = array(1, 2, 1, 2, 1, 2, 1, 0, 2, 1, 2);
            $expectedCheckNumber = substr($bankAccountNumber, 2, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, false);

            return ($expectedCheckNumber == $calculatedCheckNumber);

        case "40":
        case "50":
        case "91":
        case "99":
            // third method (09)
            return true;

        case "01":
        case "02":
        case "03":
        case "04":
        case "05":
        case "06":
        case "07":
        case "08":
        case "09":
        case "10":
        case "11":
        case "12":
        case "13":
        case "14":
        case "15":
        case "16":
        case "17":
        case "18":
        case "19":
        case "20":
        case "21":
        case "22":
        case "23":
        case "24":
        case "25":
        case "26":
        case "27":
        case "28":
        case "29":
        case "30":
        case "31":
            // fourth method

            $thirdAndFourthNumber = substr($bankAccountNumber, 2, 2);
            $seventhEighthNinthNumber = substr($bankAccountNumber, 6, 3);

            if ($bankAccountNumber == "0185125434") {
                return true;
            }

            if (intval($thirdAndFourthNumber) >= 1 && intval($thirdAndFourthNumber) <= 12) {
                if (intval($seventhEighthNinthNumber) < 500) {
                    return true;
                }
            }

            return false;
        default :
            return false;
        }
    }

    /**
     * Checks the check number of bank account number with method '58'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod58($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '58'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod59($bankAccountNumber)
    {
        $begin = substr($bankAccountNumber, 0, 2);

        if ($begin == "00") {
            return true;
        }

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '60'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod60($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 60 is like 00
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '61'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod61($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod61($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '62'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod62($bankAccountNumber)
    {
        $weighting = array(0, 0, 2, 1, 2, 1, 2, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '63'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod63($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1);

        $begin = substr($bankAccountNumber, 0, 3);

        $expectedCheckNumber = -1;
        if ($begin != "000") {
            $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        } else {
            $expectedCheckNumber = substr($bankAccountNumber, 9, 1);
        }

        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod63($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '64'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod64($bankAccountNumber)
    {
        $weighting = array(9, 10, 5, 8, 4, 2, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, 6, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod64($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '65'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod65($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 8, 1);

        if ($kindOfBankAccount == "9") {
            $weighting = array(2, 1, 0, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, false);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            $weighting = array(0, 0, 0, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, false);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method '66'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod66($bankAccountNumber)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);

        if ($firstNumber != "0") {
            return false;
        }

        $secondNumber = substr($bankAccountNumber, 1, 1);

        if ($secondNumber == "9") {
            return true;
        }

        $weighting = array(2, 3, 4, 5, 6, 0, 0, 7, 0);
        $expectedCheckNumber = substr($bankAccountNumber, -1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod66($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '67'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod67($bankAccountNumber)
    {
        $weighting = array(0, 0, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '68'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod68($bankAccountNumber)
    {
        switch (strlen($bankAccountNumber))
        {
        case 6:
        case 7:
        case 8:
        case 9:
            // calculation for a length of 6, 7, 8 or 9
            // return true if the bank account number has no check number
            if (intval($bankAccountNumber) >= 400000000 && intval($bankAccountNumber) <= 499999999) {
                return true;
            }

            // first method (00)
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);
            $expectedCheckNumber = substr($bankAccountNumber, -1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            //return true if the check number is valid after the first method
            if ($isCheckNumberValid) {
                return true;
            }

            //second method (00)
            $weighting = array(2, 1, 2, 1, 2, 0, 0, 1, 2);
            $expectedCheckNumber = substr($bankAccountNumber, -1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);

        case 10:
            //calculation if the bank account has a length of 10
            //only method 00
            $weighting = array(2, 1, 2, 1, 2, 1, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, 9, 1);

            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);
            return ($expectedCheckNumber == $calculatedCheckNumber);

        default:
            // if the bank account number has the wrong length
            return false;
        }
    }

    /**
     * Checks the check number of bank account number with method '69'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod69($bankAccountNumber)
    {
        if (intval($bankAccountNumber) >=  9300000000 && intval($bankAccountNumber) <= 9399999999) {
            return true;
        }

        if (intval($bankAccountNumber) <= 9700000000 || intval($bankAccountNumber) >= 9799999999) {
            // first method
            $weighting = array(2, 3, 4, 5, 6, 7, 8);
            $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod28($bankAccountNumber, $weighting);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            // return true it the check number is valid after the first method
            if ($isCheckNumberValid) {
                return true;
            }
        }

        // second method
        $transformationsRows = "143214321";

        $transformationsRow1 = str_split("0159374826");
        $transformationsRow2 = str_split("0176983254");
        $transformationsRow3 = str_split("0184629573");
        $transformationsRow4 = str_split("0123456789");

        $transformationsTable = array (
            "1" => $transformationsRow1, "2" => $transformationsRow2,
            "3" => $transformationsRow3, "4" => $transformationsRow4
        );

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethodM10H(
            $bankAccountNumber, $transformationsTable, $transformationsRows
        );

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '70'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod70($bankAccountNumber)
    {
        $fourthNumber = substr($bankAccountNumber, 3, 1);
        $fourthAndFifthNumber = substr($bankAccountNumber, 3, 2);

        if ($fourthNumber == "5" || $fourthAndFifthNumber == "69") {
            $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method '71'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod71($bankAccountNumber)
    {
        $weighting = array(6, 5, 4, 3, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod71($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '72'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod72($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '73'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod73($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            return (new self)->_isCheckNumberValidWithMethod51($bankAccountNumber);
        }

        //first normal method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, -1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (00)
        $weighting = array(2, 1, 2, 1, 2, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, -1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        $weighting = array(2, 1, 2, 1, 2, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, -1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00Modulo7($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '74'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod74($bankAccountNumber)
    {
        //first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, -1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);
        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // if the bank account number begins with "0000" it must be checked with the method 00 with modulo 5
        $begin = substr($bankAccountNumber, 0, 4);
        if ($begin == "0000") {
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);
            $expectedCheckNumber = substr($bankAccountNumber, -1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00Modulo5($bankAccountNumber, $weighting);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            // return true if the check number is valid after this method
            if ($isCheckNumberValid) {
                return true;
            }
        }

        // second method (04)
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 04 is like 02
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '75'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod75($bankAccountNumber)
    {
        //remove beginning 0
        $bankAccountNumber = strval(intval($bankAccountNumber));

        switch (strlen($bankAccountNumber))
        {
        case 6:
            $weighting = array(2, 1, 2, 1, 2);
            $expectedCheckNumber = substr($bankAccountNumber, -1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        case 7:
            $weighting = array(2, 1, 2, 1, 2, 0);
            $expectedCheckNumber = substr($bankAccountNumber, -1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        case 9:
            $firstNumber = substr($bankAccountNumber, 0, 1);

            if ($firstNumber == "9") {
                $weighting = array(0, 0, 0, 2, 1, 2, 1, 2, 0);
                $expectedCheckNumber = substr($bankAccountNumber, 6, 1);
                $calculatedCheckNumber
                    = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, false);

                return ($expectedCheckNumber == $calculatedCheckNumber);
            } else {
                $weighting = array(0, 0, 0, 0, 2, 1, 2, 1, 2, 0);
                $expectedCheckNumber = substr($bankAccountNumber, 5, 1);
                $calculatedCheckNumber
                    = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, false);

                return ($expectedCheckNumber == $calculatedCheckNumber);
            }
        case 10:
            $weighting = array(0, 0, 0, 0, 2, 1, 2, 1, 2, 0);
            $expectedCheckNumber = substr(5, 1);
            $calculatedCheckNumber
                = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, false);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method '76'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod76($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9);
        $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod76($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '77'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod77($bankAccountNumber)
    {
        // first method
        $weighting = array(1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 0);

        // turn around the bank account number
        $bankAccountNumberReverse = strrev($bankAccountNumber);

        // split the bank account number
        $bankAccountNumberReverseSplitted = str_split($bankAccountNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        // if the rest is 0 the bank account number is valid
        if ($rest == 0) {
            return true;
        }

        // second method
        $weighting = array(5, 4, 3, 4, 5, 0, 0, 0, 0, 0, 0);

        // turn around the bank account number
        $bankAccountNumberReverse = strrev($bankAccountNumber);

        // split the bank account number
        $bankAccountNumberReverseSplitted = str_split($bankAccountNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        // if the rest is 0 the bank account number is valid
        if ($rest == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks the check number of bank account number with method '78'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod78($bankAccountNumber)
    {
        $begin = substr($bankAccountNumber, 0, 2);
        if ($begin == "00") {
            return true;
        }

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '79'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod79($bankAccountNumber)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);

        switch ($firstNumber)
        {
        case 3:
        case 4:
        case 5:
        case 6:
        case 7:
        case 8:
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        case 9:
        case 1:
        case 2:
            $weighting = array(0, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 2, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        case 0:
            return false;
        }
    }

    /**
     * Checks the check number of bank account number with method '80'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod80($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            return (new self)->_isCheckNumberValidWithMethod51($bankAccountNumber);
        }

        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 2, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($calculatedCheckNumber == $expectedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (00)
        $weighting = array(2, 1, 2, 1, 2, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 2, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00Modulo7($bankAccountNumber, $weighting);

        return ($calculatedCheckNumber == $expectedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '81'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod81($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            return (new self)->_isCheckNumberValidWithMethod51($bankAccountNumber);
        }

        // method 32
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod32($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '82'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod82($bankAccountNumber)
    {
        $thirdAndFourthNumber = substr($bankAccountNumber, 2, 2);

        if ($thirdAndFourthNumber == "99") {
            // second method (10)
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            //the calculation of 10 is like 06
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            // first method (33)
            $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            //the calculation of 33 is like 06
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method '83'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod83($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 2);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == "99") {
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }

        // first method (32)
        $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod32($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid
        if ($isCheckNumberValid) {
            return true;
        }
        
        // second method (33)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 33 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (33 % 7)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 33 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '84'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod84($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            return (new self)->_isCheckNumberValidWithMethod51($bankAccountNumber);
        }

        // first method (06)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (06)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method
        $weighting = array(2, 1, 2, 1, 2, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber
            = $this->_calculateCheckNumberWithMethod06WithMod10($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '85'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod85($bankAccountNumber)
    {
        // calculation if the third and fourth number are 99
        $thirdAndFourthNumber = substr($bankAccountNumber, 2, 2);
        if ($thirdAndFourthNumber == "99") {
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

            // if calculatedCheckNumber is false it is not possible to calculate a check number
            if (is_bool($calculatedCheckNumber)) {
                if (!$calculatedCheckNumber) {
                    return false;
                }
            }

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }

        // first method (06)
        $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (33)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 33 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check nuber is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //third method (33 mod 7)
        $lastNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);

        // if the last number is a 7, 8, 9 are invalid
        if (in_array($lastNumber, array("7", "8", "9"))) {
            return false;
        }

        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 33 is like 06
        $calculatedCheckNumber
            = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '86'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod86($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            return (new self)->_isCheckNumberValidWithMethod51($bankAccountNumber);
        }

        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (32)
        $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod32($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '87'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod87($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            return (new self)->_isCheckNumberValidWithMethod51($bankAccountNumber);
        }

        // first method
        $tab1 = array(0 => 0, 1 => 4, 2 => 3, 3 => 2, 4 => 6);
        $tab2 = array(0 => 7, 1 => 1, 2 => 5, 3 => 9, 4 => 8);

        $bankAccountNumber2 = str_split($bankAccountNumber);

        $i = 3;
        do {
            $i++;
        } while ($bankAccountNumber2[$i] == 0);

        $c2 = ($i - 1) % 2;
        $d2 = 0;
        $a5 = 0;

        do {
            // modify bank account number
            switch($bankAccountNumber2[$i])
            {
            case 0:
                $bankAccountNumber2[$i] = 5;
                break;

            case 1:
                $bankAccountNumber2[$i] = 6;
                break;

            case 5:
                $bankAccountNumber2[$i] = 10;
                break;

            case 6:
                $bankAccountNumber2[$i] = 1;
                break;
            }

            // calculate the a5
            if ($c2 == $d2) {
                if ($bankAccountNumber2[$i] > 5) {
                    if ($c2 == 0 && $d2 == 0) {
                        $c2 = 1;
                        $d2 = 1;
                        $a5 = $a5 + 6 - ($bankAccountNumber2[$i] - 6);
                    } else {
                        $c2 = 0;
                        $d2 = 0;
                        $a5 = $a5 + $bankAccountNumber2[$i];
                    }
                } else {
                    if ($c2 == 0 && $d2 == 0) {
                        $c2 = 1;
                        $a5 = $a5 + $bankAccountNumber2[$i];
                    } else {
                        $c2 = 0;
                        $a5 = $a5 + $bankAccountNumber2[$i];
                    }
                }
            } else {
                if ($bankAccountNumber2[$i] > 5) {
                    if ($c2 == 0) {
                        $c2 = 1;
                        $d2 = 0;
                        $a5 = $a5 - 6 + ($bankAccountNumber2[$i] - 6);
                    } else {
                        $c2 = 0;
                        $d2 = 1;
                        $a5 = $a5 - $bankAccountNumber2[$i];
                    }
                } else {
                    if ($c2 == 0) {
                        $c2 = 1;
                        $a5 = $a5 - $bankAccountNumber2[$i];
                    } else {
                        $c2 = 0;
                        $a5 = $a5 - $bankAccountNumber2[$i];
                    }
                }
            }

            $i++;

        } while ($i < 9);

        // // convert every digits to a int
        foreach ($bankAccountNumber2 as &$value) {
            $value = intval($value);
        }

        // modify a5
        do {
            if ($a5 > 4) {
                $a5 = $a5 - 5;
            } else {
                $a5 = $a5 + 5;
            }
        } while ($a5 < 0 || $a5 > 4);

        $checkNumber = 0;
        if ($d2 == 0) {
            $checkNumber = $tab1[$a5];
        } else {
            $checkNumber = $tab2[$a5];
        }

        if ($checkNumber == $bankAccountNumber2[9]) {
            // return true if the check number is valid after the first method
            return true;
        } else {
            if ($bankAccountNumber2[3] == 0) {
                if ($checkNumber > 4) {
                    $checkNumber = $checkNumber - 5;
                } else {
                    $checkNumber = $checkNumber + 5;
                }

                if ($checkNumber == $bankAccountNumber2[9]) {
                    // return true if the check number is valid after the first method
                    return true;
                }
            }
        }

        // second method (33)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 33 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (06 % 7)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the third method
        if ($isCheckNumberValid) {
            return true;
        }

        // fourth method (06)
        $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '88'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod88($bankAccountNumber)
    {
        $weighting = array(2, 3, 4, 5, 6, 7, 8);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod88($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '89'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod89($bankAccountNumber)
    {
        switch (strlen(strval(intval($bankAccountNumber))))
        {
        case 8:
        case 9:
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            //the calculation of 10 is like 06
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        case 7:
            $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod17Version2($bankAccountNumber, $weighting);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        default:
            return false;
        }
    }

    /**
     * Checks the check number of bank account number with method '90'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod90($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }

        // first method (06)
        $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (06)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (06 % 7)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the third method
        if ($isCheckNumberValid && !in_array($expectedCheckNumber, array("7", "8", "9"))) {
            return true;
        }

        // fourth method (06 % 9)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06WithMod9($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the fourth method
        if ($isCheckNumberValid) {
            return true;
        }

        // fifth method (06 % 10)
        $weighting = array(2, 1, 2, 1, 2, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber
            = $this->_calculateCheckNumberWithMethod06WithMod10($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the fifth method
        if ($isCheckNumberValid) {
            return true;
        }

        // sixth method (06 % 7)
        $weighting = array(2, 1, 2, 1, 2, 1, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '91'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod91($bankAccountNumber)
    {
        // first method (06)
        $weighting = array(0, 0, 0, 0, 2, 3, 4, 5, 6, 7, 8);
        $expectedCheckNumber = substr($bankAccountNumber, 6, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        //return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (06)
        $weighting = array(0, 0, 0, 0, 7, 6, 5, 4, 3, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, 6, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        //return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        //third method (06)
        $weighting = array(2, 3, 4, 0, 5, 6, 7, 8, 9, 10);
        $expectedCheckNumber = substr($bankAccountNumber, 6, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        //return true if the check number is valid after the third method
        if ($isCheckNumberValid) {
            return true;
        }

        //fourth method (06)
        $weighting = array(0, 0, 0, 0, 2, 4, 8, 5, 10, 9);
        $expectedCheckNumber = substr($bankAccountNumber, 6, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '92'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod92($bankAccountNumber)
    {
        $weighting = array(3, 7, 1, 3, 7, 1, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '93'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod93($bankAccountNumber)
    {
        // first method (06)
        $begin = substr($bankAccountNumber, 0, 4);

        if ($begin == "0000") {
            $weighting = array(0, 2, 3, 4, 5, 6, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            // return true if the check number is valid after the first method
            if ($isCheckNumberValid) {
                return true;
            }
        } else {
            $weighting = array(0, 0, 0, 0, 0, 2, 3, 4, 5, 6);
            $expectedCheckNumber = substr($bankAccountNumber, 5, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, false);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            // return true if the check number is valid after the first method
            if ($isCheckNumberValid) {
                return true;
            }
        }

        // second method
        if ($begin == "0000") {
            $weighting = array(0, 2, 3, 4, 5, 6, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber
                = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, false);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            $weighting = array(0, 0, 0, 0, 0, 2, 3, 4, 5, 6);
            $expectedCheckNumber = substr($bankAccountNumber, 5, 1);
            $calculatedCheckNumber
                = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, false);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method '94'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod94($bankAccountNumber)
    {
        $weighting = array(1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '95'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod95($bankAccountNumber)
    {
        // return true if the bank account number has no check number
        if ((intval($bankAccountNumber) >= 1 && intval($bankAccountNumber) <= 1999999)
            || (intval($bankAccountNumber) >= 9000000 && intval($bankAccountNumber) <= 25999999)
            || (intval($bankAccountNumber) >= 396000000 && intval($bankAccountNumber) <= 499999999)
            || (intval($bankAccountNumber) >= 700000000 && intval($bankAccountNumber) <= 799999999)
            || (intval($bankAccountNumber) >= 910000000 && intval($bankAccountNumber) <= 989999999)
        ) {
            return true;
        }

        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '96'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod96($bankAccountNumber)
    {
        //first method (19)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 19 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        //return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        if ($isCheckNumberValid) {
            return true;
        }

        // return true if the bank account number has no check number
        if ((intval($bankAccountNumber) > 1300000 && intval($bankAccountNumber) < 99399999)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks the check number of bank account number with method '97'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod97($bankAccountNumber)
    {
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod97($bankAccountNumber);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '99'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod98($bankAccountNumber)
    {
        // first method (01)
        $weighting = array(3, 1, 7, 3, 1, 7, 3, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (32)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod32($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method '99'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethod99($bankAccountNumber)
    {
        // return true if the bank account number has no check number
        if ((intval($bankAccountNumber) > 396000000 && intval($bankAccountNumber) < 499999999)) {
            return true;
        }

        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'A1'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA1($bankAccountNumber)
    {
        switch (strlen(strval(intval($bankAccountNumber))))
        {
        case 8:
        case 10:
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);
            return ($expectedCheckNumber == $calculatedCheckNumber);

        default:
            return false;
        }
    }

    /**
     * Checks the check number of bank account number with method 'A2'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA2($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (04)
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 04 is like 02
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'A3'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA3($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (10)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 10 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'A4'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA4($bankAccountNumber)
    {
        $thirdAndFourthNumber = substr($bankAccountNumber, 2, 2);

        if ($thirdAndFourthNumber != "99") {
            // first method (06)
            $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            // return true if the check number is valid after the first method
            if ($isCheckNumberValid) {
                return true;
            }

            // second method (06 % 7)
            $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber
                = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            // return true if the check number is valid after the second method
            if ($isCheckNumberValid) {
                return true;
            }
        }

        // third method (06)
        $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the third method
        if ($isCheckNumberValid) {
            return true;
        }

        // fourth method (93)
        return (new self)->_isCheckNumberValidWithMethod93($bankAccountNumber);
    }

    /**
     * Checks the check number of bank account number with method 'A5'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA5($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // return false if the check number is invalid after the first method
        // and the bank account number begins with "9"
        $begin = substr($bankAccountNumber, 0, 1);
        if (!$isCheckNumberValid && $begin == "9") {
            return false;
        }

        //second method (10)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 10 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'A6'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA6($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 1, 1);
        if ($kindOfBankAccount == "8") {
            // first method (00)
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            // second method (01)
            $weighting = array(3, 7, 1, 3, 7, 1, 3, 7, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'A7'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA7($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (03)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 03 is like 01
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'A8'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA8($bankAccountNumber)
    {
        $kindOfBankAccount = substr($bankAccountNumber, 2, 1);
        // calculation method 51 if it is a "Sachkonten" (9)
        if (intval($kindOfBankAccount) == 9) {
            return (new self)->_isCheckNumberValidWithMethod51($bankAccountNumber);
        }

        // first method (06)
        $weighting = array(2, 3, 4, 5, 6, 7, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 0, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'A9'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodA9($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(3, 7, 1, 3, 7, 1, 3, 7, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (06)
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'B0'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB0($bankAccountNumber)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);

        if (in_array($firstNumber, array("0", "8"))) {
            return false;
        }

        $eighthNumber = substr($bankAccountNumber, 7, 1);

        if (in_array($eighthNumber, array("1", "2", "3", "6"))) {
            // first method (09)
            return true;
        } else {
            // second method (06)
            $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'B1'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB1($bankAccountNumber)
    {
        //first method (05)
        $weighting = array(7, 3, 1, 7, 3, 1, 7, 3, 1, 7);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 05 is like 01
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (01)
        $weighting = array(3, 7, 1, 3, 7, 1, 3, 7, 1, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        if ($isCheckNumberValid) {
            return true;
        }

        //third method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'B2'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB2($bankAccountNumber)
    {
        $firstCharOfBankAccountNumber = substr($bankAccountNumber, 0, 1);

        if (in_array($firstCharOfBankAccountNumber, array("8", "9"))) {
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 2, 3);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

            // if calculatedCheckNumber is false it is not possible to calculate a check number
            if (is_bool($calculatedCheckNumber)) {
                if (!$calculatedCheckNumber) {
                    return false;
                }
            }
            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'B3'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB3($bankAccountNumber)
    {
        $firstCharOfBankAccountNumber = substr($bankAccountNumber, 0, 1);

        if ($firstCharOfBankAccountNumber == "9") {

            $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {

            $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod32($bankAccountNumber, $weighting);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'B4'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB4($bankAccountNumber)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);

        if ($firstNumber == "9") {
            // first method (00)
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);

        } else {
            // second method (02)
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

            // if calculatedCheckNumber is false it is not possible to calculate a check number
            if (is_bool($calculatedCheckNumber)) {
                if (!$calculatedCheckNumber) {
                    return false;
                }
            }

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'B5'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB5($bankAccountNumber)
    {
        // first method (01)
        $weighting = array(7, 3, 1 ,7 , 3, 1, 7, 3, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        $firstNumber = substr($bankAccountNumber, 0, 1);
        // if the first number is a 8 or 9 it is invalid
        if (in_array($firstNumber, array("8","9"))) {
            return false;
        }

        // second method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'B6'
     *
     * @param $bankAccountNumber String bank account number to check
     * @param $iban              String the full iban
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB6($bankAccountNumber, $iban)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);
        $firstFiveNumber = substr($bankAccountNumber, 0, 5);

        if (in_array($firstNumber, array("1", "2", "3", "4", "5", "6", "7", "8", "9"))
            || (intval($firstFiveNumber) >= 2691 && intval($firstFiveNumber) <= 2699)
        ) {
            // first method (20)
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 3);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            //the calculation of 20 is like 06
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            return (new self)->_isCheckNumberValidWithMethod53($iban);
        }
    }

    /**
     * Checks the check number of bank account number with method 'B7'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB7($bankAccountNumber)
    {
        if ((intval($bankAccountNumber) >= 1000000 && intval($bankAccountNumber) <= 5999999)
            || (intval($bankAccountNumber) >= 700000000 && intval($bankAccountNumber) <= 899999999)
        ) {
            //method 01
            return (new self)->_isCheckNumberValidWithMethod01($bankAccountNumber);
        } else {
            // has no check number
            return true;
        }
    }

    /**
     * Checks the check number of bank account number with method 'B8'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB8($bankAccountNumber)
    {
        // first method (20)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 20 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (29)
        $isCheckNumberValid = (new self)->_isCheckNumberValidWithMethod29($bankAccountNumber);

        // return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (09)
        if ((intval($bankAccountNumber) >= 5100000000 && intval($bankAccountNumber) <= 5999999999)
            || (intval($bankAccountNumber) >= 9010000000 && intval($bankAccountNumber) <= 9109999999)
        ) {
            return true;
        }
    }

    /**
     * Checks the check number of bank account number with method 'B9'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodB9($bankAccountNumber)
    {
        $firstTwoNumbers = substr($bankAccountNumber, 0, 2);
        $firstThreeNumbers = substr($bankAccountNumber, 0, 3);

        if ($firstThreeNumbers == "000") {
            // second method
            $weighting = array(1, 2, 3, 4, 5, 6, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod35($bankAccountNumber, $weighting);

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            // return true if the check number is valid
            if ($isCheckNumberValid) {
                return true;
            }

            $calculatedCheckNumber = $calculatedCheckNumber + 5;

            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

            // return true if the check number is valid
            if ($isCheckNumberValid) {
                return true;
            }

            if ($calculatedCheckNumber >= 10) {
                $calculatedCheckNumber = $calculatedCheckNumber - 10;
            }

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            if ($firstTwoNumbers == "00") {
                // first method
                $weighting = array(1, 3, 2, 1, 3, 2, 1, 0, 0, 0);
                $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
                $calculatedCheckNumber = $this->_calculateCheckNumberWithMethodB9($bankAccountNumber, $weighting);

                $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

                // return true if the check number is valid
                if ($isCheckNumberValid) {
                    return true;
                }

                $calculatedCheckNumber = $calculatedCheckNumber + 5;

                $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

                // return true if the check number is valid
                if ($isCheckNumberValid) {
                    return true;
                }

                if ($calculatedCheckNumber >= 10) {
                    $calculatedCheckNumber = $calculatedCheckNumber - 10;
                }

                return ($expectedCheckNumber == $calculatedCheckNumber);
            }
        }

        return false;
    }

    /**
     * Checks the check number of bank account number with method 'C0'
     *
     * @param $bankAccountNumber String bank account number to check
     * @param $iban              String the full iban
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC0($bankAccountNumber, $iban)
    {
        // first method (52)
        if (strlen($bankAccountNumber) < 10) {
            $offSet = 10 - strlen($bankAccountNumber);
            $begin = "";
            for ($i = 0; $i < $offSet; $i++) {
                $begin .= "0";
            }

            $bankAccountNumber = $begin . $bankAccountNumber;
        }

        $firstTwoChars = substr($bankAccountNumber, 0, 2);
        $firstThreeChars = substr($bankAccountNumber, 0, 3);

        if ($firstTwoChars == "00" && $firstThreeChars != "000") {
            $isCheckNumberValid = (new self)->_isCheckNumberValidWithMethod52($iban);
            // return true if the check number is valid after the first method
            if ($isCheckNumberValid) {
                return true;
            }
        }

        //second method (06)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'C1'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC1($bankAccountNumber)
    {
        $begin = substr($bankAccountNumber, 0, 1);
        if ($begin == "5") {
            // first method
            $weighting = array(1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod17Version2($bankAccountNumber, $weighting);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            // second method (17)
            $weighting = array(2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 3, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod17Version1($bankAccountNumber, $weighting);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'C2'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC2($bankAccountNumber)
    {
        //first method (22)
        $weighting = array(3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod22($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        //return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //third method (04)
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 04 is like 02
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'C3'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC3($bankAccountNumber)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);

        if ($firstNumber == "9") {
            //method 58
            $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            //method 58 is like 02
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

            // if calculatedCheckNumber is false it is not possible to calculate a check number
            if (is_bool($calculatedCheckNumber)) {
                if (!$calculatedCheckNumber) {
                    return false;
                }
            }

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            // methode 00
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'C4'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC4($bankAccountNumber)
    {
        $firstNumber = substr($bankAccountNumber, 0, 1);

        if ($firstNumber == "9") {
            // second method (58)
            $weighting = array(2, 3, 4, 5, 6, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            // method 58 is like 02
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

            // if calculatedCheckNumber is false it is not possible to calculate a check number
            if (is_bool($calculatedCheckNumber)) {
                if (!$calculatedCheckNumber) {
                    return false;
                }
            }

            return ($expectedCheckNumber == $calculatedCheckNumber);
        } else {
            // first method (15)
            $weighting = array(2, 3, 4, 5, 0, 0, 0, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'C5'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC5($bankAccountNumber)
    {
        // first methode (75) 5 numbers
        if (intval($bankAccountNumber) >= 100000 && intval($bankAccountNumber) <= 899999) {
            return (new self)->_isCheckNumberValidWithMethod75($bankAccountNumber);
        }

        // first method (75) 9 numbers
        if (intval($bankAccountNumber) >= 100000000 && intval($bankAccountNumber) <= 899999999) {
            return (new self)->_isCheckNumberValidWithMethod75($bankAccountNumber);
        }

        // second method (29)
        if ((intval($bankAccountNumber) >= 1000000000 && intval($bankAccountNumber) <= 1999999999)
            || (intval($bankAccountNumber) >= 4000000000 && intval($bankAccountNumber) <= 6999999999)
            || (intval($bankAccountNumber) >= 9000000000 && intval($bankAccountNumber) <= 9999999999)
        ) {
            return (new self)->_isCheckNumberValidWithMethod29($bankAccountNumber);
        }

        // third method (00) 10 numbers
        if (intval($bankAccountNumber) >= 3000000000 && intval($bankAccountNumber) <= 3999999999) {
            return (new self)->_isCheckNumberValidWithMethod00($bankAccountNumber);
        }

        // fourth method (09) 8 numbers
        if (intval($bankAccountNumber) >= 30000000 && intval($bankAccountNumber) <= 59999999) {
            return true;
        }

        // fourth method (09) 10 numbers
        if (intval($bankAccountNumber) >= 7000000000 && intval($bankAccountNumber) <= 7099999999
            || (intval($bankAccountNumber) >= 8500000000 && intval($bankAccountNumber) <= 8599999999)
        ) {
            return true;
        }

        return false;
    }

    /**
     * Checks the check number of bank account number with method 'C6'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC6($bankAccountNumber)
    {
        // replace first number of bank account number
        $firstNumber = substr($bankAccountNumber, 0, 1);
        $constant = 0;
        switch (intval($firstNumber))
        {
        case 0;
            $constant = 4451970;
            break;

        case 1;
            $constant = 4451981;
            break;

        case 2;
            $constant = 4451992;
            break;

        case 3;
            $constant = 4451993;
            break;

        case 4;
            $constant = 4344992;
            break;

        case 5;
            $constant = 4344990;
            break;

        case 6;
            $constant = 4344991;
            break;

        case 7;
            $constant = 5499570;
            break;

        case 8;
            $constant = 4451994;
            break;

        case 9;
            $constant = 5499579;
            break;
        }
        $bankAccountNumber = $constant . substr($bankAccountNumber, 1, strlen($bankAccountNumber) -1);

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'C7'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC7($bankAccountNumber)
    {
        // first method (63)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);

        $begin = substr($bankAccountNumber, 0, 3);
        $expectedCheckNumber = -1;
        if ($begin != "000") {
            $expectedCheckNumber = substr($bankAccountNumber, 7, 1);
        } else {
            $expectedCheckNumber = substr($bankAccountNumber, 9, 1);
        }

        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod63($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
                return true;
        }

        //second method (06)
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'C8'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC8($bankAccountNumber)
    {
        //first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (04)
        $weighting = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 04 is like 02
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (07)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 07 is like 02
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'C9'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodC9($bankAccountNumber)
    {
        //first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method ()
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 07 is like 02
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'D0'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD0($bankAccountNumber)
    {
        $firstTwoNumbers = substr($bankAccountNumber, 0, 2);

        if ($firstTwoNumbers == "57") {
            // second method (09)
            if (intval($bankAccountNumber) >= 5700000000 && intval($bankAccountNumber) <= 5799999999) {
                return true;
            } else {
                return false;
            }

        } else {
            // first method (20)
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 3);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            //the calculation of 20 is like 06
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }
    }

    /**
     * Checks the check number of bank account number with method 'D1'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD1($bankAccountNumber)
    {
        // replace first number of bank account number
        $firstNumber = substr($bankAccountNumber, 0, 1);
        $constant = 0;
        switch (intval($firstNumber))
        {
        case 0;
            $constant = 4363380;
            break;

        case 1;
            $constant = 4363381;
            break;

        case 2;
            $constant = 4363382;
            break;

        case 3;
            $constant = 4363383;
            break;

        case 4;
            $constant = 4363384;
            break;

        case 5;
            $constant = 4363385;
            break;

        case 6;
            $constant = 4363386;
            break;

        case 7;
            $constant = 4363387;
            break;

        case 8;
            // if the bank account number starts with 8 it is invalid
            return false;

        case 9;
            $constant = 4363389;
            break;
        }
        $bankAccountNumber = $constant . substr($bankAccountNumber, 1, strlen($bankAccountNumber) -1);

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'D2'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD2($bankAccountNumber)
    {
        // first method (95)
        $isCheckNumberValid = (new self)->_isCheckNumberValidWithMethod95($bankAccountNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (68)
        return (new self)->_isCheckNumberValidWithMethod68($bankAccountNumber);
    }

    /**
     * Checks the check number of bank account number with method 'D3'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD3($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (27)
        return (new self)->_isCheckNumberValidWithMethod27($bankAccountNumber);
    }

    /**
     * Checks the check number of bank account number with method 'D4'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD4($bankAccountNumber)
    {
        // if the first number is 0 the bank account number is invalid
        $firstNumber = substr($bankAccountNumber, 0, 1);
        if ($firstNumber == "0") {
            return false;
        }

        $bankAccountNumber = "428259" . $bankAccountNumber;

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'D5'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD5($bankAccountNumber)
    {
        $ThirdAndFourthNumber = substr($bankAccountNumber, 2, 2);

        if ($ThirdAndFourthNumber == "99") {
            // first method (06)
            $weighting = array(2, 3, 4, 5, 6, 7, 8, 0, 0, 0);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }

        // second method(06)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (06 % 7)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the third method
        if ($isCheckNumberValid) {
            return true;
        }

        // fourth method (06 % 10)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 0, 0, 0);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber
            = $this->_calculateCheckNumberWithMethod06WithMod10($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'D6'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD6($bankAccountNumber)
    {
        // first method (07)
        $isCheckNumberValid = (new self)->_isCheckNumberValidWithMethod07($bankAccountNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        // second method (03)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 03 is like 01
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'D7'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD7($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethodD7($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'D8'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD8($bankAccountNumber)
    {
        if (intval($bankAccountNumber) >= 1000000000 && intval($bankAccountNumber) <= 9999999999) {
            $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
            $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
            $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

            return ($expectedCheckNumber == $calculatedCheckNumber);
        }

        if (intval($bankAccountNumber) >= 10000000 && intval($bankAccountNumber) <= 99999999) {
            return true;
        }

        return false;
    }

    /**
     * Checks the check number of bank account number with method 'D9'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodD9($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (10)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 10 is like 06
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        //return true if the check number is valid after the second method
        if ($isCheckNumberValid) {
            return true;
        }

        // third method (18)
        $weighting = array(3, 9, 7, 1, 3, 9, 7, 1, 3, 9, 7);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        //the calculation of 18 is like 01
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod01($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'E0'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodE0($bankAccountNumber)
    {
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethodE0($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'E1'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodE1($bankAccountNumber)
    {
        $weighting = array(1, 2, 3, 4, 5, 6, 11, 10, 9);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethodE1($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                return false;
            }
        }

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'E2'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodE2($bankAccountNumber)
    {
        // replace first number of bank account number
        $firstNumber = substr($bankAccountNumber, 0, 1);
        $constant = 0;
        switch (intval($firstNumber))
        {
        case 0;
            $constant = 4383200;
            break;

        case 1;
            $constant = 4383201;
            break;

        case 2;
            $constant = 4383202;
            break;

        case 3;
            $constant = 4383203;
            break;

        case 4;
            $constant = 4383204;
            break;

        case 5;
            $constant = 4383205;
            break;

        case 6;
        case 7;
        case 8;
        case 9;
            // if the bank account number starts with 6, 7, 8, 9 it is invalid
            return false;
        }
        $bankAccountNumber = $constant . substr($bankAccountNumber, 1, strlen($bankAccountNumber) -1);

        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'E3'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodE3($bankAccountNumber)
    {
        // first method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);

        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);

        // return true if the check number is valid after the first method
        if ($isCheckNumberValid) {
            return true;
        }

        //second method (21)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod21($bankAccountNumber, $weighting);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * Checks the check number of bank account number with method 'E4'
     *
     * @param $bankAccountNumber String bank account number to check
     *
     * @return boolean true if the check number is valid else false
     */
    function _isCheckNumberValidWithMethodE4($bankAccountNumber)
    {
        // first method (02)
        $weighting = array(2, 3, 4, 5, 6, 7, 8, 9, 2, 3);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod02($bankAccountNumber, $weighting);

        // if calculatedCheckNumber is false it is not possible to calculate a check number
        if (is_bool($calculatedCheckNumber)) {
            if (!$calculatedCheckNumber) {
                // nothing
            }
        } else {
            $isCheckNumberValid = ($expectedCheckNumber == $calculatedCheckNumber);
            // return true if the check number is valid after the first method
            if ($isCheckNumberValid) {
                return true;
            }
        }

        // second method (00)
        $weighting = array(2, 1, 2, 1, 2, 1, 2, 1, 2, 1);
        $expectedCheckNumber = substr($bankAccountNumber, strlen($bankAccountNumber) - 1, 1);
        $calculatedCheckNumber = $this->_calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, true);

        return ($expectedCheckNumber == $calculatedCheckNumber);
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the check sum will be calculated.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String  $bankAccountNumber to check
     * @param array   $weighting         the weighting of each letter of the bank account number
     * @param boolean $removeCheckNumber true if the last char (check number) should remove for the calculation
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod00($bankAccountNumber, $weighting, $removeCheckNumber)
    {
        $bankAccountNumberWithoutCheckNumber = $bankAccountNumber;
        // remove check number
        if ($removeCheckNumber) {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);
        }

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 10;

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        // if it is 10 the check number will be 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the check  will be calculated.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 5 and that will be the check number
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod00Modulo5($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 5;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 5
        $calculationCheckNumber = 5 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 7 and that will be the check number
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod00Modulo7($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 7;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 7
        $calculationCheckNumber = 7 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. Then all results are added up
     * 4. Then the modulo is calculated.
     * 5. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return int the check number
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod01($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 10;

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        // if it is 10 the check number will be 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. Then all results are added up
     * 4. Then the modulo is calculated.
     * 5. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if the rest of the modulo is 1 the check number has 2 digits and is invalid)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return false|int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod02($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;
        if ($rest == 0) {
            return 0;
        }

        if ($rest == 1) {
            return false;
        }

        // subtracted from 11
        $calculationCheckNumber = 11 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 2. Than turn around the bank account number
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 1 the check number 0)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String  $bankAccountNumber to check
     * @param array   $weighting         the weighting of each letter of the bank account number
     * @param boolean $removeCheckNumber true if the last char (check number) should remove for the calculation
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod06($bankAccountNumber, $weighting, $removeCheckNumber)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = "";
        if ($removeCheckNumber) {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);
        } else {
            $bankAccountNumberWithoutCheckNumber = $bankAccountNumber;
        }

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
                $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 11
        if ($rest == 1) {
            $calculationCheckNumber = 0;
        } else {
            $calculationCheckNumber = 11 - $rest;
        }

        // if it is 1 the check number is 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 2. Than turn around the bank account number
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 7 and that will be the check number
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String  $bankAccountNumber to check
     * @param array   $weighting         the weighting of each letter of the bank account number
     * @param boolean $removeCheckNumber true if the last char (check number) should remove for the calculation
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod06WithMod7($bankAccountNumber, $weighting, $removeCheckNumber)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = "";
        if ($removeCheckNumber) {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);
        } else {
            $bankAccountNumberWithoutCheckNumber = $bankAccountNumber;
        }

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 7;

        if ($rest == 0) {
            return 0;
        }

        $calculationCheckNumber = 7 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 2. Than turn around the bank account number
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 9 and that will be the check number
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String  $bankAccountNumber to check
     * @param array   $weighting         the weighting of each letter of the bank account number
     * @param boolean $removeCheckNumber true if the last char (check number) should remove for the calculation
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod06WithMod9($bankAccountNumber, $weighting, $removeCheckNumber)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = "";
        if ($removeCheckNumber) {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);
        } else {
            $bankAccountNumberWithoutCheckNumber = $bankAccountNumber;
        }

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 9;

        if ($rest == 0) {
            return 0;
        }

        $calculationCheckNumber = 9 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 2. Than turn around the bank account number
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 1 the check number 0)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String  $bankAccountNumber to check
     * @param array   $weighting         the weighting of each letter of the bank account number
     * @param boolean $removeCheckNumber true if the last char (check number) should remove for the calculation
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod06WithMod10($bankAccountNumber, $weighting, $removeCheckNumber)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = "";
        if ($removeCheckNumber) {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);
        } else {
            $bankAccountNumberWithoutCheckNumber = $bankAccountNumber;
        }

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 10;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 10
        if ($rest == 1) {
            $calculationCheckNumber = 0;
        } else {
            $calculationCheckNumber = 10 - $rest;
        }

        // if it is 1 the check number is 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 2. Than turn around the bank account number
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 10 the check number is 9)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String  $bankAccountNumber to check
     * @param array   $weighting         the weighting of each letter of the bank account number
     * @param boolean $removeCheckNumber true if the last char (check number) should remove for the calculation
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod11($bankAccountNumber, $weighting, $removeCheckNumber)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = "";
        if ($removeCheckNumber) {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);
        } else {
            $bankAccountNumberWithoutCheckNumber = $bankAccountNumber;
        }

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 11
        if ($rest == 1) {
            $calculationCheckNumber = 0;
        } else {
            $calculationCheckNumber = 11 - $rest;
        }

        // if it is 10 the check number is 9
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 9;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod13($bankAccountNumber, $weighting)
    {
        // extract the ground bank account number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 1, 6);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 10;

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        // if it is 10 the check number will be 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 2. Than turn around the bank account number
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 1 the check number 0)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *    (return true if the rest is 1 and the 2 last numbers are the same)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod16($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        if ($rest == 0) {
            return 0;
        }

        $lastNumber = substr($bankAccountNumber, 9, 1);
        $penultimateNumber = substr($bankAccountNumber, 8, 1);
        //return true if the rest is 1 and the 2 last numbers are the same
        if ($rest == 1 && ($lastNumber == $penultimateNumber)) {
            return true;
        }

        // subtracted from 11
        if ($rest == 1) {
            $calculationCheckNumber = 0;
        } else {
            $calculationCheckNumber = 11 - $rest;
        }

        // if it is 1 the check number is 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the check sum will be calculated.
     * 4. Then all results are added up and subtract 1
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if the rest of the modulo is 0 the check number is 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod17Version1($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 1, -3);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum and subtract 1 if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray) -1;

        // calculate the modulo
        $rest = $sum % 11;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the check sum will be calculated.
     * 4. Then all results are added up and subtract 1
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if the rest of the modulo is 0 the check number is 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod17Version2($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum and subtract 1 if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray) -1;

        // calculate the modulo
        $rest = $sum % 11;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the check sum will be calculated.
     * 4. Then all results are added up
     * 5. Then the check sum is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod21($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the check sum
        do {
            $sum = $this->_calculateCheckSum($sum);
        } while ($sum >= 10);

        // subtracted from 10
        $calculationCheckNumber = 10 - $sum;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 only the one place are used
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod22($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the modulo if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $value % 10;
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 10;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number
     * 2. Add some beginning "0" if the bank account number starts with 3,4,5,6 or 9
     * 3. Remove the beginning "0"
     * 4. Every bank account digit will be multiplied by the weighting and added the weighting.
     * 5. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 6. Then all results are added up
     * 7. Then the modulo is calculated and that will be the check number
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod24($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        //add beginning "0"
        $begin = substr($bankAccountNumberWithoutCheckNumber, 0, 1);
        if (in_array($begin, array("3", "4", "5", "6"))) {
            $bankAccountNumberWithoutCheckNumber = "0" . substr($bankAccountNumberWithoutCheckNumber, 1);
        }

        if ($begin == "9") {
            $bankAccountNumberWithoutCheckNumber = "000" . substr($bankAccountNumberWithoutCheckNumber, 3);
        }

        // remove beginning 0
        $bankAccountNumberWithoutCheckNumber = strval(intval($bankAccountNumberWithoutCheckNumber));

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumber);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting and add the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[]
                = ($bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i]) + $weighting[$i];
        }

        // calculate the modulo if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $value % 11;
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $calculationCheckNumber = $sum % 10;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function extract the ground bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. Then all results are added up
     * 4. Then the modulo is calculated.
     * 5. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 1 the check number 0)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod28($bankAccountNumber, $weighting)
    {
        // extract the ground bank account
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, 7);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        // subtracted from 11
        if ($rest == 0) {
            $calculationCheckNumber = 0;
        } else {
            $calculationCheckNumber = 11 - $rest;
        }

        // if it is 1 the check number is 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the check sum will be calculated.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod30($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 10;

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        // if it is 10 the check number will be 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 5. Then all results are added up
     * 6. Then the modulo is calculated.
     * 7. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod31($bankAccountNumber, $weighting)
    {
        // extract the ground bank account
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $calculationCheckNumber = $sum % 11;

        // if it is 10 its invalid
        if ($calculationCheckNumber == 10) {
            return false;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function extract the ground bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. Then all results are added up
     * 4. Then the modulo is calculated.
     * 5. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 1 the check number 0)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod32($bankAccountNumber, $weighting)
    {
        // extract the ground bank account
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 3, 6);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        // subtracted from 11
        if ($rest == 0) {
            $calculationCheckNumber = 0;
        } else {
            $calculationCheckNumber = 11 - $rest;
        }

        // if it is 1 the check number is 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 5. Then all results are added up
     * 6. Then the modulo is calculated.
     * 7. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod35($bankAccountNumber, $weighting)
    {
        // extract the ground bank account
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $calculationCheckNumber = $sum % 11;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. Then all results are added up
     * 4. Then the modulo is calculated.
     * 5. ...
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod52($bankAccountNumber, $weighting)
    {
        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        // calculate the check number
        for ($i = 0; $i <= 10; $i++) {
            $temp = $rest + ($i * 10);
            $rest2 = $temp % 11;

            if ($rest2 == 10) {
                return $i;
            }
        }
        return false;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 2. Than turn around the bank account number
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if the rest after modulo is 0 or 1 the check number is invalid!!!!)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod54($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        if ($rest == 0) {
            return false;
        }

        if ($rest == 1) {
            return false;
        }

        // subtracted from 11
        $calculationCheckNumber = 11 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. Then all results are added up
     * 4. Then the modulo is calculated.
     * 5. The rest of the modulo is subtracted from 11 and that will be the check number
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return false|int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod56($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        // subtracted from 11
        $calculationCheckNumber = 11 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function extract the ground bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod61($bankAccountNumber, $weighting)
    {
        // extract the ground bank account number
        $kindOfBankAccount = substr($bankAccountNumber, -2);
        $bankAccountNumberWithoutCheckNumber = -1;
        if ($kindOfBankAccount == 8) {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, 7) + substr($bankAccountNumber, 8, 2);
        } else {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, 7);
        }

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 10;

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        // if it is 10 the check number will be 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. If the first char is not "0" it is invalid
     * 2. This function extract the ground bank account number and turn it around.
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 5. Then all results are added up
     * 6. Then the modulo is calculated.
     * 7. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod63($bankAccountNumber, $weighting)
    {
        // if the first char is not '0' than its invalid
        $firstChar = substr($bankAccountNumber, 0, 1);
        if ($firstChar != 0) {
            return false;
        }

        // extract the ground bank account number
        $begin = substr($bankAccountNumber, 0, 3);
        $bankAccountNumberWithoutCheckNumber = -1;
        if ($begin != "000") {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 1, 6);
        } else {
            $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 3, 6);
        }

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 10;

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        // if it is 10 the check number will be 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 1 the check number 0)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod64($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumber);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        if ($rest == 0) {
            return 0;
        }

        // subtracted from 11
        if ($rest == 1) {
            $calculationCheckNumber = 0;
        } else {
            $calculationCheckNumber = 11 - $rest;
        }

        // if it is 1 the check number is 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number if needed
     * 2. Than turn around the bank account number
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. Then all results are added up
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 1 the check number 0)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod66($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        if ($rest == 0) {
            return 1;
        }

        if ($rest == 1) {
            return 0;
        }

        // subtracted from 11
        $calculationCheckNumber = 11 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. Then all results are added up
     * 4. Then the modulo is calculated.
     * 5. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if the rest of the modulo is 1 the check number has 2 digits and is invalid)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return false|int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod71($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 1, -3);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumber);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;
        if ($rest == 0) {
            return 0;
        }

        if ($rest == 1) {
            return 1;
        }

        // subtracted from 11
        $calculationCheckNumber = 11 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * 1. If the kind of bank account is not 0, 4, 6, 7, 8 or 9 it is invalid
     * 2. This function extract the ground bank account number and turn it around.
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 5. Then all results are added up
     * 6. Then the modulo is calculated.
     * 7. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod76($bankAccountNumber, $weighting)
    {
        // if the kind of bank account is not 0, 4, 6, 7, 8 or 9 it is invalid
        $firstChar = substr($bankAccountNumber, 1, 1);
        if (!in_array($firstChar, array(0, 4, 6, 7, 8, 9))) {
            return false;
        }

        // extract the ground bank account
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 1, 6);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $calculationCheckNumber = $sum % 11;

        // if it is 10 its invalid
        if ($calculationCheckNumber == 10) {
            return false;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. the part 4-9 or 3-9 if the third part is a '9' will be multiplied by the weighting.
     * 3. Then all results are added up
     * 4. Then the modulo is calculated.
     * 5. The rest of the modulo is subtracted from 11 and that will be the check number
     *    (if it is 1 the check number 0)
     *    (if the rest after modulo is 0 the check number is 0!!!!)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return int the check number or false if the check number has 2 digits and is invalid
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod88($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 2, 7);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            if ($i != count($bankAccountNumberWithoutCheckNumberReverseSplitted)-1) {
                $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
            } else {
                if ($bankAccountNumberWithoutCheckNumberReverseSplitted[$i] == 9) {
                    $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
                }
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $rest = $sum % 11;

        // subtracted from 11
        if ($rest == 0) {
            $calculationCheckNumber = 0;
        } else {
            $calculationCheckNumber = 11 - $rest;
        }

        // if it is 10 the check number is 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function extract the ground bank account number and remove starting 0
     * 2. Then the modulo is calculated
     * 3. The check number is the subtraction of 11 and the rest
     *
     * @param String $bankAccountNumber to check
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethod97($bankAccountNumber)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // remove starting 0
        $bankAccountNumberWithoutCheckNumber = intval($bankAccountNumberWithoutCheckNumber);

        $calculationCheckNumber = $bankAccountNumberWithoutCheckNumber % 11;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number
     * 2. Every bank account digit will be multiplied by the weighting and added the weighting.
     * 3. The rest of modulo 11 are all added up
     * 4. Then the modulo is calculated and that rest will be the check number
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethodB9($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting and add the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $temp = ($bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i]) + $weighting[$i];
            $toCalculationArray[] = $temp % 11;
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $calculationCheckNumber = $sum % 10;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number
     * 4. Every bank account digit will be multiplied by the weighting and added the weighting.
     * 5. If one of the multiplications will be higher than 9 the checksum will be calculated.
     * 6. Then all results are added up
     * 7. Then the modulo is calculated and that will be the check number
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethodD7($bankAccountNumber, $weighting)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumber);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting and add the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = ($bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i]);
        }

        // calculate the modulo if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $calculationCheckNumber = $sum % 10;

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. Every bank account digit will be multiplied by the weighting.
     * 3. If one of the multiplications will be higher than 9 the check sum will be calculated.
     * 4. Then all results are added up and + 7
     * 5. Then the modulo is calculated.
     * 6. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethodE0($bankAccountNumber, $weighting)
    {
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // calculate the check sum if a product is bigger than 9
        foreach ($toCalculationArray as &$value) {
            if ($value >= 10) {
                $value = $this->_calculateCheckSum($value);
            }
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray) + 7;

        // calculate the modulo
        $rest = $sum % 10;

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        // if it is 10 the check number will be 0
        if ($calculationCheckNumber == 10) {
            $calculationCheckNumber = 0;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number and turn it around.
     * 2. The numbers are replaced by the ascii value
     * 3. Every bank account digit will be multiplied by the weighting.
     * 4. If one of the multiplications will be higher than 9 the check sum will be calculated.
     * 5. Then all results are added up and + 7
     * 6. Then the modulo is calculated.
     * 7. The rest of the modulo is subtracted from 10 and that will be the check number
     *    (if it is 10 the check number will be 0)
     *
     * @param String $bankAccountNumber to check
     * @param array  $weighting         the weighting of each letter of the bank account number
     *
     * @return       int                       the check number
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethodE1($bankAccountNumber, $weighting)
    {
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // turn around the bank account number
        $bankAccountNumberWithoutCheckNumberReverse = strrev($bankAccountNumberWithoutCheckNumber);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberReverseSplitted = str_split($bankAccountNumberWithoutCheckNumberReverse);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = intval($value);
        }

        //replace the numbers
        $ascii = array(0 => 48, 1 => 49, 2 => 50, 3 => 51, 4 => 52, 5 => 53, 6 => 54, 7 => 55, 8 => 56, 9 => 57);
        foreach ($bankAccountNumberWithoutCheckNumberReverseSplitted as &$value) {
            $value = $ascii[$value];
        }

        // multiply with the weighting
        $toCalculationArray = [];
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberReverseSplitted); $i++) {
            $toCalculationArray[] = $bankAccountNumberWithoutCheckNumberReverseSplitted[$i] * $weighting[$i];
        }

        // add up all the numbers
        $sum = array_sum($toCalculationArray);

        // calculate the modulo
        $calculationCheckNumber = $sum % 11;

        // if it is 10 the check number will be 0
        if ($calculationCheckNumber == 10) {
            return false;
        }

        return $calculationCheckNumber;
    }

    /**
     * 1. This function removes the check number of the bank account number
     * 2. transform the bank account number with the transformation table
     * 3. Then all numbers are added up
     * 4. Then the modulo is calculated.
     * 5. The rest of the modulo is subtracted from 10 and that will be the check number
     *
     * @param String $bankAccountNumber    to check
     * @param array  $transmormationsTable the transformations table
     * @param String $transformationsRows  the transformations rows for the transformations table
     *
     * @return int the check number
     *
     * @noinspection DuplicatedCode
     */
    function _calculateCheckNumberWithMethodM10H($bankAccountNumber, $transmormationsTable, $transformationsRows)
    {
        // remove check number
        $bankAccountNumberWithoutCheckNumber = substr($bankAccountNumber, 0, -1);

        // split the bank account number
        $bankAccountNumberWithoutCheckNumberSplitted = str_split($bankAccountNumberWithoutCheckNumber);

        // convert every digits to a int
        foreach ($bankAccountNumberWithoutCheckNumberSplitted as &$value) {
            $value = intval($value);
        }

        //transform bank account
        $transformedBankAccount = array();
        for ($i = 0; $i < count($bankAccountNumberWithoutCheckNumberSplitted); $i++) {
            $transformationsTableIndex = $transformationsRows[$i];
            $transformationsRow = $transmormationsTable[$transformationsTableIndex];
            $transformedBankAccount[$i] = $transformationsRow[$bankAccountNumberWithoutCheckNumberSplitted[$i]];
        }

        // add up all the numbers
        $sum = array_sum($transformedBankAccount);

        // calculate the modulo
        $rest = $sum % 10;

        // subtracted from 10
        $calculationCheckNumber = 10 - $rest;

        return $calculationCheckNumber;
    }

    /**
     * Return the calculate key
     *
     * @param $iban String iban to check
     *
     * @return String the calculate key
     */
    function _getCalculationMethodKey(String $iban)
    {
        $bankCode = substr($iban, 4, 8);

        return MyBankCode::getCheckNumberMethodKey($bankCode);
    }

    /**
     * Removes all white spaces from iban
     *
     * @param $iban String the iban to check
     *
     * @return String the same iban without white spaces
     */
    function _removeAllWhiteSpacesFromIban($iban)
    {
        $iban = preg_replace('/iban/i', '', $iban);
        $iban = preg_replace('/[:-]/', '', $iban);
        $iban = preg_replace('/\s/', '', $iban);

        return trim($iban);;
    }

    /**
     * Extract the bank account number of a iban
     *
     * @param $iban String the iban to check
     *
     * @return String bank account umber
     */
    function _extractBankAccountNumberFromIban($iban)
    {
        // remove the country code, iban check number and bank code
        return substr($iban, 12, strlen($iban) - 12);
    }

    /**
     * Calculate the check sum
     *
     * @param $digits int a number
     *
     * @return int|string sum of the digits
     */
    function _calculateCheckSum($digits)
    {
        $strDigits = (string) $digits;

        for ($intCrossFoot = $i = 0; $i < strlen($strDigits); $i++) {
            $intCrossFoot += intval($strDigits[$i]);
        }

        return $intCrossFoot;
    }
}
