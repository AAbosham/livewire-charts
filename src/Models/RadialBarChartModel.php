<?php


namespace Aabosham\LivewireCharts\Models;

/**
 * Class RadialBarChartModel
 * @package Aabosham\LivewireCharts\Models
 */
class RadialBarChartModel extends BaseChartModel
{
    public $onSliceClickEventName;

    public $opacity;

    public $data;

    public function __construct()
    {
        parent::__construct();

        $this->onSliceClickEventName = null;

        $this->opacity = 0.75;

        $this->data = collect();

    }

    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;

        return $this;
    }

    public function withOnSliceClickEvent($onSliceClickEventName)
    {
        $this->onSliceClickEventName = $onSliceClickEventName;

        return $this;
    }

    public function addSlice($title, $value, $color, $extras = [])
    {
        \Arr::exists($extras, 'height') ? $extras['height'] = $extras['height'] : $extras['height'] = 'auto';

        \Arr::exists($extras, 'total') ? $extras['total'] = $extras['total'] : $extras['total'] = 100;

        \Arr::exists($extras, 'hollowSize') ? $extras['hollowSize'] = $extras['hollowSize'] : $extras['hollowSize'] = '45%';

        \Arr::exists($extras, 'nameShow') ? $extras['nameShow'] = $extras['nameShow'] : $extras['nameShow'] = false;

        \Arr::exists($extras, 'valueShow') ? $extras['valueShow'] = $extras['valueShow'] : $extras['valueShow'] = false;

        \Arr::exists($extras, 'totalShow') ? $extras['totalShow'] = $extras['totalShow'] : $extras['totalShow'] = false;

        \Arr::exists($extras, 'legend') ? $extras['legend'] = $extras['legend'] : $extras['legend'] = '';

        \Arr::exists($extras, 'labels') ? $extras['labels']  : $extras['labels'] = 'chart';

        $this->data->push([
            'title' => $title,
            'value' => $value,
            'color' => $color,
            'extras' => $extras,
        ]);

        return $this;
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'onSliceClickEventName' => $this->onSliceClickEventName,
            'opacity' => $this->opacity,
            'data' => $this->data->toArray(),
        ]);
    }

    public function fromArray($array)
    {
        parent::fromArray($array);

        $this->onSliceClickEventName = data_get($array, 'onSliceClickEventName', null);

        $this->opacity = data_get($array, 'opacity', 0.75);

        $this->data = collect(data_get($array, 'data', []));
    }
}
