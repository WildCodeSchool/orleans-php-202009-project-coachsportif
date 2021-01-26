<?php

namespace App\Twig;

use DateTime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class DateFrExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('dateFr', [$this, 'dateFr']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name'),
        ];
    }

    public function dateFr(DateTime $value): string
    {
        $days = [
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'jeudi',
            'Friday' => 'Vendredi',
            'Saturday' => 'Samedi',
            'Sunday' => 'Dimanche',
        ];
        $months = [
            '01' => 'Janvier',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'jeudi',
            'Friday' => 'Vendredi',
            '06' => 'Juin',
            'Sunday' => 'Dimanche',
        ];
        $day = $days[date_format($value, 'l')];
        $month = $months[date_format($value, 'm')];
        $date = $day . ' ' . date_format($value, 'd') . ' ' . $month . ' ' . date_format($value, 'Y');
        return $date ;
    }
}
