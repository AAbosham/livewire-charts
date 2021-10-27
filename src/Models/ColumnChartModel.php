<?php


namespace Aabosham\LivewireCharts\Models;

/**
 * Class ColumnChartModel
 * @package Aabosham\LivewireCharts\Models
 * @property boolean $isMultiColumn
 * @property boolean $isStacked
 */
class ColumnChartModel extends BaseChartModel
{
    public $opacity;

    public $columnWidth;

    public $horizontal;

    public $isMultiColumn;

    public $isStacked;

    public $onColumnClickEventName;

    public $data;

    public $customFomatter;

    public $grid;

    public function __construct()
    {
        parent::__construct();

        $this->onColumnClickEventName = null;

        $this->opacity = 0.75;

        $this->columnWidth = 70;

        $this->opacity = 1;

        $this->isMultiColumn = false;

        $this->isStacked = false;

        $this->customFomatter = false;

        $this->horizontal = false;

        $this->grid = false;

        $this->xaxis = false;
        $this->yaxis = false;

        $this->horizontal = false;

        $this->isMultiColumn = false;

        $this->isStacked = false;

        $this->data = collect();

        $this->customAnnotations = null;

        $this->toolBarShow = false;

        $this->zoomEnabled = false;
    }

    public function customAnnotations($annotations)
    {
        $this->customAnnotations = $annotations;

        return $this;
    }

    public function multiColumn()
    {
        $this->isMultiColumn = true;

        return $this;
    }

    public function singleColumn()
    {
        $this->isMultiColumn = false;

        return $this;
    }

    public function stacked()
    {
        $this->isStacked = true;

        return $this;
    }

    public function customFomatterEnable($format)
    {
        $this->customFomatter = $format;

        return $this;
    }

    public function setHorizontal($value)
    {
        $this->horizontal = $value;

        return $this;
    }

    public function customGrid($format)
    {
        $this->grid = $format;

        return $this;
    }

    public function customXaxis($format)
    {
        $this->xaxis = $format;

        return $this;
    }

    public function customYaxis($format)
    {
        $this->yaxis = $format;

        return $this;
    }

    public function isHorizontal()
    {
        $this->horizontal = true;

        return $this;
    }

    public function setColumnWidth($value)
    {
        $this->columnWidth = $value;

        return $this;
    }

    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;

        return $this;
    }

    public function withOnColumnClickEventName($onColumnClickEventName)
    {
        $this->onColumnClickEventName = $onColumnClickEventName;

        return $this;
    }

    public function addColumn($title, $value, $color, $extras = [])
    {
        $this->data->push([
            'title' => $title,
            'value' => $value,
            'color' => $color,
            'extras' => $extras,
        ]);

        return $this;
    }

    public function addSeriesColumn($seriesName, $title, $value, $extras = [])
    {
        $series = $this->data->get($seriesName, collect());

        $series->push([
            'seriesName' => $seriesName,
            'title' => $title,
            'value' => $value,
            'extras' => $extras,
        ]);

        $this->data->put($seriesName, $series);

        return $this;
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'onColumnClickEventName' => $this->onColumnClickEventName,
            'opacity' => $this->opacity,
            'horizontal' => $this->horizontal,
            'columnWidth' => $this->columnWidth,
            'isMultiColumn' => $this->isMultiColumn,
            'isStacked' => $this->isStacked,
            'data' => $this->data->toArray(),
            'customFomatter' => $this->customFomatter,
            'grid' => $this->grid,
            'xaxis' => $this->xaxis,
            'yaxis' => $this->yaxis,
            'horizontal' => $this->horizontal,
            'customAnnotations' => $this->customAnnotations,
            'toolBarShow' => $this->toolBarShow,
            'zoomEnabled' => $this->zoomEnabled
            ]);
    }

    public function fromArray($array)
    {
        parent::fromArray($array);

        $this->onColumnClickEventName = data_get($array, 'onColumnClickEventName', null);

        $this->opacity = data_get($array, 'opacity', 0.5);

        $this->columnWidth = data_get($array, 'columnWidth', 70);
        $this->customFomatter = data_get($array, 'customFomatter', false);

        $this->grid = data_get($array, 'grid', false);

        $this->xaxis = data_get($array, 'xaxis', false);

        $this->yaxis = data_get($array, 'yaxis', false);
        $this->horizontal = data_get($array, 'horizontal', false);

        $this->isMultiColumn = data_get($array, 'isMultiColumn', false);

        $this->isStacked = data_get($array, 'isStacked', false);

        $this->data = collect(data_get($array, 'data', []));

        $this->customAnnotations = data_get($array, 'customAnnotations', []);

        $this->toolBarShow = data_get($array, 'toolBarShow', []);

        $this->zoomEnabled = data_get($array, 'zoomEnabled', []);
    }
}
