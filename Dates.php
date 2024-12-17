<?php

class Dates {
    /**
     * Get current date and time in specified format
     * 
     * @param string $format Date format (default: 'Y-m-d H:i:s')
     * @param string $timezone Timezone (default: current server timezone)
     * @return string Formatted current date and time
     */
    public static function currentDateTime($format = 'Y-m-d H:i:s', $timezone = null) {
        $tz = $timezone ? new DateTimeZone($timezone) : null;
        $dateTime = new DateTime('now', $tz);
        return $dateTime->format($format);
    }

    /**
     * Calculate human-readable time difference (time ago)
     * 
     * @param string $date Date to calculate time from
     * @param bool $full Show full details or short version
     * @return string Humanized time difference
     */
    public static function timeAgo($date, $full = false) {
        try {
            $now = new DateTime();
            $ago = new DateTime($date);
            $diff = $now->diff($ago);
        } catch (Exception $e) {
            return $date; // Return original if date is invalid
        }

        $units = [
            'y' => 'year',
            'm' => 'month',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second'
        ];

        $string = [];
        foreach ($units as $k => $v) {
            if ($diff->$k) {
                $value = $diff->$k;
                $v = $value > 1 ? $v . 's' : $v;
                $string[] = $full 
                    ? "{$value} {$v}"
                    : "{$value}" . substr($v, 0, 1);
                if (!$full && count($string) == 2) break;
            }
        }

        return $diff->invert ? 
            ($full ? 'in ' . implode(', ', $string) : '+' . implode('', $string)) :
            (implode(', ', $string) . ($full ? ' ago' : ''));
    }

    /**
     * Add time to a given date
     * 
     * @param string $date Base date
     * @param string $interval Interval to add (e.g., '1 year', '6 months', '14 days', '2 hours', '30 minutes')
     * @return string Modified date
     */
    public static function add($date, $interval) {
        try {
            $dateTime = new DateTime($date);

            // Mapping interval input (like '1y', '3m', '2d', '5h', '10i') to the appropriate DateInterval format
            $unitMap = [
                'year' => 'Y',
                'month' => 'M',
                'day' => 'D',
                'hour' => 'H',
                'minute' => 'I',
            ];

            // Parse the interval input
            if (preg_match('/^(\d+)\s*(year|month|day|hour|minute)s?$/', $interval, $matches)) {
                $value = $matches[1];
                $unit = $matches[2];

                // Prepare DateInterval string (e.g. 'P1Y' for 1 year, 'P3M' for 3 months)
                $dateInterval = new DateInterval('P' . $value . $unitMap[$unit]);
                $dateTime->add($dateInterval);
            } else {
                throw new InvalidArgumentException("Invalid interval format");
            }

            return $dateTime->format('Y-m-d H:i:s');
        } catch (Exception $e) {
            return $date;
        }
    }
}

?>
