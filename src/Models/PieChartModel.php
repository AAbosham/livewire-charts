<?php


namespace Aabosham\LivewireCharts\Models;

/**
 * Class PieChartModel
 * @package Aabosham\LivewireCharts\Models
 */
class PieChartModel extends BaseChartModel
{
    public $onSliceClickEventName;

    public $opacity;

    public $data;

    public $chartType;

    public $customFomatter;

    public function __construct()
    {
        parent::__construct();

        $this->onSliceClickEventName = null;

        $this->opacity = 0.75;

        $this->chartType = 'pie';

        $this->customFomatter = false;

        $this->data = collect();
    }

    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;

        return $this;
    }
    
    public function setCustomFomatter($format)
    {
        $this->customFomatter = $format;

        return $this;
    }

    public function withOnSliceClickEvent($onSliceClickEventName)
    {
        $this->onSliceClickEventName = $onSliceClickEventName;

        return $this;
    }

    public function setType($type)
    {
        $this->chartType = $type;

        return $this;
    }

    public function addSlice($title, $value, $color, $extras = [])
    {
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
            'type' => $this->chartType,
            'customFomatter' => $this->customFomatter,
        ]);
    }

    public function fromArray($array)
    {
        parent::fromArray($array);

        $this->onSliceClickEventName = data_get($array, 'onSliceClickEventName', null);

        $this->opacity = data_get($array, 'opacity', 0.75);

        $this->customFomatter = data_get($array, 'customFomatter', false);
        
        $this->data = collect(data_get($array, 'data', []));
    }
}
