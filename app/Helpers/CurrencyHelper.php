<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class CurrencyHelper
{
    const REFRESH_TIME = 3600;
    const CBR_API_URL = 'https://www.cbr-xml-daily.ru/daily_json.js';

    const RUB = 'RUB';
    const USD = 'USD';
    const EUR = 'EUR';

    /**
     * @param array $currencies
     * @return array
     */
    public static function getCurrencyValues(array $currencies)
    {
        $json_daily_file = self::getStoragePath();

        if (!is_file($json_daily_file) || filemtime($json_daily_file) < time() - self::REFRESH_TIME) {
            if ($json_daily = file_get_contents(self::CBR_API_URL)) {
                file_put_contents($json_daily_file, $json_daily);
            }
        }

        $data = json_decode(file_get_contents($json_daily_file));

        $result = [];

        foreach($currencies as $code) {
            $result[$code] = [
                'code' => $code,
                'nominal' => $nominal = $data->Valute->{$code}->Nominal,
                'value' => $data->Valute->{$code}->Value / $nominal
            ];
        }

        return $result;
    }

    /**
     * Get extra currencies to bill page
     *
     * @param string $lang
     *
     * @return array
     */
    public static function getCurrencyByLang(string $lang): array
    {
        switch ($lang) {
            case 'es':
                return ['MXN'];
                break;
            case 'pt_BR':
                return ['BRL'];
                break;
            case 'tr':
                return ['TRY'];
                break;
            default:
                return [];
        }
    }

    /**
     * @return string
     */
    public static function getStoragePath()
    {
        return storage_path('app/currency/daily.json');
    }

    /**
     * Get available currencies list
     *
     * @return array
     */
    public static function getCurrenciesList(): array
    {
        return [
            self::RUB => self::RUB,
            self::USD => self::USD,
            self::EUR => self::EUR,
        ];
    }

    /**
     * Get currency symbol
     *
     * @param string $currency
     *
     * @return string
     */
    public static function getCurrencySymbol(string $currency): string
    {
        $currencyMap = [
            self::RUB => 'P',
            self::USD => '$',
            self::EUR => '€',
        ];

        return $currencyMap[$currency] ?? '';
    }

    /**
     * Check if currency is zero decimal
     * 
     * @param string $currency
     *
     * @return array
     * 
     * @todo handle all possible currencies
     */
    public static function isZeroDecimal(string $currency): bool
    {
        return in_array($currency, self::getCurrenciesList());
    }
}
