<?php

namespace Rela589n\NovaDateTimeFilter;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Nova\Filters\Filter;

class NovaDateTimeFilter extends Filter
{
    /** @var string */
    public $component = 'nova-date-time-filter';

    protected string $column;

    public function __construct(string $column = 'created_at')
    {
        $this->column = $column;

        $this->enableTime(true);
        $this->enableSeconds(true);
    }

    public function firstDayOfWeek($value)
    {
        $this->withMeta(['pickerFirstDayOfWeek' => $value]);
    }

    public function placeholder($value)
    {
        $this->withMeta(['placeholder' => $value]);
    }

    public function format($value)
    {
        $this->withMeta(['pickerFormat' => $value]);
    }

    public function displayFormat($value)
    {
        $this->withMeta(['pickerDisplayFormat' => $value]);
    }

    public function defaultHour($value)
    {
        $this->withMeta(['pickerDefaultHour' => $value]);
    }

    public function defaultMinute($value)
    {
        $this->withMeta(['pickerDefaultMinute' => $value]);
    }

    public function defaultSeconds($value)
    {
        $this->withMeta(['pickerDefaultSeconds' => $value]);
    }

    public function twelveHourTime($value)
    {
        $this->withMeta(['pickerTwelveHourTime' => $value]);
    }

    public function enableTime($value)
    {
        $this->withMeta(['pickerEnableTime' => $value]);
    }

    public function enableSeconds($value)
    {
        $this->withMeta(['pickerEnableSeconds' => $value]);
    }

    /**
     * @param  Request  $request
     * @param  EloquentBuilder  $query
     * @param  string  $value
     *
     * @return EloquentBuilder
     */
    public function apply(Request $request, $query, $value)
    {
        $dateTime = Carbon::parse($value);

        return $query->whereDate($this->column, $dateTime);
    }

    public function key(): string
    {
        return static::class.$this->column;
    }

    public function options(Request $request)
    {
    }
}
