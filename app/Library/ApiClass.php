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
        return $current_weather = $lowm->getCurrentWeather($city_name);
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
}