<?php

namespace app\Library;
use Illuminate\Http\Request;
use Gmopx\LaravelOWM\LaravelOWM;

class ApiClass
{
    /**
     * @param $query            (required)
     * @param string $lang      (default: en) - http://openweathermap.org/current#multi.
     * @param string $units     (default: metric) - 'metric' or 'imperial'.
     * @param bool $cache       (default: false)
     * @param int $time         (default: 600)
     * @return OpenWeatherMap\CurrentWeather
    */
    public function getWeather($city_name){
        $lowm = new LaravelOWM();
        $current_weather = $lowm->getCurrentWeather($city_name);
        $current_weather = $this->getformatWeather($current_weather);
        return $current_weather;
    }

    /**
     * @param $query            (required)
     * @param string $lang      (default: en) - http://openweathermap.org/current#multi.
     * @param string $units     (default: metric) - 'metric' or 'imperial'.
     * @param int $days         (default: 5) - maximum 16.
     * @param bool $cache       (default: false)
     * @param int $time         (default: 600)
     * @return OpenWeatherMap\WeatherForecast
    */
    public function getWeatherForecast($query, $lang = 'en', $units = 'metric', $days = 5, $cache = false, $time = 600){

    }

    /**
     * @param array|int|string $query
     * @param string $lang
     * @param string $units
     * @param int $days
     * @param bool $cache
     * @param int $time
     * @return OpenWeatherMap\WeatherForecast
    */
    public function getDailyWeatherForecast($query, $lang = 'en', $units = 'metric', $days = 5, $cache = false, $time = 600){
        
    }

    /**
     * @param $query            (required)
     * @param \DateTime $start  (default: today)
     * @param int $endOrCount   (default: 1)
     * @param string $type      (default: hour) - 'tick', 'hour', or 'day'
     * @param string $lang      (default: en) - http://openweathermap.org/current#multi.
     * @param string $units     (default: metric) - 'metric' or 'imperial'.
     * @param bool $cache       (default: false)
     * @param int $time         (default: 600)
     * @return OpenWeatherMap\WeatherForecast
    */
    public function getWeatherHistory($query, \DateTime $start, $endOrCount = 1, $type = 'hour', $lang = 'en', $units = 'metric', $cache = false, $time = 600){

    }

    public function getformatWeather($current_weather)
    {
        $description      = [];
        $description[200] = '小雨と雷雨';
        $description[201] = '雨と雷雨';
        $description[202] = '大雨と雷雨';
        $description[210] = '光雷雨';
        $description[211] = '雷雨';
        $description[212] = '重い雷雨';
        $description[221] = 'ぼろぼろの雷雨';
        $description[230] = '小雨と雷雨';
        $description[231] = '霧雨と雷雨';
        $description[232] = '重い霧雨と雷雨';
        $description[300] = '光強度霧雨';
        $description[301] = '霧雨';
        $description[302] = '重い強度霧雨';
        $description[310] = '光強度霧雨の雨';
        $description[311] = '霧雨の雨';
        $description[312] = '重い強度霧雨の雨';
        $description[313] = 'にわかの雨と霧雨';
        $description[314] = '重いにわかの雨と霧雨';
        $description[321] = 'にわか霧雨';
        $description[500] = '小雨';
        $description[501] = '適度な雨';
        $description[502] = '重い強度の雨';
        $description[503] = '非常に激しい雨';
        $description[504] = '極端な雨';
        $description[511] = '雨氷';
        $description[520] = '光強度のにわかの雨';
        $description[521] = 'にわかの雨';
        $description[522] = '重い強度にわかの雨';
        $description[531] = '不規則なにわかの雨';
        $description[600] = '小雪';
        $description[601] = '雪';
        $description[602] = '大雪';
        $description[611] = 'みぞれ';
        $description[612] = 'にわかみぞれ';
        $description[615] = '光雨と雪';
        $description[616] = '雨や雪';
        $description[620] = '光のにわか雪';
        $description[621] = 'にわか雪';
        $description[622] = '重いにわか雪';
        $description[701] = 'ミスト';
        $description[711] = '煙';
        $description[721] = 'ヘイズ';
        $description[731] = '砂、ほこり旋回する';
        $description[741] = '霧';
        $description[751] = '砂';
        $description[761] = 'ほこり';
        $description[762] = '火山灰';
        $description[771] = 'スコール';
        $description[781] = '竜巻';
        $description[800] = '晴天';
        $description[801] = '薄い雲';
        $description[802] = '雲';
        $description[803] = '曇りがち';
        $description[804] = '厚い雲';

        $current_weather->weather->description_jp = $description[$current_weather->weather->id];

        // $current_weather->weather->icon = str_replace('n', 'd', $current_weather->weather->icon);

        return $current_weather;
    }
}