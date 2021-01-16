<?php

namespace Rela589n\NovaDateTimeFilter;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\DateFilter;
use Laravel\Nova\Filters\Filter;

class NovaDateTimeFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'nova-date-time-filter';

    /**
     * Set the first day of the week.
     *
     * @param  int  $day
     * @return $this
     */
    public function firstDayOfWeek($day)
    {
        return $this->withMeta([__FUNCTION__ => $day]);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        //
    }

    public function apply(Request $request, $query, $value)
    {
        // TODO: Implement apply() method.
    }
}
