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

    public function firstDayOfWeek($value): self
    {
        return $this->withMeta(['pickerFirstDayOfWeek' => $value]);
    }

    public function placeholder($value): self
    {
        return $this->withMeta(['placeholder' => $value]);
    }

    public function format($value): self
    {
        return $this->withMeta(['pickerFormat' => $value]);
    }

    public function displayFormat($value): self
    {
        return $this->withMeta(['pickerDisplayFormat' => $value]);
    }

    public function defaultHour($value): self
    {
        return $this->withMeta(['pickerDefaultHour' => $value]);
    }

    public function defaultMinute($value): self
    {
        return $this->withMeta(['pickerDefaultMinute' => $value]);
    }

    public function defaultSeconds($value): self
    {
        return $this->withMeta(['pickerDefaultSeconds' => $value]);
    }

    public function twelveHourTime($value): self
    {
        return $this->withMeta(['pickerTwelveHourTime' => $value]);
    }

    public function enableTime($value): self
    {
        return $this->withMeta(['pickerEnableTime' => $value]);
    }

    public function enableSeconds($value): self
    {
        return $this->withMeta(['pickerEnableSeconds' => $value]);
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
